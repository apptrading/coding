@extends('Layout.layout_front_end')
@section('title', 'Danika | tracking')
@section('contents')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="page-header d-flex align-items-center"
                style="background-image: url('{{ asset('assets/img/lg-h1.png') }}');">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h2 class="laos fw-bold">ການຕິດຕາມພັດສະດຸ</h2>
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
                        <li>Tracking</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Breadcrumbs -->

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="row gy-4">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-9 col-12">
                                    <div class="mb-3">
                                        <input type="email" class="form-control radius-tracking"
                                            id="exampleFormControlInput1">
                                    </div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <center>
                                        <button class="btn btn-gold-two laos radius-tracking w-100">ຄົ້ນຫາ</button>
                                    </center>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Stats Counter Section ======= -->
        <section id="stats-counter" class="stats-counter pt-0">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-md-12">
                        <!-- <div class="card"> -->
                        <!-- <div class="card-body"> -->
                        <!-- <h6 class="card-title">Timeline</h6> -->
                        <div id="content">
                            <ul class="timeline">
                                <li class="event" data-date="12:30 - 1:00pm">
                                    <h3>Registration</h3>
                                    <p>Get here on time, it's first come first serve. Be late, get turned away.
                                    </p>
                                </li>
                                <li class="event" data-date="2:30 - 4:00pm">
                                    <h3>Opening Ceremony</h3>
                                    <p>Get ready for an exciting event, this will kick off in amazing fashion
                                        with MOP &amp; Busta Rhymes as an opening show.</p>
                                </li>
                                <li class="event" data-date="5:00 - 8:00pm">
                                    <h3>Main Event</h3>
                                    <p>This is where it all goes down. You will compete head to head with your
                                        friends and rivals. Get ready!</p>
                                </li>
                                <li class="event" data-date="8:30 - 9:30pm">
                                    <h3>Closing Ceremony</h3>
                                    <p>See how is the victor and who are the losers. The big stage is where the
                                        winners bask in their own glory.</p>
                                </li>
                            </ul>
                        </div>
                        <!-- </div> -->
                        <!-- </div> -->
                    </div>
                </div>

            </div>
        </section><!-- End Stats Counter Section -->
        <!-- ======= Frequently Asked Questions Section ======= -->
        @include('Pages.FAQ.detail_faq')
        <!-- End Frequently Asked Questions Section -->

    </main><!-- End #main -->
@endsection
