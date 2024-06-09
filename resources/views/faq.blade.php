@extends('layouts.front')
@section('content')
    <div class="text-center mb-5">
        <h3 class="font-bold text-lg">FAQS</h3>
    </div>
    <div class="grid">
        <div class="col-span-4">
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body text-center">
                    <div class="flex flex-col gap-2">
                        <div class="flex flex-row items-center gap-3">
                            <kbd class="kbd font-bold">Q</kbd>
                            <span>:</span>
                            <span>Bagaimana cara booking paket jasa fotografi disini?</span>
                        </div>
                        <div class="flex flex-row items-center gap-3">
                            <kbd class="kbd font-bold">A</kbd>
                            <span>:</span>
                            <span>Pertama anda harus mendaftar dahulu sebagai member melalui menu yang disediakan.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
