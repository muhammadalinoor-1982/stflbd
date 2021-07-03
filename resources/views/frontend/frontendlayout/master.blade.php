<!DOCTYPE html>
<html lang="en">
@include('frontend.frontendlayout._head')
<body class="cms-index-index cms-home-page">

<!-- Newsletter Popup -->
{{--@include('frontend.frontendlayout._popupNewsLater')--}}
<!-- Mobile Menu -->
{{--@include('frontend.frontendlayout._mobileMenu')--}}
<div id="page">
    <!-- Header -->
    @include('frontend.frontendlayout._header')
    <!-- end header -->
    @yield('content')
    <!-- Footer -->
    @include('frontend.frontendlayout._footer')
</div>
@include('frontend.frontendlayout._script')
</body>
</html>
