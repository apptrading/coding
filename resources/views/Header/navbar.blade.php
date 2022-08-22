<nav class="navbar sticky-top navbar-light" style="background: #92278f">
    <div class="container-fluid">
        <i class="fas fa-bars" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
            aria-controls="offcanvasExample" style="font-size:28px;cursor: pointer;color: #fff"></i>
        <span style="color: #fff">
            <i class="fas fa-user-circle"></i>
            <span>{{ Auth::user()->name }}</span>
        </span>
    </div>
</nav>


<div class="offcanvas offcanvas-start scrollbar-right" tabindex="-1" id="offcanvasExample"
    aria-labelledby="offcanvasExampleLabel" style="width: 310px;overflow-x:hidden;overflow-y: auto">
    {{-- <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div> --}}
    <div class="d-flex flex-column flex-shrink-0 bg-light" style="width: 310px;height: 100%;">
        <a href="{{ route('app.dashboard') }}" style="padding-top: 18px;padding-left: 25px"
            class="d-flex align-items-center mb-1  me-md-auto link-dark text-decoration-none">
            <img src="{{ asset('assets/img/iconweb/icon.png') }}" width="40" height="32" alt="">
            &nbsp;
            <span class="fs-4">DANIKA LOGISTIC</span>
        </a>
        {{-- <hr> --}}
        <ul class="nav nav-pills flex-column mb-auto" style="width: 100%;">
            @if (Auth::user()->userright == 1)
                <li class="nav-item ">
                    <a href="{{ route('app.dashboard') }}" class="nav-link  list-group-item py-3 active"
                        aria-current="page">
                        <i class="fas fa-home"></i>
                        Dashboard
                    </a>
                </li>
            @endif
            <li>
                <a href="{{ route('app.system.parcel') }}" class="nav-link list-group-item py-3 focus">
                    <i class="fas fa-barcode"></i>
                    ລະບົບຕິດຕາມພັດສະດຸ
                </a>
            </li>
            @if (Auth::user()->userright == 1 || Auth::user()->userright == 2)
                <li>
                    <a href="{{ route('report.menu') }}" class="nav-link list-group-item py-3 focus">
                        <i class="fas fa-sitemap"></i>
                        ສະຫຼຸບພັດສະດຸນຳເຂົ້າ-ສົ່ງອອກ
                    </a>
                </li>
                <li>
                    <a href="{{ route('app.parcel.checkcustOrder') }}" class="nav-link list-group-item py-3 focus">
                        <i class="fas fa-retweet"></i>
                        ອະນຸມັດພັດສະດຸເກັບປາຍທາງ
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link list-group-item py-3 focus">
                        <i class="fas fa-chart-line"></i>
                        ກວດສອບບັນຊີ ກັບ ພັດສະດຸສົ່ງອອກ
                    </a>
                </li>
            @endif

            @if (Auth::user()->userright == 1 || Auth::user()->userright == 2)
                <li>
                    {{-- /** Setting BackEnd **/ --}}
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 role="button" class="accordion-header accordion-button collapsed nav-color-bt"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne" id="flush-headingOne">Setting BackEnd
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">

                                <ul class="nav nav-pills flex-column mb-auto" style="width: 100%">
                                    <li class="nav-item ">
                                        <a href="{{ route('app.UserList') }}"
                                            class="nav-link  list-group-item py-3 focus">
                                            <i class="fas fa-users"></i>
                                            ຜູ້ໄຊງານ
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{{ route('app.branchs') }}"
                                            class="nav-link  list-group-item py-3 focus">
                                            <i class="fas fa-chalkboard-teacher"></i>
                                            ສາຂາ
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{{ route('app.shelfs') }}"
                                            class="nav-link  list-group-item py-3 focus">
                                            <i class="fas fa-warehouse"></i>
                                            ຊັ້ນວາງຂອງ
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{{ route('app.priceofparcel') }}"
                                            class="nav-link  list-group-item py-3 focus">
                                            <i class="fas fa-boxes"></i>
                                            ຕັ້ງຄາລາຄ່າຂອງກ່ອງພັດສະດຸ
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{{ route('app.priceofparcel') }}"
                                            class="nav-link  list-group-item py-3 focus">
                                            <i class="fas fa-recycle"></i>
                                            ຕັ້ງຄາລາຄ່າເລດເງິນ
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        {{-- /** Setting FrontEnd **/ --}}
                        <div class="accordion-item">
                            <h2 role="button" class="accordion-header outline accordion-button collapsed nav-color-bt"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                aria-controls="flush-collapseTwo" id="flush-headingTwo">Setting FrontEnd
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <ul class="nav nav-pills flex-column mb-auto" style="width: 100%">
                                    <li class="nav-item ">
                                        <a href="{{ route('app.dashboard') }}"
                                            class="nav-link  list-group-item py-3 focus">
                                            <i class="fas fa-clipboard-list"></i>
                                            ບໍລິການເກັບເງິນປາຍທາງ
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{{ route('app.dashboard') }}"
                                            class="nav-link  list-group-item py-3 focus">
                                            <i class="fas fa-truck"></i>
                                            ບໍລິການຮັບພັດສະດຸດ້ວຍຕົວເອງ
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{{ route('app.dashboard') }}"
                                            class="nav-link  list-group-item py-3 focus">
                                            <i class="fas fa-shield-alt"></i>
                                            ບໍລິການເຄມສີນຄ້າ
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{{ route('app.dashboard') }}"
                                            class="nav-link  list-group-item py-3 focus">
                                            <i class="fas fa-motorcycle"></i>
                                            ບໍລິການສົ່ງພັດສະດຸຮອດບ້ານທ່ານ
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{{ route('app.dashboard') }}"
                                            class="nav-link  list-group-item py-3 focus">
                                            <i class="fas fa-gavel"></i>
                                            ຂໍ້ກຳໜົດແລະເງື່ອນໄຂການຂົນສົ່ງ
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{{ route('app.dashboard') }}"
                                            class="nav-link  list-group-item py-3 focus">
                                            <i class="fas fa-bullhorn"></i>
                                            ໂປໂມຊັ້ນຂອງຮ້ານ
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{{ route('app.dashboard') }}"
                                            class="nav-link  list-group-item py-3 focus">
                                            <i class="far fa-question-circle"></i>
                                            ຄຳຖາມທີພົບບ່ອຍ
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{{ route('app.dashboard') }}"
                                            class="nav-link  list-group-item py-3 focus">
                                            <i class="fas fa-users"></i>
                                            Testimonials
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 role="button" class="accordion-header accordion-button collapsed nav-color-bt"
                                id="flush-headingThree" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false"
                                aria-controls="flush-collapseThree"> Other
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                <ul class="nav nav-pills flex-column mb-auto" style="width: 100%">
                                    <li class="nav-item ">
                                        <a href="{{ route('app.dashboard') }}"
                                            class="nav-link  list-group-item py-3 focus">
                                            <i class="fab fa-teamspeak"></i>
                                            Other
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{{ route('app.dashboard') }}"
                                            class="nav-link  list-group-item py-3 focus">
                                            <i class="fab fa-teamspeak"></i>
                                            Other
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{{ route('app.dashboard') }}"
                                            class="nav-link  list-group-item py-3 focus">
                                            <i class="fab fa-teamspeak"></i>
                                            Other
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            @endif

        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('assets/img/logo.png') }}" alt="" width="32" height="32"
                    class="rounded-circle me-2">
                <strong>DANIKA LOGISTIC</strong>
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="{{ route('app.LogoutUser') }}">Sign out</a></li>
            </ul>
        </div>
    </div>
</div>
<style>
    .scrollbar-right::-webkit-scrollbar {
        width: .1px;
    }

    .scrollbar-right {
        scrollbar-width: thin;
        scrollbar-color: #ffffff #ffffff;
    }

    .scrollbar-right::-webkit-scrollbar-track {
        background: #ffffff;
    }

    .scrollbar-right::-webkit-scrollbar-thumb {
        background-color: #ffffff;
        border-radius: 15px;
        border: 3px solid #ffffff;
    }


    .focus:hover {
        background-color: #eeeeee !important;
        color: #000 !important;
    }

    .nav-color-bt {
        background-color: #92278f !important;
        color: #fff !important;

    }

    .active {
        background-color: #ecba34 !important;
        color: #fff !important;
    }
</style>
