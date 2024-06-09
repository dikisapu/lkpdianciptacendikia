<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 z-10">
<table style="width: 100%">
    <tr>
        <td>
            <img src="{{ asset('logo.png') }}" style="width: 100px">
        </td>
        <td style="text-align: center">
            <p style="text-align: center">Lembaga Kursus dan Pelatihan</p>
            <p style="text-align: center">Dian Cipta Cendikia</p>
            <small>Phone : +62 895-2757-5681 | E-mail : lkpdcc@gmail.com</small><br>
            <small>Jl. Raden Intan No.243, Way Urang, Kec. Kalianda, Kabupaten Lampung Selatan, Lampung 35513</small>
        </td>
    </tr>
</table>
<hr style="border: 1px solid black" class="mb-5 mt-2">
<p class="text-center font-bold">Laporan</p>
<p class="text-center">Transaksi Tanggal {{ \Carbon\Carbon::parse(request()->tgl_mulai)->isoFormat('LL') }}
    s.d {{ \Carbon\Carbon::parse(request()->tgl_sampai)->isoFormat('LL') }}</p>
<table class="table">
    <!-- head -->
    <thead class="bg-base-500">
    <tr>
        <th></th>
        <th>Kode Booking</th>
        <th>Tgl. Transaksi</th>
        <th>Tgl. Bayar</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody>
    @php
        $total = 0;
    @endphp
    @foreach($transaksi as $key => $row)
        <tr>
            <th>{{ $key + 1 }}.</th>
            <td>{{ $row->kode }}</td>
            <td>{{ $row->tgl_transaksi_format }}</td>
            <td>{{ $row->tgl_bayar_format }}</td>
            <td>Rp. {{ $row->paket?->harga_rp }}</td>
        </tr>
        @php
            $total = $total + $row->paket?->harga
        @endphp
    @endforeach
    <tr>
        <td class="font-bold text-center" colspan="4">Total</td>
        <td class="font-bold">Rp. {{ number_format($total,0,',','.') }}</td>
    </tr>
    </tbody>
</table>
<script>
    window.print();
</script>
</body>
</html>
