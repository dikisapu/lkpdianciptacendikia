@extends('layouts.front')
@section('content')
    <div class="grid lg:grid-cols-3 gap-4">
        <div class="col-span-2">
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <form action="{{ route('my-profile.update', $member) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label class="form-control w-full max-w-xs mb-3">
                            <input type="text" placeholder="Nama" value="{{ $member->name }}" name="name"
                                   class="input input-bordered w-full max-w-xs"/>
                            @error('name')
                            <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </label>
                        <label class="form-control w-full max-w-xs mb-3">
                            <input type="text" placeholder="No. Telp" value="{{ $member->no_telp }}" name="no_telp"
                                   class="input input-bordered w-full max-w-xs"/>
                            @error('no_telp')
                            <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </label>
                        <label class="form-control mb-3">
                            <textarea name="alamat" class="textarea textarea-bordered h-24"
                                      placeholder="Alamat">{{ $member->alamat }}</textarea>
                            @error('alamat')
                            <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </label>
                        <div class="divider">Lampiran</div>
                        <div class="grid lg:grid-cols-2 gap-2">
                            <label class="form-control w-full max-w-xs mb-3">
                                <div class="label">
                                    <span class="label-text">File Foto</span>
                                </div>
                                <input type="file" name="foto"
                                       class="file-input file-input-sm  file-input-bordered w-full max-w-xs"/>
                                @error('foto')
                                <small class="text-red-500">{{ $message }}</small>
                                @enderror
                                <img src="{{ $member->foto_url }}" class="border my-1" alt="">
                            </label>
                            <label class="form-control w-full max-w-xs mb-3">
                                <div class="label">
                                    <span class="label-text">File KTP</span>
                                </div>
                                <input type="file" name="ktp"
                                       class="file-input file-input-sm  file-input-bordered w-full max-w-xs"/>
                                @error('ktp')
                                <small class="text-red-500">{{ $message }}</small>
                                @enderror
                                @if(optional($member->member)->isImage('ktp/' . optional($member->member)->ktp))
                                    <img src="{{ $member->member->ktp_url }}" class="border my-1" alt="">
                                @else
                                    <a href="{{ optional($member->member)->ktp_url }}" target="_blank"
                                       class="btn my-1">{{ optional($member->member)->ktp_url }}</a>
                                @endif
                            </label>
                            <label class="form-control w-full max-w-xs mb-3">
                                <div class="label">
                                    <span class="label-text">File Ijazah</span>
                                </div>
                                <input type="file" name="ijazah"
                                       class="file-input file-input-sm  file-input-bordered w-full max-w-xs"/>
                                @error('ijazah')
                                <small class="text-red-500">{{ $message }}</small>
                                @enderror
                                @if(optional($member->member)->isImage('ijazah/' . optional($member->member)->ijazah))
                                    <img src="{{ $member->member->ijazah_url }}" class="border my-1" alt="">
                                @else
                                    <a href="{{ optional($member->member)->ijazah_url }}" target="_blank"
                                       class="btn my-1">{{ optional($member->member)->ijazah_url }}</a>
                                @endif
                            </label>
                        </div>
                        <div class="divider"></div>
                        <button class="btn btn-active btn-neutral" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
        <div>
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <form action="{{ route('my-profile.reset') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label class="form-control w-full max-w-xs mb-3">
                            <label class="input input-bordered flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>
                                </svg>
                                <input type="email" placeholder="Email" value="{{ auth()->user()->email }}" name="email"
                                       class="w-full max-w-xs"/>
                            </label>
                            @error('email')
                            <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </label>
                        <label class="form-control w-full max-w-xs mb-3">
                            <label class="input input-bordered flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z"/>
                                </svg>
                                <input type="password" placeholder="New Password" value="" name="password"
                                       class="w-full max-w-xs"/>
                            </label>
                            @error('password')
                            <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </label>
                        <div class="divider"></div>
                        <button class="btn btn-active btn-neutral" type="submit">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
