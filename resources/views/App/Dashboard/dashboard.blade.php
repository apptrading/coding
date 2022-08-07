@extends('Layout.layout_back_end')
@section('title', 'DANIKA | Dashboard')
@section('contents')

    <div class="container py-3">
        @if (Auth::user()->userright != 1)
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center" >Welcome to Danika trading System</h1>
                    <h1 class="text-center" >Hello {{ Auth::user()->name }}...!</h1>
                </div>
            </div>
        @endif
        @if (Auth::user()->userright == 1)
            <div class="row">
                <div class="col-md-3">
                    <div class="shadow p-3 mb-5 bg-body rounded text-center">
                        <h5>ລາຍຮັບຈາກການສົ່ງພັດສະດຸ</h5>
                        <h4>5,000,000 ₭</h4>
                        <h6>ຕໍ່ມື້ {{ date('Y-m-d') }}</h6>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="shadow p-3 mb-5 bg-body rounded text-center">
                        <h5>ລາຍຮັບຈາກການສົ່ງພັດສະດຸ</h5>
                        <h4>5,000,000 ₭</h4>
                        <h6>ມື້ວານ {{ date('Y-m-d') }}</h6>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="shadow p-3 mb-5 bg-body rounded text-center">
                        <h5>ລາຍຮັບຈາກການສົ່ງພັດສະດຸ</h5>
                        <h4>5,000,000 ₭</h4>
                        <h6>ຕໍ່ອາທີດ {{ date('W') }}</h6>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="shadow p-3 mb-5 bg-body rounded text-center">
                        <h5>ລາຍຮັບຈາກການສົ່ງພັດສະດຸ</h5>
                        <h4>5,000,000 ₭</h4>
                        <h6>ຕໍ່ເດືອນ {{ date('m/Y') }}</h6>
                    </div>
                </div>
            </div>
        @endif

    </div>
@endsection
