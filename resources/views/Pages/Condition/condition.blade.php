@extends('Layout.layout_front_end')
@section('title', 'DANIKA | Condition')
@section('contents')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="page-header d-flex align-items-center"
                style="background-image: url('{{ asset('assets/img/lg-h1.png') }}');">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h2 class="laos fw-bold">ຂໍ້ກຳໜົດແລະເງື່ອນໄຂການຂົນສົ່ງ</h2>
                            {{-- <p>
                                Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas
                                consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi
                                ratione sint. Sit quaerat ipsum dolorem.
                            </p> --}}
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <div class="container">
                    <ol>
                        <li><a class="tapbar" href="{{ route('home', ['lang' => session('langs')]) }}">Home</a></li>
                        <li>condition</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Breadcrumbs -->

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="row gy-4">
                    <div class="col-lg-6 position-relative align-self-start order-lg-last order-first">
                        <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="">
                        <!-- <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a> -->
                    </div>
                    <div class="col-lg-6 content order-last  order-lg-first">
                        <h3 class="laos">ຂໍ້ກຳໜົດແລະເງື່ອນໄຂການຂົນສົ່ງ</h3>
                        <p>
                            Dolor iure expedita id fuga asperiores qui sunt consequatur minima. Quidem voluptas
                            deleniti. Sit quia molestiae quia quas qui magnam itaque veritatis dolores. Corrupti totam
                            ut eius incidunt reiciendis veritatis asperiores placeat.
                        </p>
                        <ul>
                            <li data-aos="fade-up" data-aos-delay="100">
                                <i class="fas fa-award"></i>
                                <div>
                                    <h5>Ullamco laboris nisi ut aliquip consequat</h5>
                                    <p>Magni facilis facilis repellendus cum excepturi quaerat praesentium libre trade
                                    </p>
                                </div>
                            </li>
                            <li data-aos="fade-up" data-aos-delay="200">
                                <i class="fas fa-award"></i>
                                <div>
                                    <h5>Magnam soluta odio exercitationem reprehenderi</h5>
                                    <p>Quo totam dolorum at pariatur aut distinctio dolorum laudantium illo direna
                                        pasata redi</p>
                                </div>
                            </li>
                            <li data-aos="fade-up" data-aos-delay="300">
                                <i class="fas fa-award"></i>
                                <div>
                                    <h5>Voluptatem et qui exercitationem</h5>
                                    <p>Et velit et eos maiores est tempora et quos dolorem autem tempora incidunt maxime
                                        veniam</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </section>
        <section id="condition" class="about">
            <div class="container" data-aos="fade-up">

                <div class="row gy-4">
                    <div class="col-lg-12 content order-last  order-lg-first">
                        <h3 class="laos">ມາດຕະຖານການສົ່ງສີນຄ້າ</h3>
                        <p>
                            Dolor iure expedita id fuga asperiores qui sunt consequatur minima. Quidem voluptas
                            deleniti. Sit quia molestiae quia quas qui magnam itaque veritatis dolores. Corrupti totam
                            ut eius incidunt reiciendis veritatis asperiores placeat.
                        </p>
                        <ul>
                            <li data-aos="fade-up" data-aos-delay="100">
                                <i class="fas fa-award"></i>
                                <div>
                                    <h5>Ullamco laboris nisi ut aliquip consequat</h5>
                                    <p>Magni facilis facilis repellendus cum excepturi quaerat praesentium libre trade
                                    </p>
                                </div>
                            </li>
                            <li data-aos="fade-up" data-aos-delay="200">
                                <i class="fas fa-award"></i>
                                <div>
                                    <h5>Magnam soluta odio exercitationem reprehenderi</h5>
                                    <p>Quo totam dolorum at pariatur aut distinctio dolorum laudantium illo direna
                                        pasata redi</p>
                                </div>
                            </li>
                            <li data-aos="fade-up" data-aos-delay="300">
                                <i class="fas fa-award"></i>
                                <div>
                                    <h5>Voluptatem et qui exercitationem</h5>
                                    <p>Et velit et eos maiores est tempora et quos dolorem autem tempora incidunt maxime
                                        veniam</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </section>
        <section id="condition" class="about">
            <div class="container" data-aos="fade-up">
                <div class="row gy-4">
                    <div class="col-md-12 content order-last  order-lg-first">
                        <h3 class="laos text-center">ສີນຄ້າ ຫຼື ພັດສະດຸບໍ່ເໝາະສົມ</h3>
                    </div>
                    <div class="col-md-3 text-center" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{ asset('assets/img/causion.png') }}" style="width: 150px; height:150px;"
                            class="testimonial-img rounded-circle" alt="">
                        <br>
                        <span class="laos fw-bold">ພັດສະດຸບໍ່ເໝາະສົມ</span>
                    </div>
                    <div class="col-md-3 text-center" data-aos="fade-up" data-aos-delay="150">
                        <img src="{{ asset('assets/img/causion.png') }}" style="width: 150px; height:150px;"
                            class="testimonial-img rounded-circle" alt="">
                        <br>
                        <span class="laos fw-bold">ພັດສະດຸບໍ່ເໝາະສົມ</span>
                    </div>
                    <div class="col-md-3 text-center" data-aos="fade-up" data-aos-delay="200">
                        <img src="{{ asset('assets/img/causion.png') }}" style="width: 150px; height:150px;"
                            class="testimonial-img rounded-circle" alt="">
                        <br>
                        <span class="laos fw-bold">ພັດສະດຸບໍ່ເໝາະສົມ</span>
                    </div>
                    <div class="col-md-3 text-center" data-aos="fade-up" data-aos-delay="250">
                        <img src="{{ asset('assets/img/causion.png') }}" style="width: 150px; height:150px;"
                            class="testimonial-img rounded-circle" alt="">
                        <br>
                        <span class="laos fw-bold">ພັດສະດຸບໍ່ເໝາະສົມ</span>
                    </div>
                    <div class="col-md-3 text-center" data-aos="fade-up" data-aos-delay="300">
                        <img src="{{ asset('assets/img/causion.png') }}" style="width: 150px; height:150px;"
                            class="testimonial-img rounded-circle" alt="">
                        <br>
                        <span class="laos fw-bold">ພັດສະດຸບໍ່ເໝາະສົມ</span>
                    </div>
                    <div class="col-md-3 text-center" data-aos="fade-up" data-aos-delay="350">
                        <img src="{{ asset('assets/img/causion.png') }}" style="width: 150px; height:150px;"
                            class="testimonial-img rounded-circle" alt="">
                        <br>
                        <span class="laos fw-bold">ພັດສະດຸບໍ່ເໝາະສົມ</span>
                    </div>
                    <div class="col-md-3 text-center" data-aos="fade-up" data-aos-delay="400">
                        <img src="{{ asset('assets/img/causion.png') }}" style="width: 150px; height:150px;"
                            class="testimonial-img rounded-circle" alt="">
                        <br>
                        <span class="laos fw-bold">ພັດສະດຸບໍ່ເໝາະສົມ</span>
                    </div>
                    <div class="col-md-3 text-center" data-aos="fade-up" data-aos-delay="450">
                        <img src="{{ asset('assets/img/causion.png') }}" style="width: 150px; height:150px;"
                            class="testimonial-img rounded-circle" alt="">
                        <br>
                        <span class="laos fw-bold">ພັດສະດຸບໍ່ເໝາະສົມ</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- ======= Testimonials Section ======= -->
        @include('Pages.Home.testimonials')
        <!-- End Testimonials Section -->

        <!-- ======= Frequently Asked Questions Section ======= -->
        @include('Pages.FAQ.detail_faq')
        <!-- End Frequently Asked Questions Section -->

    </main><!-- End #main -->
@endsection
