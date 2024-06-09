@extends('layouts.admin')
@section('content')
    <div class="flex flex-row mb-3 justify-between">
        <h2 class="card-title">Jadwal Kursus</h2>
    </div>

    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <div class="overflow-x-auto">
                <table class="table">
                    <!-- head -->
                    <thead class="bg-base-500">
                    <tr>
                        <th></th>
                        <th>Kode Booking</th>
                        <th>Paket</th>
                        <th>Instruktur</th>
                        <th>Member</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Biaya</th>
                        <th>Tgl. Mulai</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($transaksi as $key => $row)
                        <tr>
                            <th>{{ $transaksi->firstItem() + $key }}.</th>
                            <td>{{ $row->kode }}</td>
                            <td>{{ $row->paket?->nama }}</td>
                            <td>{{ $row->instruktur?->name }}</td>
                            <td>{{ $row->member?->name }}</td>
                            <td>{{ $row->hari }}</td>
                            <td>{{ $row->range_jam }}</td>
                            <td>Rp. {{ $row->paket?->harga_rp }}</td>
                            <td><kbd class="kbd kbd-sm">{{ $row->tgl_mulai_format }}</kbd></td>
                            <td>
                                <a href="{{ route('jadwal.edit', $row) }}" title="Edit" class="btn btn-square btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/>
                                    </svg>

                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {!! $transaksi->links() !!}
        </div>
    </div>
@endsection
