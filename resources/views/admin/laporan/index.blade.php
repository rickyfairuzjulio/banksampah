@extends('layouts.master')

@section('content')
<div class="max-w-6xl mx-auto bg-white p-6 rounded shadow">
    <h3 class="text-lg font-semibold mb-4">Laporan Logistik</h3>

    <form method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-3 mb-4">
        <div>
            <label class="block text-sm">RT</label>
            <select name="rt" class="mt-1 block w-full border rounded p-2">
                <option value="">Semua RT</option>
                @foreach($areas as $a)
                    <option value="{{ $a->rt }}" @selected(request('rt') == $a->rt)>{{ $a->rt }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-sm">RW</label>
            <select name="rw" class="mt-1 block w-full border rounded p-2">
                <option value="">Semua RW</option>
                @foreach($areas->pluck('rw')->unique() as $rw)
                    <option value="{{ $rw }}" @selected(request('rw') == $rw)>{{ $rw }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-sm">Dari</label>
            <input type="date" name="from" value="{{ request('from') }}" class="mt-1 block w-full border rounded p-2" />
        </div>
        <div class="flex items-end">
            <button class="w-full bg-indigo-600 text-white p-2 rounded">Filter</button>
        </div>
    </form>

    <div class="mb-6">
        <canvas id="laporanChart" height="100"></canvas>
    </div>

    <div>
        <table class="w-full table-auto">
            <thead>
                <tr class="text-left text-sm text-gray-600">
                    <th class="p-2">ID</th>
                    <th class="p-2">Nasabah</th>
                    <th class="p-2">RT/RW</th>
                    <th class="p-2">Kategori</th>
                    <th class="p-2">Berat</th>
                    <th class="p-2">Total</th>
                    <th class="p-2">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reports as $r)
                    <tr class="border-t">
                        <td class="p-2">{{ $r->id }}</td>
                        <td class="p-2">{{ $r->user->name ?? '-' }}</td>
                        <td class="p-2">{{ $r->user->rt ?? '-' }} / {{ $r->user->rw ?? '-' }}</td>
                        <td class="p-2">{{ $r->category->name ?? '-' }}</td>
                        <td class="p-2">{{ $r->berat_kg }}</td>
                        <td class="p-2">Rp {{ number_format($r->total_rp,0,',','.') }}</td>
                        <td class="p-2">{{ $r->created_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $reports->links() }}
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = {!! json_encode($labels ?? []) !!};
    const values = {!! json_encode($values ?? []) !!};
    const ctx = document.getElementById('laporanChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: { labels: labels, datasets: [{ label: 'Total Berat (Kg)', data: values, backgroundColor: 'rgba(34,197,94,0.8)'}]},
        options: { responsive: true, scales: { y: { beginAtZero: true } } }
    });
</script>
@endsection