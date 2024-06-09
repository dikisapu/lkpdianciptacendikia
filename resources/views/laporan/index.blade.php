@extends('layouts.admin')
@section('content')
    <div class="flex flex-row mb-3 justify-between ">
        <h2 class="card-title">Laporan</h2>
    </div>
    <form action="{{ route('laporan.index') }}" method="get">
        <div class="card bg-base-100 shadow-xl">
        <div class="flex flex-row gap-3 bg-base-100 p-3 rounded-box mb-2 shadow-md">
            <label class="form-control w-full max-w-xs">
                <div class="label">
                    <span class="label-text">Tanggal Mulai</span>
                </div>
                <input required name="tgl_mulai" value="{{ request()->tgl_mulai }}" type="date"
                       placeholder="Tanggal Mulai"
                       class="input input-bordered w-full max-w-xs"/>
            </label>
            <label class="form-control w-full max-w-xs">
                <div class="label">
                    <span class="label-text">Tanggal Sampai</span>
                </div>
                <input required name="tgl_sampai" value="{{ request()->tgl_sampai }}" type="date"
                       placeholder="Tanggal Mulai"
                       class="input input-bordered w-full max-w-xs"/>
            </label>
            <label class="form-control">
                <div class="label">
                    <span class="label-text">&nbsp;</span>
                </div>
                <button type="submit" class="btn btn-active btn-neutral">Lihat Laporan</button>
            </label>
            <label class="form-control">
                <div class="label">
                    <span class="label-text">&nbsp;</span>
                </div>
                <a href="{{ route('laporan.cetak', request()->input()) }}" target="_blank" class="btn btn-active btn-warning">Cetak</a>
            </label>
        </div>
    </form>
    @if(request()->tgl_mulai)

        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <div class="overflow-x-auto">
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
                        @foreach($transaksi as $key => $row)
                            <tr>
                                <th>{{ $transaksi->firstItem() + $key }}.</th>
                                <td>{{ $row->kode }}</td>
                                <td>{{ $row->tgl_transaksi_format }}</td>
                                <td>{{ $row->tgl_bayar_format }}</td>
                                <td>Rp. {{ $row->paket?->harga_rp }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {!! $transaksi->links() !!}
            </div>
        </div>
    </div>
    @endif

@endsection
