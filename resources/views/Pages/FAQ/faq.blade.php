@extends('Layout.layout_front_end')
@section('title', 'DANIKA | FAQ')
@section('contents')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="page-header d-flex align-items-center"
                style="background-image: url('{{ asset('assets/img/lg-h1.png') }}');">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h2 class="laos fw-bold">ຄຳຖາມທີພົບບ່ອຍ</h2>
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
                        <li>FAQ</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Frequently Asked Questions Section ======= -->
        @include('Pages.FAQ.detail_faq')
        <!-- End Frequently Asked Questions Section -->

    </main><!-- End #main -->
@endsection
