<!doctype html>
<html class="no-js" lang="en">

<!-- Head Start -->
@include('backend.backendlayout._head')
<!-- Head End -->

<body class="skin-dark">

<div class="main-wrapper">


    <!-- Header Section Start -->
    @include('backend.backendlayout._header')
    <!-- Side Header Start -->
    @include('backend.backendlayout._sideHeader')
    <!-- Content Body Start -->
    <div class="content-body">
    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">

        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3>Sujana Tread, Fashion and Luxury
                    <span>@include('backend.backendlayout._messages')</span>
                </h3>
            </div>
        </div><!-- Page Heading End -->

        <!-- Page Button Group Start -->
        {{--<div class="col-12 col-lg-auto mb-20">
            <div class="page-date-range">
                <input type="text" class="form-control input-date-predefined">
            </div>
        </div>--}}
        <!-- Page Button Group End -->

    </div>
    <!-- Page Headings End -->
    @yield('content')
    </div>
<!-- Content Body End -->
    <!-- Footer Section Start -->
    @include('backend.backendlayout._footer')
    <!-- Footer Section End -->

</div>

<!-- JS Start -->
@include('backend.backendlayout._script')
<!-- Js End -->
</body>

</html>
