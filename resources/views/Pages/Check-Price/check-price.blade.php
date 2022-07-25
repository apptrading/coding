@extends('Layout.layout_front_end')
@section('title', 'Danika | Check Price')
@section('contents')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="page-header d-flex align-items-center"
                style="background-image: url('{{ asset('assets/img/lg-h1.png') }}');">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h2 class="laos fw-bold">ກວດສອບ ແລະ ຄຳນວນຄ່າຈັດສົ່ງພັດສະດຸ</h2>
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
                        <li>check price</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Breadcrumbs -->

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <span class="laos">ກວດສອບ ແລະ ຄຳນວນພັດສະດຸ</span>
                    <h2 class="laos">ກວດສອບ ແລະ ຄຳນວນພັດສະດຸ</h2>

                </div>
                <div class="row gy-4">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="row">
                                {{-- <div class="col-md-12">
                                    <h3 class="text-center laos">ກວດສອບ ແລະ ຄຳນວນພັດສະດຸ</h3>
                                </div> --}}
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
                                    <h4 class="laos">ກວດສອບລາຄາ: </h4>
                                    <div style="height:150px;border:.1px solid #ccc;border-radius: 5px;">

                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Frequently Asked Questions Section ======= -->
        @include('Pages.FAQ.detail_faq')
        <!-- End Frequently Asked Questions Section -->

    </main><!-- End #main -->
@endsection
