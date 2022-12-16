<!DOCTYPE HTML>
<html>

@include('store.master.layouts.head')

<body>
        <!-- header -->
        @include('store.master.layouts.header')
        <!-- End header  -->

        <!-- main -->
        @yield('content')
        <!-- end main -->
        
        <!-- footer -->
        @include('store.master.layouts.footer')
        <!--end  footer -->
   

    <!-- jQuery -->
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js')}}" type="text/javascript"></script>
    <!-- jQuery Easing -->
    <script src="{{ asset('store/js/jquery.easing.1.3.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('store/js/bootstrap.min.js') }}"></script>
    <!-- Waypoints -->
    <script src="{{ asset('store/js/jquery.waypoints.min.js') }}"></script>
    <!-- Flexslider -->
    <script src="{{ asset('store/js/jquery.flexslider-min.js') }}"></script>

    <script src="{{ asset('store/js/owl.carousel.min.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('store/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('store/js/magnific-popup-options.js') }}"></script>

<!-- Stellar Parallax -->
    <script src="{{ asset('store/js/jquery.stellar.min.js')}}"></script>
    <!-- Main -->
    <script src="{{ asset('store/js/main.js') }}"></script>

    <script src="{{ asset('js/noti.js') }}"></script>

    <script>
        window.translationJsons = {!! $translationJson !!};
    </script>

    <script>
        if({{ Auth::check() }}){
            window.user = {{ Auth::id() }};
        }
    </script>
</body>

</html>
