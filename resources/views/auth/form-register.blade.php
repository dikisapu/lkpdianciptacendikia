@extends('auth.auth')
@section('content')
    <div class="lg:w-1/2 w-3/4 card"> <!-- Lebar 40% halaman -->
        <div class="bg-white shadow-lg rounded-lg" style="padding: 20px"> <!-- Border radius dan padding -->
            <h2 class="text-center text-2xl font-bold mb-4">Registrasi</h2>
            <form action="{{ route('register.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-row mt-10 mb-5 flex-wrap">
                    <div class="basis-1/2 px-2">
                        <div class="divider">Auth</div>
                        <label class="form-control w-full max-w-xs mb-3">
                            <label class="input input-bordered flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                     class="w-4 h-4 opacity-70">
                                    <path
                                        d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z"/>
                                    <path
                                        d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z"/>
                                </svg>
                                <input type="text" name="email" value="{{ old('email') }}" class="grow"
                                       placeholder="Email"/>
                            </label>
                            @error('email')
                            <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </label>
                        <label class="form-control w-full max-w-xs mb-5">
                            <label class="input input-bordered flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                     class="w-4 h-4 opacity-70">
                                    <path fill-rule="evenodd"
                                          d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                                          clip-rule="evenodd"/>
                                </svg>
                                <input name="password" type="password" class="grow" value="" placeholder="Password"/>
                            </label>
                            @error('password')
                            <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </label>
                        <div class="divider">Data Personal</div>
                        <label class="form-control w-full max-w-xs mb-3">
                            <input type="text" placeholder="Nama" name="name"
                                   class="input input-bordered w-full max-w-xs"/>
                            @error('name')
                            <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </label>
                        <label class="form-control w-full max-w-xs mb-3">
                            <input type="text" placeholder="No. Telp" name="no_telp"
                                   class="input input-bordered w-full max-w-xs"/>
                            @error('no_telp')
                            <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </label>
                        <label class="form-control mb-3">
                            <textarea name="alamat" class="textarea textarea-bordered h-24"
                                      placeholder="Alamat"></textarea>
                            @error('alamat')
                            <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </label>
                    </div>
                    <div class="basis-1/2 px-2">
                        <div class="divider">Lampiran</div>
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
                        <label class="form-control w-full max-w-xs mb-3">
                            <div class="label">
                                <span class="label-text">File KK</span>
                            </div>
                            <input type="file" name="kk"
                                   class="file-input file-input-sm  file-input-bordered w-full max-w-xs"/>
                            @error('kk')
                            <small class="text-red-500">{{ $message }}</small>
                            @enderror
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
                        </label>

                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="btn btn-neutral">Simpan</button>
                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800"
                       href="{{ route('auth.form-login') }}">
                        Login?
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
