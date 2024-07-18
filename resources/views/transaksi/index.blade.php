@extends('layouts.admin')
@section('content')
    <div class="flex flex-row mb-3 justify-between">
        <h2 class="card-title">{{ $status }}</h2>
        <ul class="menu bg-base-100 lg:menu-horizontal rounded-box">
            <li>
                <a href="{{ route('transaksi.index',['status' => \App\Enums\StatusTransaksiEnum::MENUNGGU_PEMBAYARAN->value]) }}">
                    <span class="badge badge-xs badge-error"></span>
                    {{ \App\Enums\StatusTransaksiEnum::MENUNGGU_PEMBAYARAN->value }}
                </a>
            </li>
            <li>
                <a href="{{ route('transaksi.index',['status' => \App\Enums\StatusTransaksiEnum::MENUNGGU_KONFIRMASI->value]) }}">
                    <span class="badge badge-xs badge-info"></span>
                    {{ \App\Enums\StatusTransaksiEnum::MENUNGGU_KONFIRMASI->value }}
                </a>
            </li>
            <li>
                <a href="{{ route('transaksi.index',['status' => \App\Enums\StatusTransaksiEnum::SUDAH_DIBAYAR->value]) }}">
                    <span class="badge badge-xs badge-success"></span>
                    {{ \App\Enums\StatusTransaksiEnum::SUDAH_DIBAYAR->value }}
                </a>
            </li>
        </ul>
    </div>

    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <div class="overflow-x-auto">
                <table class="table">
                    <!-- head -->
                    <thead class="bg-base-500">
                    <tr>
                        <th></th>
                        <th>Kode Booking</th>
                        <th>Kursus</th>
                        <th>Tgl. Trx</th>
                        <th>Member</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>kelas</th>
                        {{-- <th>pertemuan</th> --}}
                        <th>Biaya</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($transaksi as $key => $row)
                        <tr>
                            <th>{{ $transaksi->firstItem() + $key }}.</th>
                            <td>{{ $row->kode }}</td>
                            <td>{{ $row->paket?->nama }}</td>
                            <td>{{ $row->tgl_transaksi_format }}</td>
                            <td>{{ $row->member?->name }}</td>
                            <td>{{ $row->hari }}</td>
                            <td>{{ $row->range_jam }}</td>
                            <td>{{ $row->paket?->kelas }}</td>
                            {{-- <td><kbd class="kbd kbd-sm">{{ $row->jumlah_pertemuan }}{{ $row->jumlah_pertemuan }}</kbd></td> --}}
                            <td>Rp. {{ $row->paket?->harga_rp }}</td>
                            <td><kbd class="kbd kbd-sm">{{ $row->status_transaksi }}</kbd></td>
                            <td>
                                <div class="dropdown dropdown-left">
                                    <div tabindex="0" role="button" class="btn btn-sm px-2">...
                                    </div>
                                    <ul tabindex="0"
                                        class="dropdown-content z-50 menu p-2 shadow bg-base-100 rounded-box w-52">
                                        <li><a href="{{ route('transaksi.show',$row) }}">Detail</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {!! $transaksi->links() !!}
        </div>
    </div>
@endsection
