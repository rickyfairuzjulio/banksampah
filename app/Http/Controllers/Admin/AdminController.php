<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Prepare monthly RT aggregation for chart
        $start = now()->startOfMonth();
        $end = now()->endOfMonth();

        $data = \App\Models\Transaction::whereBetween('created_at', [$start, $end])
            ->join('users', 'transactions.user_id', '=', 'users.id')
            ->selectRaw('users.rt as rt, SUM(transactions.berat_kg) as total_berat')
            ->groupBy('users.rt')
            ->orderBy('users.rt')
            ->get();

        $labels = $data->pluck('rt')->map(fn($v) => 'RT '.$v)->toArray();
        $values = $data->pluck('total_berat')->map(fn($v) => (float) $v)->toArray();

        return view('admin.dashboard', compact('labels','values'));
    }

    public function validasiKeuangan()
    {
        return view('admin.validasi.index');
    }

    public function approveWithdrawal(Request $request, $withdrawalId)
    {
        $withdrawal = \App\Models\Withdrawal::findOrFail($withdrawalId);

        $this->authorize('approve', $withdrawal);

        $request->validate([
            'foto_resi' => 'required|image|max:5120',
        ]);

        \DB::beginTransaction();
        try {
            if ($withdrawal->status === 'disetujui') {
                return back()->with('status', 'Sudah disetujui sebelumnya.');
            }

            $user = $withdrawal->user()->lockForUpdate()->first();

            if ((float)$user->saldo < (float)$withdrawal->nominal) {
                return back()->withErrors(['saldo' => 'Saldo nasabah tidak mencukupi untuk proses ini.']);
            }

            $path = $request->file('foto_resi')->store('withdrawals', 'public');

            // update withdrawal
            $withdrawal->foto_resi = $path;
            $withdrawal->status = 'disetujui';
            $withdrawal->save();

            // deduct user saldo
            $user->saldo = bcsub((string)$user->saldo, (string)$withdrawal->nominal, 2);
            $user->save();

            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollBack();
            throw $e;
        }

        return back()->with('status', 'Pengajuan penarikan disetujui dan saldo diperbarui.');
    }

    public function konfigurasiWilayah()
    {
        return view('admin.konfigurasi.wilayah');
    }

    public function laporan(Request $request)
    {
        $query = \App\Models\Transaction::query();

        if ($request->filled('rt')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('rt', $request->rt);
            });
        }

        if ($request->filled('rw')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('rw', $request->rw);
            });
        }

        if ($request->filled('from') && $request->filled('to')) {
            $query->whereBetween('created_at', [$request->from, $request->to]);
        } else {
            $query->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()]);
        }

        $reports = $query->with('user','category')->paginate(25)->appends($request->query());

        // distinct RT/RW for filter
        $areas = \App\Models\User::select('rt','rw')->distinct()->orderBy('rt')->get();

        // aggregation by rt for chart
        $agg = \App\Models\Transaction::whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])
            ->join('users','transactions.user_id','=','users.id')
            ->selectRaw('users.rt as rt, sum(transactions.berat_kg) as total_berat')
            ->groupBy('users.rt')
            ->orderBy('users.rt')
            ->get();

        $labels = $agg->pluck('rt')->map(fn($v) => 'RT '.$v)->toArray();
        $values = $agg->pluck('total_berat')->map(fn($v) => (float)$v)->toArray();

        return view('admin.laporan.index', compact('reports','areas','labels','values'));
    }

    public function exportLaporan(Request $request)
    {
        // Simple CSV export
        $query = \App\Models\Transaction::with('user','category');
        if ($request->filled('rt')) {
            $query->whereHas('user', fn($q) => $q->where('rt', $request->rt));
        }
        $rows = $query->get();

        $filename = 'laporan_' . now()->format('Ymd_His') . '.csv';
        $path = storage_path('app/exports/' . $filename);
        if (!file_exists(dirname($path))) mkdir(dirname($path), 0777, true);

        $handle = fopen($path, 'w');
        fputcsv($handle, ['id','user','rt','rw','kategori','berat_kg','total_rp','tanggal']);
        foreach ($rows as $r) {
            fputcsv($handle, [
                $r->id,
                $r->user->name ?? '-',
                $r->user->rt ?? '-',
                $r->user->rw ?? '-',
                $r->category->name ?? '-',
                $r->berat_kg,
                $r->total_rp,
                $r->created_at,
            ]);
        }
        fclose($handle);

        return response()->download($path)->deleteFileAfterSend(true);
    }
}
