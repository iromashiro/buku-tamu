@extends('../layout/base')

@section('body')

<body class="py-5 md:py-0 bg-black/[0.15] dark:bg-transparent">
    @include('sweetalert::alert')
    @yield('content')
    @include('../layout/components/dark-mode-switcher')
    @include('../layout/components/main-color-switcher')

    <!-- BEGIN: JS Assets-->
    <script
        src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script src="{{ mix('dist/js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
    <script src="{{URL::asset('dist/js/canvasjs.min.js')}}"></script>
    @yield('script')
</body>
@endsection