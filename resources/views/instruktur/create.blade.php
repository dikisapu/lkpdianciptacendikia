@extends('layouts.admin')
@section('content')
    <div class="flex flex-row mb-3 justify-between">
        <h2 class="card-title">Buat Instruktur</h2>
        <a href="javascript:history.back()" class="btn btn-error btn-sm">Kembali</a>
    </div>
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <form action="{{ route('instruktur.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <label class="form-control w-full max-w-lg mb-3">
                    <div class="label">
                        <span class="label-text">Nama</span>
                    </div>
                    <input name="name" value="{{ old('name') }}" type="text" placeholder="Nama"
                           class="input input-bordered w-full"/>
                    @error('name')
                    <div class="label">
                        <span class="label-text-alt text-red-500">{{ $message }}</span>
                    </div>
                    @enderror
                </label>
                <div class="flex flex-row gap-4 max-w-lg">
                    <label class="form-control w-full max-w-lg mb-3">
                        <div class="label">
                            <span class="label-text">Email</span>
                        </div>
                        <label class="input input-bordered flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>
                            </svg>

                            <input name="email" value="{{ old('email') }}" type="email" placeholder="Email"
                                   class="w-full"/>
                        </label>
                        @error('email')
                        <div class="label">
                            <span class="label-text-alt text-red-500">{{ $message }}</span>
                        </div>
                        @enderror
                    </label>
                    <label class="w-full max-w-lg mb-3">
                        <div class="label">
                            <span class="label-text">No. Telp</span>
                        </div>
                        <label class="input input-bordered flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/>
                            </svg>

                            <input name="no_telp" value="{{ old('no_telp') }}" type="number" placeholder="No. Telp"
                                   class="w-full" oninput="limitInputLength(this, 13)" />
                        </label>
                        @error('no_telp')
                        <div class="label">
                            <span class="label-text-alt text-red-500">{{ $message }}</span>
                        </div>
                        @enderror
                    </label>
                </div>
                <label class="form-control max-w-lg mb-3">
                    <div class="label">
                        <span class="label-text">Alamat</span>
                    </div>
                    <textarea name="alamat" class="textarea textarea-bordered h-24"
                              placeholder="Alamat">{{ old('alamat') }}</textarea>
                    @error('alamat')
                    <div class="label">
                        <span class="label-text-alt text-red-500">{{ $message }}</span>
                    </div>
                    @enderror
                </label>
                <label class="form-control w-full max-w-xs mb-3">
                    <div class="label">
                        <span class="label-text">File Foto</span>
                    </div>
                    <input type="file" name="foto"
                           class="file-input file-input-sm  file-input-bordered w-full max-w-xs"/>
                    @error('foto')
                    <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </label>
                <div class="divider"></div>
                <button class="btn btn-active btn-neutral" type="submit">Simpan</button>
            </form>
        </div>
    </div>
@endsection
