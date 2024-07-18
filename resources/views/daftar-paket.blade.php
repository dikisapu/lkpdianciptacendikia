@extends('layouts.front')
@section('content')
    <div class="justify-center">
        <div class="grid lg:grid-cols-3 gap-4">
            @foreach($pakets as $row)
                <div class="card shadow-lg bg-base-100">
                    <figure><img src="{{ $row->foto_url }}"
                                 alt="img" class="object-cover h-48 w-full"/>
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title">{{ $row->nama }}</h2>
                        <p>{{ $row->keterangan }}</p>
                        <div class="flex gap-2 flex-wrap">
                            <div class="badge badge-outline">{{ $row->jns_mobil }}</div>
                            <div class="badge badge-outline">{{ $row->jumlah_pertemuan }}x Pertemuan</div>
                            <div class="badge badge-outline">{{ $row->jumlah_jam }} Jam/Pertemuan</div>
                            <div class="badge badge-outline">{{ $row->kelas }} </div>
                        </div>
                        <div class="card-action flex flex-row justify-between items-center mt-2">
                            <span class="font-bold">Rp. {{ $row->harga_rp }}</span>
                            <a href="{{ route('detail-paket', $row) }}" class="btn btn-warning shadow-sm">Beli Sekarang !</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
