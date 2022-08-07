@extends('Layout.layout_back_end')
@section('title', 'DANIKA | Menu')
@section('contents')
    <div class="container py-3">
        <div class="row">
            <div class="col-md-3 col-6 py-2">
                {{-- <div class="shadow-sm p-3 mb-5 bg-body rounded">Small shadow</div> --}}
                <button onclick="window.location.href='{{ route('report.In_laos') }}'" type="button"
                    class="btn btn-primary w-100 fw-bold" style="height: 120px">
                    <i style="font-size: 30px" class="fas fa-dolly"></i>
                    <h5>ພັດສະດຸຄົງຄັງສາງລາວ</h5>
                </button>
            </div>
            <div class="col-md-3 col-6 py-2">
                {{-- <div class="shadow-sm p-3 mb-5 bg-body rounded">Small shadow</div> --}}
                <button onclick="window.location.href='{{ route('report.out_to_cust') }}'" type="button"
                    class="btn btn-info w-100 fw-bold" style="height: 120px">
                    <i style="font-size: 30px" class="fas fa-clipboard-list"></i>
                    <h5>ພັດສະດຸທີ່ສົ່ງລູກຄ້າແລ້ວ</h5>
                </button>
            </div>
            <div class="col-md-3 col-6 py-2">
                {{-- <div class="shadow-sm p-3 mb-5 bg-body rounded">Small shadow</div> --}}
                <button onclick="window.location.href='{{ route('report.In_laos') }}'" type="button"
                    class="btn btn-primary w-100 fw-bold" style="height: 120px">
                    <i style="font-size: 30px" class="fas fa-dolly"></i>
                    <h5>ພັດສະດຸຄົງຄັງສາງໄທ</h5>
                </button>
            </div>
            <div class="col-md-3 col-6 py-2">
                {{-- <div class="shadow-sm p-3 mb-5 bg-body rounded">Small shadow</div> --}}
                <button onclick="window.location.href='{{ route('report.In_laos') }}'" type="button"
                    class="btn btn-info w-100 fw-bold" style="height: 120px">
                    <i style="font-size: 30px" class="fas fa-clipboard-list"></i>
                    <h5>ພັດສະດຸທີ່ສົ່ງຂ້າມ ໄທ-ລາວ</h5>
                </button>
            </div>
        </div>
    </div>
@endsection
