@extends('auth.auth')
@section('content')
<div class="lg:w-1/3 w-2/4 card"> <!-- Lebar 40% halaman -->
    <div class="bg-white shadow-lg rounded-lg p-6"> <!-- Border radius dan padding -->
        <h2 class="text-center text-2xl font-bold mb-4">LogIn Kuy</h2>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="mb-3 w-full">
                <label class="flex items-center w-full gap-3 input input-bordered">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
                        <path d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z"/>
                        <path d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z"/>
                    </svg>
                    <input type="text" name="email" value="{{ old('email') }}" class="grow" placeholder="Email"/>
                </label>
                @error('email')
                <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-5 w-full">
                <label class="flex items-center w-full gap-3 input input-bordered">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
                        <path fill-rule="evenodd" d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z" clip-rule="evenodd"/>
                    </svg>
                    <input name="password" type="password" class="grow" value="" placeholder="masukan Password anda"/>
                </label>
                @error('password')
                <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="btn btn-neutral">Login</button>
                <button type="button" class="btn btn-warning">
                    <a href="/" class="w-full h-full text-center flex items-center justify-center">ke beranda</a>
                </button>
                <a class="align-baseline font-bold text-sm text-white-500 hover:text-green-200 btn btn-success flex items-center justify-center"
                   href="{{ route('register') }}">
                    Daftar?
                </a>
            </div>
        </form>
    </div>
</div>


@endsection
