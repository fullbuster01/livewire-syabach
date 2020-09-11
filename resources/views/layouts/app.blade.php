<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">

    {{-- styles --}}
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> --}}
    @livewireStyles
</head>
<body>
    <div id="app">
        <livewire:navbar>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @include('includes.footer')

    {{-- <script src="{{ asset('bootstrap/bootstrap.min.js') }}"></script> --}}
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>
    {{-- <script></script> --}}
    <script>
        // window.livewire.on('alert', param => {
        //     toastr[param['type']](param['message']);
        //     });
        
        // $(document).ready(function(){
            
            $(".ps-slider").owlCarousel({
                loop: false,
                margin: 10,
                nav: true,
                items: 3,
                dots: false,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                smartSpeed: 1200,
                autoHeight: false,
                autoplay: true,
            });

            $('.product-thumbs-track .pt').on('click', function () {
            $('.product-thumbs-track .pt').removeClass('active');
            $(this).addClass('active');
            var imgurl = $(this).data('imgbigurl');
            var bigImg = $('.product-big-img').attr('src');
            if (imgurl != bigImg) {
                $('.product-big-img').attr({
                    src: imgurl
                });
                $('.zoomImg').attr({
                    src: imgurl
                });
            }
        });

        // $('.product-pic-zoom').zoom();
        // })
    </script>
    @livewireScripts
    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
</body>
</html>
