@extends('Layout.layout_front_end')
@section('title', 'DANIKA | Promotion')
@section('contents')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="page-header d-flex align-items-center"
                style="background-image: url('{{ asset('assets/img/lg-h1.png') }}');">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h2 class="laos fw-bold">ໂປໂມຊັ້ນຂອງຮ້ານ</h2>
                            {{-- <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas
                                consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi
                                ratione sint. Sit quaerat ipsum dolorem.</p> --}}
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <div class="container">
                    <ol>
                        <li><a class="tapbar" href="{{ route('home', ['lang' => session('langs')]) }}">Home</a></li>
                        <li>Promotion</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Breadcrumbs -->


        <!-- ======= Services Section ======= -->
        <section id="service" class="services pt-4">
            <div class="container" data-aos="fade-up">
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="card">
                            <div class="card-img">
                                <img src="{{ asset('assets/img/logistics-service.jpg') }}" alt="" class="img-fluid">
                            </div>
                            <h3><a href="service-details.html" class="stretched-link">Logistics</a></h3>
                            <p>Asperiores provident dolor accusamus pariatur dolore nam id audantium ut et iure incidunt
                                molestiae dolor ipsam ducimus occaecati nisi</p>
                        </div>
                    </div><!-- End Card Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="card">
                            <div class="card-img">
                                <img src="{{ asset('assets/img/cargo-service.jpg') }}" alt="" class="img-fluid">
                            </div>
                            <h3><a href="service-details.html" class="stretched-link">Cargo</a></h3>
                            <p>Dicta quam similique quia architecto eos nisi aut ratione aut ipsum reiciendis sit
                                doloremque oluptatem aut et molestiae ut et nihil</p>
                        </div>
                    </div><!-- End Card Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="card">
                            <div class="card-img">
                                <img src="{{ asset('assets/img/trucking-service.jpg') }}" alt="" class="img-fluid">
                            </div>
                            <h3><a href="service-details.html" class="stretched-link">Trucking</a></h3>
                            <p>Dicta quam similique quia architecto eos nisi aut ratione aut ipsum reiciendis sit
                                doloremque oluptatem aut et molestiae ut et nihil</p>
                        </div>
                    </div><!-- End Card Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="card">
                            <div class="card-img">
                                <img src="{{ asset('assets/img/packaging-service.jpg') }}" alt="" class="img-fluid">
                            </div>
                            <h3><a href="service-details.html" class="stretched-link">Packaging</a></h3>
                            <p>Illo consequuntur quisquam delectus praesentium modi dignissimos facere vel cum
                                onsequuntur maiores beatae consequatur magni voluptates</p>
                        </div>
                    </div><!-- End Card Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="card">
                            <div class="card-img">
                                <img src="{{ asset('assets/img/warehousing-service.jpg') }}" alt=""
                                    class="img-fluid">
                            </div>
                            <h3><a href="service-details.html" class="stretched-link">Warehousing</a></h3>
                            <p>Quas assumenda non occaecati molestiae. In aut earum sed natus eatae in vero. Ab modi
                                quisquam aut nostrum unde et qui est non quo nulla</p>
                        </div>
                    </div><!-- End Card Item -->

                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Testimonials Section ======= -->
        @include('Pages.Home.testimonials')
        <!-- End Testimonials Section -->

        <!-- ======= Frequently Asked Questions Section ======= -->
        @include('Pages.FAQ.detail_faq')
        <!-- End Frequently Asked Questions Section -->

    </main><!-- End #main -->
@endsection
