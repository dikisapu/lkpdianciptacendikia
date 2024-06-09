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
<p class="text-center font-bold">Detail Kursus</p>
<table class="">
    <tr>
        <td>Kode Booking</td>
        <td>:</td>
        <td>{{ $transaksi->kode }}</td>
    </tr>
    <tr>
        <td>Member</td>
        <td>:</td>
        <td>{{ $transaksi->member?->name }}</td>
    </tr>
    <tr>
        <td>Paket</td>
        <td>:</td>
        <td>{{ $transaksi->paket?->nama }}</td>
    </tr>
    <tr>
        <td>Jumlah Pertemuan</td>
        <td>:</td>
        <td>{{ $transaksi->paket?->jumlah_pertemuan }}</td>
    </tr>
    <tr>
        <td>Tgl. Mulai</td>
        <td>:</td>
        <td>{{ $transaksi->tgl_mulai_format }}</td>
    </tr>
    <tr>
        <td>Tgl. Transaksi</td>
        <td>:</td>
        <td>{{ $transaksi->tgl_transaksi_format }}</td>
    </tr>
    <tr>
        <td>Hari</td>
        <td>:</td>
        <td>{{ $transaksi->hari }}</td>
    </tr>
    <tr>
        <td>Jam</td>
        <td>:</td>
        <td>{{ $transaksi->range_jam }}</td>
    </tr>
    <tr>
        <td>Biaya</td>
        <td>:</td>
        <td>Rp. {{ $transaksi->paket?->harga_rp }}</td>
    </tr>
    <tr>
        <td>Status Transaksi</td>
        <td>:</td>
        <td>{{ $transaksi->status_transaksi }}</td>
    </tr>
    <tr>
        <td>Catatan</td>
        <td>:</td>
        <td>{{ $transaksi->catatan }}</td>
    </tr>
</table>
<hr style="border: 0.5px solid grey" class="mt-2 mb-2">
<i>NB : Pembayaran bisa dilakukan melalui no. rek berikut :</i>
<p>
    NO. REK : 1140025395545 <br>
    AN : DIKI SANTOSO <br>
    BANK : Mandiri</p>
<script>
    window.print();
</script>
</body>
</html>
