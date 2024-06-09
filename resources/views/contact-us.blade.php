@extends('layouts.front')
@section('content')
    <div class="text-center mb-5">
        <h3 class="font-bold text-lg">Hubungi Kami</h3>
    </div>
    <div class="grid lg:grid-cols-7 gap-4">
        <div class="col-span-4">
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <form action="{{ route('contasct-us.store') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <label class="form-control w-full  mb-3">
                            <input type="text" placeholder="Nama" value="{{ old('nama') }}" name="nama"
                                   class="input input-bordered w-full"/>
                            @error('nama')
                            <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </label>
                        <label class="form-control w-full  mb-3">
                            <label class="input input-bordered flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>
                                </svg>

                                <input type="email" placeholder="Email" value="{{ old('email') }}" name="email"
                                       class="w-full max-w-xs"/>
                            </label>
                            @error('email')
                            <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </label>
                        <label class="form-control w-full mb-3">
                            <input type="text" placeholder="No. Telp" value="{{ old('no_telp') }}" name="no_telp"
                                   class="input input-bordered w-full "/>
                            @error('no_telp')
                            <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </label>
                        <label class="form-control mb-3">
                            <textarea name="pesan" class="textarea textarea-bordered h-24"
                                      placeholder="Pesan">{{ old('pesan') }}</textarea>
                            @error('pesan')
                            <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </label>
                        <div class="divider"></div>
                        <button class="btn btn-active btn-neutral" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="lg:col-span-3">

            <div class="stats stats-horizontal stats-vertical shadow">
                <div class="stat justify-items-center">
                    <div class="stat-figure text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/>
                        </svg>
                    </div>
                    <div class="stat-title font-bold">Lokasi</div>
                    <div class="stat-desc text-wrap">JL. RADEN INTAN NO. 243 KALIANDA LAMPUNG SELATAN LAMPUNG
                        Kelurahan Kalianda, Kecamatan Kalianda
                        Kota Kabupaten Lampung Selatan, Lampung 35551
                    </div>
                </div>
                <div class="stat justify-items-center">
                    <div class="stat-figure text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/>
                        </svg>
                    </div>
                    <div class="stat-title font-bold">Nomor Telepon</div>
                    <div class="stat-desc">089527575681</div>
                </div>
                <div class="stat justify-items-center">
                    <div class="stat-figure text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>
                        </svg>
                    </div>
                    <div class="stat-title font-bold">Email</div>
                    <div class="stat-desc">lpk.dcckld@gmail.com</div>
                </div>
            </div>
            <div class="rounded-box mt-3 p-2 bg-base-100">
                <div class="mapouter rounded-box">
                    <div class="gmap_canvas">
                        <iframe width="100%" height="250" id="gmap_canvas"
                                src="https://maps.google.com/maps?q=Kalianda%2C+Kec.+Kalianda%2C+Kabupaten+Lampung+Selatan%2C+Lampung+35551%2C+Indonesia&t=&z=20&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        <a href="https://www.analarmclock.com"></a><br><a href="https://www.onclock.net"></a><br>
                        <style>.mapouter {
                                position: relative;
                                text-align: right;
                                height: 250px;
                                width: 100%;
                            }</style>
                        <a href="https://www.ongooglemaps.com">html map area</a>
                        <style>.gmap_canvas {
                                overflow: hidden;
                                background: none !important;
                                height: 250px;
                                width: 100%;
                            }</style>
                    </div>
                </div>
            </div>
        </div>

@endsection
