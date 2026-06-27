@extends('layouts.master')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-lg font-semibold mb-4">Validasi Keuangan - Pengajuan Penarikan</h2>

    @if(session('status'))<div class="bg-green-100 text-green-800 p-2 mb-4">{{ session('status') }}</div>@endif

    @php $withdrawals = \App\Models\Withdrawal::where('status','pending')->with('user')->get(); @endphp

    @if($withdrawals->isEmpty())
        <div class="text-gray-600">Tidak ada pengajuan penarikan.</div>
    @else
        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="text-left">
                    <th class="p-2">Nasabah</th>
                    <th class="p-2">Nominal</th>
                    <th class="p-2">Metode</th>
                    <th class="p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($withdrawals as $w)
                    <tr class="border-t">
                        <td class="p-2">{{ $w->user->name }} ({{ $w->user->email }})</td>
                        <td class="p-2">Rp {{ number_format($w->nominal,0,',','.') }}</td>
                        <td class="p-2">{{ $w->metode }}</td>
                        <td class="p-2">
                            <form action="{{ route('admin.validasi.keuangan.approve', [$w->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-2">
                                    <label class="block text-sm">Upload Foto Resi (wajib)</label>
                                    <input type="file" name="foto_resi" accept="image/*" required />
                                </div>
                                <button class="px-3 py-1 bg-indigo-600 text-white rounded">Setujui & Unggah Resi</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection