<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TablePlay</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/getbootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/main.css')}}">
        <!-- Add Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @livewireStyles
</head>
<body>
    @livewire('navbar')
    {{$slot}}
    @livewireScripts
    <script src="{{asset('bootstrap/js/getbootstrap.min.js')}}"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function () {
        @if(session()->has('success'))
            toastr.success("{{ session('success') }}");
        @endif

        // Check for error messages
        @if(session()->has('error'))
            toastr.error("{{ session('error') }}");
        @endif

        // Other types of messages
        @if(session()->has('info'))
            toastr.info("{{ session('info') }}");
        @endif

        @if(session()->has('warning'))
            toastr.warning("{{ session('warning') }}");
        @endif
        });
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "2000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
            }

    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>