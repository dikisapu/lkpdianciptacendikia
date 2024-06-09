<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
  />
</head>
<body class="bg-gray-100">

<div class="circlePosition w-[590px] h-[400px] bg-[#FFDE95] rounded-[100%] absolute -z-1 top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] blur-[300px]">
    </div>

<div class="blur-[90px] -z-10">

</div>
<!-- Navbar -->

<div class="mx-2 lg:mx-20 min-h-screen">
    <div class="navbar bg-base-100 shadow-lg sticky top-5 rounded-box z-10">
        <div class="flex-1">
            <div class="w-10 rounded-full">
                <img alt="Logo"
                     src="{{ asset('logo.png') }}"/>    
            </div>
            <a href="{{ url('/') }}" class="btn btn-ghost normal-case text-xl">Dian Cipta Cendikia</a>
        </div>
        <div class="flex-none hidden md:block">
            <ul class="menu menu-horizontal p-0">
                @include('layouts._menu-admin')

            </ul>
        </div>
        <div class="flex-none">
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost md:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </label>
                <ul tabindex="0"
                    class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">

                    @include('layouts._menu-admin')

                </ul>
            </div>
            @if(\Illuminate\Support\Facades\Auth::check())
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                            <img alt="user"
                                 src="{{ auth()->user()->foto_url }}"/>
                        </div>
                    </div>
                    <ul tabindex="0"
                        class="menu menu-sm dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </div>
            @else
                <a href="{{ route('auth.form-login') }}" class="btn btn-outline ml-2">Login</a>
            @endif

        </div>
    </div>

    <!-- Main content -->
    <div class="container mt-10 pt-5 pb-20">
        @yield('content')
    </div>
</div>
@if(session()->has('success'))
    <div id="toastr" class="toast toast-top toast-end z-20">
        <div class="alert alert-success">
            <span class="text-white">{{ session('success') }}</span>
        </div>
    </div>
@endif
@if(session()->has('fail'))
    <div id="toastr" class="toast toast-top toast-end z-20">
        <div class="alert alert-error">
            <span class="text-white">{{ session('fail') }}</span>
        </div>
    </div>
@endif
<dialog id="modal_confirm" class="modal">
    <div class="modal-box">
        <h3 class="font-bold text-lg flex flex-row gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z"/>
            </svg>
            Confirm
        </h3>
        <p class="py-4">Apakah anda yakin mneghapus data ini?</p>
        <div class="modal-action">
            <button onclick="event.preventDefault();
                                                     document.getElementById('form_delete').submit();"
                    class="btn btn-error">Iya
            </button>
            <form id="form_delete" action="" method="POST" class="d-none">
                @csrf
                @method('DELETE')
            </form>
            <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Tidak</button>
            </form>
        </div>
    </div>
</dialog>

<script>
    const toastr = document.getElementById('toastr');
    toastr.classList.remove('hidden');
    setTimeout(function () {
        toastr.classList.add('hidden');
    }, 3000); // 3 detik

    function hapus(url) {

        var form = document.getElementById('form_delete')
        form.setAttribute('action', url)
        modal_confirm.showModal()
    }

</script>
@yield('script')

</body>
</html>
