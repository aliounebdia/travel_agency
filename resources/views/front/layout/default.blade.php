<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Altitude Voyage Group</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="voyage,altitude,group,visa,passeport,touki,emigrer,exploration,decouverte" name="keywords">
    <meta content="Votre passerelle vers l'exploration du monde et l'aventure sans tracas" name="description">

    <!-- Favicon -->
    <link href="{{ asset('images/favicon.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
          rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('theme/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet"/>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('theme/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('theme/css/style.css') }}" rel="stylesheet">
</head>

<body>
<!-- Spinner Start -->
{{--<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">--}}
{{--<div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">--}}
{{--<span class="sr-only">Loading...</span>--}}
{{--</div>--}}
{{--</div>--}}
<!-- Spinner End -->

@include('front.layout.top-bar')

        <!-- Navbar & Hero Start -->
<div class="container-fluid position-relative p-0">
    @include('front.layout.navigation')

    @include('front.layout.hero-slider')
</div>
<!-- Navbar & Hero End -->

@yield('content')

@include('front.layout.footer')

        <!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('theme/lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('theme/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('theme/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('theme/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('theme/lib/tempusdominus/js/moment.min.js') }}"></script>
<script src="{{ asset('theme/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
<script src="{{ asset('theme/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('theme/js/main.js') }}"></script>
<script>
    $('.nav-item.nav-link').on("click", function () {
        $('.nav-item.nav-link').removeClass('active');
        $(this).addClass('active');
    });​
</script>
</body>

</html>