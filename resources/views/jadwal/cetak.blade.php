<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
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
<p class="text-center font-bold">Daftar Jadwal</p>
<div class="overflow-x-auto">
    <table class="table">
        <!-- head -->
        <thead class="bg-base-500">
        <tr>
            <th></th>
            <th>Kode Booking</th>
            <th>Paket</th>
            <th>Instruktur</th>
            <th>Member</th>
            <th>Hari</th>
            <th>Jam</th>
            <th>Biaya</th>
            <th>Tgl. Mulai</th>
        </tr>
        </thead>
        <tbody>
        @foreach($transaksi as $key => $row)
            <tr>
                <th>{{ $key + 1 }}.</th>
                <td>{{ $row->kode }}</td>
                <td>{{ $row->paket?->nama }}</td>
                <td>{{ $row->instruktur?->name }}</td>
                <td>{{ $row->member?->name }}</td>
                <td>{{ $row->hari }}</td>
                <td>{{ $row->range_jam }}</td>
                <td>Rp. {{ $row->paket?->harga_rp }}</td>
                <td><kbd class="kbd kbd-sm">{{ $row->tgl_mulai_format }}</kbd></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script>
    window.print();
</script>
</body>
</html>
