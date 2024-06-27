@extends('layouts.admin')
@section('content')
    <div class="flex flex-row mb-3 justify-between">
        <h2 class="card-title">Daftar Instruktur</h2>
        <a href="{{ route('instruktur.create') }}" class="btn btn-sm">Buat</a>
    </div>
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <div class="overflow-x-auto">
                <table class="table">
                    <!-- head -->
                    <thead class="bg-base-500">
                    <tr>
                        <th></th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No. telp</th>
                        <th>Alamat</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($instruktur as $key => $row)
                        <tr>
                            <th>{{ $instruktur->firstItem() + $key }}.</th>
                            <td>
                                <div class="avatar">
                                    <div class="w-10 mask mask-squircle">
                                        <img src="{{ $row->foto_url }}"/>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->no_telp }}</td>
                            <td>{{ $row->alamat }}</td>
                            <td>
                                <a href="{{ route('instruktur.edit', $row) }}" class="btn btn-square btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/>
                                    </svg>

                                </a>
                                <button onclick="hapus('{{ url('admin/instruktur/'.$row->id) }}')"
                                        class="btn btn-square btn-error btn-outline btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                                    </svg>

                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {!! $instruktur->links() !!}
        </div>
    </div>
@endsection
