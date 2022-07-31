@extends('Layout.layout_front_end')
@section('title', 'Danika | Home')
@section('contents')

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row gy-4 d-flex justify-content-between">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" style="height: 460px;">
                    <h2 data-aos="fade-up" class="laos">ການຕິດຕາມພັດສະດຸຂອງທ່ານ</h2>

                    <!-- <p data-aos="fade-up" data-aos-delay="100">Facere distinctio molestiae nisi fugit tenetur repellat non
                                                                                                            praesentium nesciunt optio quis sit odio nemo quisquam. eius quos reiciendis eum vel eum voluptatem eum
                                                                                                            maiores eaque id optio ullam occaecati odio est possimus vel reprehenderit</p> -->

                    <form action="#" style="border-radius:50px !important"
                        class="form-search d-flex align-items-stretch mb-3" data-aos="fade-up" data-aos-delay="200">
                        <input type="text" class="form-control laos" placeholder="ກະລຸນາໃສ່ເລກພັດສະດຸຂອງທ່ານ">
                        <button type="submit" class="btn btn-gold laos"
                            style="border-radius:50px !important">ຕິດຕາມ</button>
                    </form>

                    <div class="row gy-4" data-aos="fade-up" data-aos-delay="400">

                        <div class="col-lg-3 col-6">
                            <div class="stats-item text-center w-100 h-100">
                                <span data-purecounter-start="0" data-purecounter-end="6532" data-purecounter-duration="1"
                                    class="purecounter textColor"></span>
                                <p class="textColor laos">ຂົນສົ່ງພາຍໃນ</p>
                            </div>
                        </div><!-- End Stats Item -->

                        <div class="col-lg-3 col-6">
                            <div class="stats-item text-center w-100 h-100">
                                <span data-purecounter-start="0" data-purecounter-end="8821" data-purecounter-duration="1"
                                    class="purecounter textColor"></span>
                                <p class="textColor laos">ຂົນສົ່ງຕ່າງປະເທດ</p>
                            </div>
                        </div><!-- End Stats Item -->

                        <div class="col-lg-3 col-6">
                            <div class="stats-item text-center w-100 h-100">
                                <span data-purecounter-start="0" data-purecounter-end="100" data-purecounter-duration="1"
                                    class="purecounter textColor"></span>
                                <p class="textColor laos">ສາຂາ ແລະ ໂຕແທນ</p>
                            </div>
                        </div><!-- End Stats Item -->

                        <div class="col-lg-3 col-6">
                            <div class="stats-item text-center w-100 h-100">
                                <span data-purecounter-start="0" data-purecounter-end="5632" data-purecounter-duration="1"
                                    class="purecounter textColor"></span>
                                <p class="textColor laos">ຜູ້ໃຊ້ບໍລິການ</p>
                            </div>
                        </div><!-- End Stats Item -->

                    </div>
                </div>

                <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                    <img src="{{ asset('assets/img/logo-22.png') }}" class="img-fluid mb-3 mb-lg-0" alt="">
                </div>

            </div>
        </div>
    </section><!-- End Hero Section -->

    <main id="main">

        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services">
            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up">
                        <div class="shadow p-3 mb-1 bg-white rounded" style="height: 250px;">
                            <div class="icon flex-shrink-0 text-center py-1">
                                <i class="fas fa-clipboard-list"></i>
                            </div>
                            <div>
                                <h4 class="title text-center laos py-1">ບໍລິການເກັບເງິນປາຍທາງ</h4>
                                <p class="description" style="height:100px;">
                                    Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint
                                    occaecati cupiditate non provident
                                </p>
                                <a href="#" class="readmore stretched-link"><span>Learn More</span><i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="shadow p-3 mb-1 bg-white rounded" style="height: 250px;">
                            <div class="icon flex-shrink-0 text-center py-1">
                                <i class="fas fa-route"></i>
                            </div>
                            <div>
                                <h4 class="title text-center laos py-1">ບໍລິການຮັບພັດສະດຸດ້ວຍຕົວເອງ</h4>
                                <p class="description" style="height:100px;">
                                    Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                    commodo consequat tarad limino ata
                                </p>
                                <a href="#" class="readmore stretched-link"><span>Learn More</span><i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="shadow p-3 mb-1 bg-white rounded" style="height: 250px;">
                            <div class="icon flex-shrink-0 text-center py-1">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                            <div>
                                <h4 class="title text-center laos py-1">ບໍລິການສົ່ງພັດສະດຸຮອດບ້ານທ່ານ</h4>
                                <p class="description" style="height:100px;">
                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                    fugiat nulla pariatur
                                </p>
                                <a href="#" class="readmore stretched-link"><span>Learn More</span><i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>

                    </div><!-- End Service Item -->

                </div>

            </div>
        </section><!-- End Featured Services Section -->

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about pt-0">
            <div class="container" data-aos="fade-up">

                <div class="row gy-4">
                    <div class="col-lg-6 position-relative align-self-start order-lg-last order-first">
                        <img src="{{ asset('assets/img/logo-2.jpg') }}" class="img-fluid" alt="">
                        <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a>
                    </div>
                    <div class="col-lg-6 content order-last  order-lg-first">
                        <h3 class="laos">ຄຳນວນພັດສະດຸ</h3>
                        <p>
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text laos" id="basic-addon1">ນ້ຳໜັກ (kg)</span>
                                    <input type="text" class="form-control laos">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text laos" id="basic-addon1">ຍາວ (cm)</span>
                                    <input type="text" class="form-control laos">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text laos" id="basic-addon1">ກວ້າງ (cm)</span>
                                    <input type="text" class="form-control laos">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text laos" id="basic-addon1">ສູງ (cm)</span>
                                    <input type="text" class="form-control laos">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h5 class="laos">ກວດສອບລາຄາ: </h5>
                                <div style="height:150px;border:.1px solid #ccc;border-radius: 5px;">

                                </div>
                            </div>
                        </div>
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Services Section ======= -->

        <!-- ======= Call To Action Section ======= -->
        <section id="call-to-action" class="call-to-action">
            <div class="container" data-aos="zoom-out">

                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h3 class="laos">ໂທສາຍດ່ວນ</h3>
                        <p>
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                            pariatur.
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
                            id est
                            laborum.
                        </p>
                        <a class="cta-btn laos" href="tel:+8562029946365">ໂທດ່ວນ</a>
                    </div>
                </div>

            </div>
        </section><!-- End Call To Action Section -->

        <!-- ======= Features Section ======= -->
        <section id="features" class="features">
            <div class="container">

                <div class="row gy-4 align-items-center features-item" data-aos="fade-up">

                    <div class="col-md-5">
                        <img src="{{ asset('assets/img/features-1.jpg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-7">
                        <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
                        <p class="fst-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore
                            magna aliqua.
                        </p>
                        <ul>
                            <li><i class="bi bi-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                            <li><i class="bi bi-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                            <li><i class="bi bi-check"></i> Ullam est qui quos consequatur eos accusamus.</li>
                        </ul>
                    </div>
                </div><!-- Features Item -->

                <div class="row gy-4 align-items-center features-item" data-aos="fade-up">
                    <div class="col-md-5 order-1 order-md-2">
                        <img src="{{ asset('assets/img/features-2.jpg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-7 order-2 order-md-1">
                        <h3>Corporis temporibus maiores provident</h3>
                        <p class="fst-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore
                            magna aliqua.
                        </p>
                        <p>
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                            in
                            voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in
                            culpa qui officia deserunt mollit anim id est laborum
                        </p>
                    </div>
                </div><!-- Features Item -->

                <div class="row gy-4 align-items-center features-item" data-aos="fade-up">
                    <div class="col-md-5">
                        <img src="{{ asset('assets/img/features-3.jpg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-7">
                        <h3>Sunt consequatur ad ut est nulla consectetur reiciendis animi voluptas</h3>
                        <p>Cupiditate placeat cupiditate placeat est ipsam culpa. Delectus quia minima quod. Sunt saepe odit
                            aut
                            quia voluptatem hic voluptas dolor doloremque.</p>
                        <ul>
                            <li><i class="bi bi-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                            <li><i class="bi bi-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                            <li><i class="bi bi-check"></i> Facilis ut et voluptatem aperiam. Autem soluta ad fugiat.</li>
                        </ul>
                    </div>
                </div><!-- Features Item -->

                <div class="row gy-4 align-items-center features-item" data-aos="fade-up">
                    <div class="col-md-5 order-1 order-md-2">
                        <img src="{{ asset('assets/img/features-4.jpg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-7 order-2 order-md-1">
                        <h3>Quas et necessitatibus eaque impedit ipsum animi consequatur incidunt in</h3>
                        <p class="fst-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore
                            magna aliqua.
                        </p>
                        <p>
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                            in
                            voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in
                            culpa qui officia deserunt mollit anim id est laborum
                        </p>
                    </div>
                </div><!-- Features Item -->

            </div>
        </section><!-- End Features Section -->

        <!-- ======= Pricing Section ======= -->

        <!-- ======= Testimonials Section ======= -->
        @include('Pages.Home.testimonials')
        <!-- End Testimonials Section -->

        <!-- ======= Frequently Asked Questions Section ======= -->
        @include('Pages.FAQ.detail_faq')
        <!-- End Frequently Asked Questions Section -->

    </main><!-- End #main -->

@endsection
