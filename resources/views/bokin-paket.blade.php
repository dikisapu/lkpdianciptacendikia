@extends('layouts.front')
@section('content')
    <div class="grid lg:grid-cols-3 gap-4">
        <div class="lg:col-span-2">
            <div class="card lg:card-side bg-base-100 shadow-xl">
                <figure><img src="{{ $paket->foto_url }}" alt="Album"/>
                </figure>
                <div class="card-body">
                    <h2 class="card-title">{{ $paket->nama }}</h2>
                    <p>{{ $paket->keterangan }}</p>
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
                            <div class="stat-title font-bold">{{ $paket->jumlah_pertemuan }}</div>
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
                            <div class="stat-title font-bold">{{ $paket->jumlah_jam }}</div>
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
                            <div class="stat-desc">{{ $paket->jns_mobil }}</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="card bg-base-100 shadow-xl">
            <form action="{{ route('boking-paket.store', $paket) }}" method="post">
                @csrf
                <div class="card-body">
                    <label class="form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text">Tanggal Mulai</span>
                        </div>
                        <input type="date" name="tgl_mulai" required placeholder="Type here"
                               class="input input-bordered w-full max-w-xs"/>
                        @error('tgl_mulai')
                        <small class="text-error">{{ $message }}</small>
                        @enderror
                    </label>
                    <label class="form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text">Pilih Hari</span>
                        </div>
                        <select class="select select-bordered" required name="hari">
                            <option disabled selected>Pilih</option>
                            @foreach(\App\Enums\HariJadwalEnum::cases() as $row)
                                <option value="{{ $row->value }}">{{ $row->value }}</option>
                            @endforeach
                        </select>
                        @error('hari')
                        <small class="text-error">{{ $message }}</small>
                        @enderror
                    </label>
                    <label class="form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text">Pilih Jam</span>
                        </div>
                        <select class="select select-bordered" required name="range_jam">
                            <option disabled selected>Pilih</option>
                            @foreach(\App\Enums\JamJadwalEnum::cases() as $row)
                                <option value="{{ $row->value }}">{{ $row->value }}</option>
                            @endforeach
                        </select>
                        @error('range_jam')
                        <small class="text-error">{{ $message }}</small>
                        @enderror
                    </label>
                    <label class="form-control">
                        <div class="label">
                            <span class="label-text">Catatan</span>
                        </div>
                        <textarea required name="catatan" class="textarea textarea-bordered h-24"
                                  placeholder="Catatan"></textarea>
                    </label>
                    <div class="card-actions justify-end">
                        <button type="submit" class="btn btn-outline btn-block shadow-sm">Order
                            Now
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
