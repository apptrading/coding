@extends('Layout.layout_back_end')
@section('title', 'DANIKA | Menu')
@section('contents')
    <div class="container py-3">
        <div class="row">
            <div class="col-md-3 col-6 py-2">
                {{-- <div class="shadow-sm p-3 mb-5 bg-body rounded">Small shadow</div> --}}
                <button onclick="window.location.href='{{ route('report.dashboard') }}'" type="button"
                    class="btn btn-primary w-100 fw-bold" style="height: 120px">
                    <i style="font-size: 30px" class="fas fa-dolly"></i>
                    <h5>ສັງລວມພັດສະດຸ</h5>
                </button>
            </div>
            <div class="col-md-3 col-6 py-2">
                {{-- <div class="shadow-sm p-3 mb-5 bg-body rounded">Small shadow</div> --}}
                <button onclick="window.location.href='{{ route('report.sent_out') }}'" type="button"
                    class="btn btn-info w-100 fw-bold" style="height: 120px">
                    <i style="font-size: 30px" class="fas fa-clipboard-list"></i>
                    <h5>ພັດສະດຸທີ່ລູກຄ້າມາຮັບແລ້ວ</h5>
                </button>
            </div>
            <div class="col-md-3 col-6 py-2">
                {{-- <div class="shadow-sm p-3 mb-5 bg-body rounded">Small shadow</div> --}}
                <button onclick="window.location.href='{{ route('report.daily') }}'" type="button"
                    class="btn btn-primary w-100 fw-bold" style="height: 120px">
                    <i style="font-size: 30px" class="fas fa-dolly"></i>
                    <h5>ລາຍການ ແລະ ຍອດລວມທີ່ມີຄ່າປາຍທາງ</h5>
                </button>
            </div>
            <div class="col-md-3 col-6 py-2">
                {{-- <div class="shadow-sm p-3 mb-5 bg-body rounded">Small shadow</div> --}}
                <button onclick="window.location.href='{{ route('report.inside') }}'" type="button"
                    class="btn btn-info w-100 fw-bold" style="height: 120px">
                    <i style="font-size: 30px" class="fas fa-clipboard-list"></i>
                    <h5>ພັດສະດຸທີ່ຍັງຄ້າງສາງລາວ ແລະ ຍັງບໍ່ຈ່າຍເງິນ</h5>
                </button>
            </div>
        </div>
    </div>
@endsection
