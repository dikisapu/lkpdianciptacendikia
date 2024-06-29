<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class=" flex items-center justify-center min-h-screen ">
    {{-- <body class="bg-[#fcfcfc]"> --}}
    <div
        class="circlePosition w-[590px] h-[400px] bg-[#ddea51] rounded-[100%] absolute -z-1 top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] blur-[200px]">
    </div>
    @yield('content')
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
        const toastr = document.getElementById('toastr');
        toastr.classList.remove('hidden');
        setTimeout(function() {
            toastr.classList.add('hidden');
        }, 3000); // 3 detik
        function limitInputLength(element, maxLength) {
            const warningMessage = document.getElementById('warning-message');
            if (element.value.length > maxLength) {
                element.value = element.value.slice(0, maxLength);
                warningMessage.style.display = 'block';
            } else {
                warningMessage.style.display = 'none';
            }
        }
    </script>
</body>

</html>
