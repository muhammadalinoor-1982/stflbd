<!doctype html>
<html class="no-js" lang="en">

<head>
    @include('backend.backendlayout.loginlayout._head')
</head>

<body class="skin-dark">

<div class="main-wrapper">

    <!-- Content Body Start -->
    <div class="content-body m-0 p-0">

        <div class="login-register-wrap">
            <div class="row">

                <div class="d-flex align-self-center justify-content-center order-2 order-lg-1 col-lg-5 col-12">
                    @include('backend.backendlayout.loginlayout._messages')
                    @yield('content')
                </div>

                <div class="login-register-bg order-1 order-lg-2 col-lg-7 col-12">
                    <div class="content">
                        <h1>Sign in</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>

            </div>
        </div>

    </div><!-- Content Body End -->

</div>

<!-- JS
============================================ -->

<!-- Global Vendor, plugins & Activation JS -->
@include('backend.backendlayout.loginlayout._script')

</body>

</html>

