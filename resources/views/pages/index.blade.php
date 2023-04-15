<!-- ======= Header ======= -->
@extends('layouts.master')
<!-- End Header -->

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container" data-aos="fade-in">
            <h1>Welcome to eCommunity</h1>
            <h2>Community circle for family, friends &amp; more...</h2>
            <p><a href="/app" class="btn-get-started scrollto mr-3">Community</a>
                <a href="/app/select-community" class="btn-get-started scrollto">User</a>
            </p>
            <div class="btns">
                <a href="#"><i class="fa fa-apple fa-3x"></i> App Store</a>
                <a href="#"><i class="fa fa-play fa-3x"></i> Google Play</a>
                <a href="#"><i class="fa fa-windows fa-3x"></i> windows</a>
            </div>
        </div>
    </section><!-- End Hero Section -->

    <main id="main">

        @include('partials.get-started-section')

        @include('partials.about-us-section')

        @include('partials.features-section')

        @include('partials.screenshot-section')

        @include('partials.testimonials-section')

        @include('partials.newsletter-section')

        @include('partials.contact-section')

    </main><!-- End #main -->
@endsection
