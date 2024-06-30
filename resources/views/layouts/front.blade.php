<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <style>
        #hero-slideshow {
            background-size: cover;
            background-position: center;
            transition: background-image 1s ease-in-out;
        }
    </style>
</head>

<body class=" bg-gray-100 bg-gradient-to-t to-gray-200">

    <div
        class="circlePosition w-[590px] h-[400px] bg-[#feb71f] rounded-[100%] absolute -z-1 top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] blur-[300px]">
    </div>

    <div class="mx-2 lg:mx-20 min-h-screen">
        <div class="navbar bg-base-100 shadow-lg sticky top-5 rounded-box z-10">
            <div class="flex-1">
                <div class="w-10 rounded-full">
                    <img alt="Logo" src="{{ asset('logo.png') }}" />
                </div>
                <a href="{{ url('/') }}" class="btn btn-ghost normal-case text-xl">Dian Cipta Cendikia</a>
            </div>
            <div class="flex-none hidden md:block">
                <ul class="menu menu-horizontal p-0">
                    @include('layouts._menu')
                </ul>
            </div>
            <div class="flex-none">
                <div class="dropdown dropdown-end">
                    <label tabindex="0" class="btn btn-ghost md:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </label>
                    <ul tabindex="10"
                        class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                        @include('layouts._menu')
                    </ul>
                </div>
                @if (\Illuminate\Support\Facades\Auth::check())
                    <div class="dropdown dropdown-end">
                        <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                            <div class="w-10 rounded-full">
                                <img alt="User" src="{{ auth()->user()->foto_url }}" />
                            </div>
                        </div>
                        <ul tabindex="0"
                            class="menu menu-sm dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                            @if (auth()->user()->role->isMember())
                                <li>
                                    <a href="{{ route('my-profile') }}" class="justify-between">
                                        Profile
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->role->isAdmin())
                                <li>
                                    <a href="{{ url('/admin') }}" class="justify-between">
                                        Menu admin
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->role->isMember())
                                <li><a href="{{ route('my-paket') }}">Paket Saya</a></li>
                            @endif
                            <li><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('auth.form-login') }}" class="btn btn-outline ml-2">Masuk</a>
                @endif
            </div>
        </div>

        <!-- Main content -->
        <div class="container mt-10 pt-5 pb-20">
            @yield('content')
        </div>
    </div>
    @if (session()->has('success'))
        <div id="toastr" class="toast toast-top toast-end z-20">
            <div class="alert alert-success">
                <span class="text-white">{{ session('success') }}</span>
            </div>
        </div>
    @endif
    @if (session()->has('fail'))
        <div id="toastr" class="toast toast-top toast-end z-20">
            <div class="alert alert-error">
                <span class="text-white">{{ session('fail') }}</span>
            </div>
        </div>
    @endif
    <script>
        
        document.addEventListener("DOMContentLoaded", function () {
            const images = [
                "{{ asset('gedung.jpg') }}",
                "{{ asset('image2.jpg') }}", // Pastikan mengganti 'image1.jpg' dengan nama file yang benar
                "{{ asset('image3.jpg') }}", // Pastikan mengganti 'image1.jpg' dengan nama file yang benar
                "{{ asset('image4.jpg') }}", // Pastikan mengganti 'image1.jpg' dengan nama file yang benar
                "{{ asset('image5.jpg') }}"  // Pastikan mengganti 'image2.jpg' dengan nama file yang benar
            ];
            let currentIndex = 0;

            function changeBackground() {
                const slideshow = document.getElementById('hero-slideshow');
                slideshow.style.backgroundImage = `url('${images[currentIndex]}')`;
                currentIndex = (currentIndex + 1) % images.length;
            }

            setInterval(changeBackground, 5000); // Ganti gambar setiap 5 detik
            changeBackground(); // Panggil fungsi pertama kali untuk menginisiasi gambar pertama
        });
        const toastr = document.getElementById('toastr');
        toastr.classList.remove('hidden');
        setTimeout(function() {
            toastr.classList.add('hidden');
        }, 3000); // 3 detik
    </script>
</body>

</html>
