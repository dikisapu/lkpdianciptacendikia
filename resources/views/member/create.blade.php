@extends('layouts.admin')
@section('content')
    <div class="flex flex-row mb-3 justify-between">
        <h2 class="card-title">Buat Paket</h2>
        <a href="javascript:history.back()" class="btn btn-error btn-sm">Kembali</a>
    </div>
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <form action="{{ route('paket.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <label class="form-control w-full max-w-lg mb-3">
                    <div class="label">
                        <span class="label-text">Nama</span>
                    </div>
                    <input name="nama" value="{{ old('nama') }}" type="text" placeholder="Nama"
                           class="input input-bordered w-full"/>
                    @error('nama')
                    <div class="label">
                        <span class="label-text-alt text-red-500">{{ $message }}</span>
                    </div>
                    @enderror
                </label>
                <div class="flex flex-row gap-4 max-w-lg">
                    <label class="form-control w-full max-w-lg mb-3">
                        <div class="label">
                            <span class="label-text">Jenis</span>
                        </div>
                        <input name="jenis" value="{{ old('jenis') }}" type="text" placeholder="Jenis"
                               class="input input-bordered w-full"/>
                        @error('jenis')
                        <div class="label">
                            <span class="label-text-alt text-red-500">{{ $message }}</span>
                        </div>
                        @enderror
                    </label>
                    <label class="w-full max-w-lg mb-3">
                        <div class="label">
                            <span class="label-text">Harga</span>
                        </div>
                        <label class="input input-bordered flex items-center gap-2">
                            Rp.
                            <input name="harga" value="{{ old('harga') }}" type="number" placeholder="Harga"
                                   class="w-full"/>
                        </label>
                        @error('harga')
                        <div class="label">
                            <span class="label-text-alt text-red-500">{{ $message }}</span>
                        </div>
                        @enderror
                    </label>
                </div>
                <div class="flex flex-row gap-4 max-w-lg">
                    <label class="form-control w-full max-w-lg mb-3">
                        <div class="label">
                            <span class="label-text">Jumlah Pertemuan</span>
                        </div>
                        <label class="input input-bordered flex items-center gap-2">
                            <input name="jumlah_pertemuan" value="{{ old('jumlah_pertemuan') }}" type="number"
                                   placeholder="Jumlah Pertemuan"
                                   class="w-full"/>
                            <span class="badge">Pertemuan</span>
                        </label>
                        @error('jumlah_pertemuan')
                        <div class="label">
                            <span class="label-text-alt text-red-500">{{ $message }}</span>
                        </div>
                        @enderror
                    </label>
                    <label class="w-full max-w-lg mb-3">
                        <div class="label">
                            <span class="label-text">Jumlah Jam</span>
                        </div>
                        <label class="input input-bordered flex items-center gap-2">
                            <input name="jumlah_jam" value="{{ old('jumlah_jam') }}" type="number"
                                   placeholder="Jumlah Jam"
                                   class="w-full"/>
                            <span class="badge">/Pertemuan</span>
                        </label>
                        @error('jumlah_jam')
                        <div class="label">
                            <span class="label-text-alt text-red-500">{{ $message }}</span>
                        </div>
                        @enderror
                    </label>
                </div>
                <label class="form-control max-w-lg mb-3">
                    <div class="label">
                        <span class="label-text">Keterangan</span>
                    </div>
                    <textarea name="keterangan" class="textarea textarea-bordered h-24"
                              placeholder="Keterangan">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                    <div class="label">
                        <span class="label-text-alt text-red-500">{{ $message }}</span>
                    </div>
                    @enderror
                </label>
                <label class="form-control w-full max-w-lg mb-5">
                    <div class="label">
                        <span class="label-text">Cover</span>
                    </div>
                    <input name="foto" type="file" class="file-input file-input-bordered w-full"/>
                    @error('foto')
                    <div class="label">
                        <span class="label-text-alt text-red-500">{{ $message }}</span>
                    </div>
                    @enderror
                </label>
                <div class="divider"></div>
                <button class="btn btn-active btn-neutral" type="submit">Simpan</button>
            </form>
        </div>
    </div>
@endsection
