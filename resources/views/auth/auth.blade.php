<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen  bg-gradient-to-r from-yellow-500">
@yield('content')
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
<script>
    const toastr = document.getElementById('toastr');
    toastr.classList.remove('hidden');
    setTimeout(function () {
        toastr.classList.add('hidden');
    }, 3000); // 3 detik

</script>
</body>
</html>
