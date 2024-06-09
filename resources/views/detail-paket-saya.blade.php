@extends('layouts.front')
@section('content')
    <div class="grid lg:grid-cols-3 gap-4">
        <div class="lg:col-span-2">
            <div class="card lg:card-side bg-base-100 shadow-xl">
                <figure><img src="{{ $transaksi?->paket->foto_url }}" alt="Album"/>
                </figure>
                <div class="card-body">
                    <h2 class="card-title">{{ $transaksi?->paket->nama }}</h2>
                    <p>{{ $transaksi?->paket->keterangan }}</p>
                    <div class="stats lg:stats-horizontal stats-vertical shadow">
                        <div class="stat justify-items-center">
                            <div class="top-figure text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/>
                                </svg>

                            </div>
                            <div class="stat-title font-bold">{{ $transaksi?->paket->jumlah_pertemuan }}</div>
                            <div class="stat-desc">Jumlah Pertemuan</div>
                        </div>

                        <div class="stat justify-items-center">
                            <div class="top-figure text-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                            </div>
                            <div class="stat-title font-bold">{{ $transaksi?->paket->jumlah_jam }}</div>
                            <div class="stat-desc">Jam/Pertemuan</div>
                        </div>
                        <div class="stat justify-items-center">
                            <div class="top-figure text-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z"/>
                                </svg>

                            </div>
                            <div class="stat-desc">{{ $transaksi?->paket->jns_mobil }}</div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card w-full bg-base-100 shadow-xl mt-2">
                <div class="card-body">
                    <h2 class="card-title">Detail Booking</h2>
                    <table class="w-1/2">
                        <tr>
                            <td>Kode Booking</td>
                            <td>:</td>
                            <td><kbd class="kbd kbd-sm">{{ $transaksi->kode }}</kbd></td>
                        </tr>
                        <tr>
                            <td>Tgl. Mulai</td>
                            <td>:</td>
                            <td><kbd class="kbd kbd-sm">{{ $transaksi->tgl_mulai_format }}</kbd></td>
                        </tr>
                        <tr>
                            <td>Tgl. Transaksi</td>
                            <td>:</td>
                            <td><kbd class="kbd kbd-sm">{{ $transaksi->tgl_transaksi_format }}</kbd></td>
                        </tr>
                        <tr>
                            <td>Hari</td>
                            <td>:</td>
                            <td><kbd class="kbd kbd-sm">{{ $transaksi->hari }}</kbd></td>
                        </tr>
                        <tr>
                            <td>Jam</td>
                            <td>:</td>
                            <td><kbd class="kbd kbd-sm">{{ $transaksi->range_jam }}</kbd></td>
                        </tr>
                        <tr>
                            <td>Catatan</td>
                            <td>:</td>
                            <td><kbd class="kbd kbd-sm">{{ $transaksi->catatan }}</kbd></td>
                        </tr>
                        <tr>
                            <td>Status Transaksi</td>
                            <td>:</td>
                            <td><kbd class="kbd kbd-sm">{{ $transaksi->status_transaksi }}</kbd></td>
                        </tr>
                        <tr>
                            <td>Instruktur</td>
                            <td>:</td>
                            <td><kbd class="kbd kbd-sm">{{ $transaksi->instruktur?->name ?? '-' }}</kbd></td>
                        </tr>
                    </table>
                    <div class="card-actions justify-end">
                        <a href="{{ route('my-paket.cetak', $transaksi) }}" target="_blank" class="btn btn-warning btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z"/>
                            </svg>
                            Cetak</a>
                    </div>
                </div>

            </div>
        </div>

        <div>
            <div class="card bg-base-100 shadow-xl">
                @if($transaksi->status_transaksi->menungguPembayaran())
                    <form action="{{ route('my-paket.upload-bukti', $transaksi) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <label class="form-control w-full max-w-xs">
                                <div class="label">
                                    <span class="label-text">Bukti Bayar</span>
                                </div>
                                <input type="file" name="bukti_bayar"
                                       class="file-input file-input-bordered w-full max-w-xs"/>
                                @error('bukti_bayar')
                                <small class="text-error">{{ $message }}</small>
                                @enderror
                            </label>
                            <div class="card-actions justify-end">
                                <button type="submit" class="btn btn-outline btn-block shadow-sm">Upload Bukti Bayar
                                </button>
                            </div>
                        </div>
                    </form>
                @else
                    <div class="card-body">
                        <h2 class="card-title">Bukti Bayar</h2>
                        <a href="{{ $transaksi->bukti_bayar_url }}" target="_blank">
                            <img src="{{ $transaksi->bukti_bayar_url }}" alt="" class="border rounded-box">
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
