<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="{{ route('home', ['lang' => session('langs')]) }}" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" id="logoimg1" class="shows" alt=""> -->
            <img src="{{ asset('assets/img/logo2.jpg') }}" id="logoimg2" alt="logo">
            <h1>DANIKA</h1>
        </a>

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        <nav id="navbar" class="navbar">
            <ul class="ulheader">
                <li class="dropdown">
                    <a class="sub-dropdown" href="#">
                        <span class="laos text-white">{{ __('messages.service_name') }}</span>
                        <i class="bi bi-chevron-down dropdown-indicator"></i>
                    </a>
                    <ul class="subul" style="background-color:rgb(228, 154, 225);">
                        <li>
                            <a href="{{ route('service.cod', ['lang' => session('langs')]) }}"
                                class="laos text-white">{{ __('messages.services.cod') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('service.collection', ['lang' => session('langs')]) }}"
                                class="laos text-white">{{ __('messages.services.collection') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('service-three', ['lang' => session('langs')]) }}"
                                class="laos text-white">{{ __('messages.services.receive') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('service.claim', ['lang' => session('langs')]) }}"
                                class="laos text-white">{{ __('messages.services.claim') }}</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="laos text-white"
                        href="{{ route('tracking', ['lang' => session('langs')]) }}">{{ __('messages.tracking') }}</a>
                </li>
                <li>
                    <a class="laos text-white"
                        href="{{ route('check-price', ['lang' => session('langs')]) }}">{{ __('messages.price_estimation') }}</a>
                </li>
                <li>
                    <a class="laos text-white"
                        href="{{ route('condition', ['lang' => session('langs')]) }}">{{ __('messages.condition') }}</a>
                </li>
                <li>
                    <a class="laos text-white"
                        href="{{ route('promotion', ['lang' => session('langs')]) }}">{{ __('messages.promotion') }}</a>
                </li>
                <li>
                    <a class="laos text-white"
                        href="{{ route('faq', ['lang' => session('langs')]) }}">{{ __('messages.faq') }}</a>
                </li>
                <li>
                    <a class="laos text-white"
                        href="{{ route('contact', ['lang' => session('langs')]) }}">{{ __('messages.contact') }}</a>
                </li>
                <li style="padding-left: 15px">
                    <span
                        onclick="window.location.href='/la/{{ Str::replace('.', '/', Route::current()->getName()) }}'"
                        id="la" role="button" class="laos text-white">LA</span>
                    <span role="button" class="laos text-white">|</span>
                    <span
                        onclick="window.location.href='/en/{{ Str::replace('.', '/', Route::current()->getName()) }}'"
                        id="en" role="button" class="laos text-white">EN</span>
                </li>
            </ul>
        </nav><!-- .navbar -->

    </div>
</header>
<!-- End Header -->
