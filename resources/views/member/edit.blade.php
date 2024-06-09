@extends('layouts.admin')
@section('content')
    <div class="flex flex-row mb-3 justify-between">
        <h2 class="card-title">Edit Siswa</h2>
        <a href="javascript:history.back()" class="btn btn-error btn-sm">Kembali</a>
    </div>
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <form action="{{ route('member.update', $member) }}" method="post" enctype="multipart/form-data">
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
                        <span class="label-text">File KK</span>
                    </div>
                    <input type="file" name="kk"
                           class="file-input file-input-sm  file-input-bordered w-full max-w-xs"/>
                    @error('kk')
                    <small class="text-red-500">{{ $message }}</small>
                    @enderror
                    <img src="{{ $member->member->kk_url }}" class="border my-1" alt="">
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
                    <img src="{{ $member->member->ktp_url }}" class="border my-1" alt="">
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
                    <img src="{{ $member->member->ijazah_url }}" class="border my-1" alt="">
                </label>
                <div class="divider"></div>
                <button class="btn btn-active btn-neutral" type="submit">Simpan</button>
            </form>
        </div>
    </div>
@endsection
