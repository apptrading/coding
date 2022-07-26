@extends('Layout.layout_back_end')
@section('title', 'DANIKA | Parcel')
@section('contents')
    <div class="container py-3">
        <div class="row">
            <div class="col-md-3 col-6 py-2">
                {{-- <div class="shadow-sm p-3 mb-5 bg-body rounded">Small shadow</div> --}}
                <button onclick="window.location.href='{{ route('app.system.parcel.normal.parcel_menu_scan') }}'" type="button"
                    class="btn btn-primary w-100 fw-bold" style="height: 120px">
                    <i style="font-size: 30px" class="fas fa-file-alt"></i>
                    <h5>ພັດສະດຸທີ່ເຊັນຮັບຢູ່ສາງໄທ</h5>
                </button>
            </div>

            <div class="col-md-3 col-6 py-2">
                {{-- <div class="shadow-sm p-3 mb-5 bg-body rounded">Small shadow</div> --}}
                <button onclick="window.location.href='{{ route('app.system.parcel.transfer') }}'" type="button"
                    class="btn btn-info w-100 fw-bold" style="height: 120px">
                    <i style="font-size: 30px" class="fas fa-shipping-fast"></i>
                    <h5>ພັດສະດຸທີ່ກຳລັງຂົນສົ່ງມາລາວ</h5>
                </button>
            </div>
            <div class="col-md-3 col-6 py-2">
                <button onclick="window.location.href='{{ route('app.system.parcel.receiverstore') }}'" type="button"
                    class="btn btn-primary w-100 fw-bold" style="height: 120px">
                    <i style="font-size: 30px" class="fas fa-warehouse"></i>
                    <h5>ບັນທຶກພັດສະດຸເຂົ້າສາງຫຼັກ</h5>
                </button>
            </div>

            <div class="col-md-3 col-6 py-2">
                <button onclick="window.location.href='{{ route('app.system.parcel.customer_Receive') }}'" type="button"
                    class="btn btn-info w-100 fw-bold" style="height: 120px">
                    {{-- <i style="font-size: 30px" class="fas fa-warehouse"></i> --}}
                    <img style="width:60px;" src="{{ asset('/public/images/icons/receiving-box.webp') }}" alt="codIcon">
                    <h5>ພັດສະດຸທີ່ລູກຄ້າຮັບໄປແລ້ວ</h5>
                    {{--  --}}
                </button>
            </div>

            {{-- <div class="col-md-3 col-6 py-2">
                <button onclick="window.location.href='{{ route('app.parcel.cust.recieve') }}'" type="button"
                    class="btn btn-success w-100 fw-bold" style="height: 120px">
                    <i style="font-size: 30px" class="far fa-check-circle"></i>
                    <h5>ສົ່ງພັດສະດຸໃຫ້ລູກຄ້າ</h5>
                </button>
            </div> --}}
            @if (Auth::user()->userright == 1 || Auth::user()->userright == 2)
                {{-- <div class="col-md-3 col-6 py-2">
                    <button onclick="window.location.href='{{ route('app.parcel.custOrder') }}'" type="button"
                        class="btn w-100 fw-bold" style="height: 120px;background-color: #ff9900">
                        <i style="font-size: 30px" class="	fas fa-folder-open"></i>
                        <h5>ບັນທືກພັດສະດຸລູກຄ້າທີ່ເກັບເງິນປາຍທາງ</h5>
                    </button>
                </div> --}}
            @endif

            {{-- <div class="col-md-3 col-6 py-2">
                <button onclick="window.location.href='{{ route('app.parcel.checkcustOrder') }}'" type="button"
                    class="btn btn-info w-100 fw-bold" style="height: 120px;">
                    <i style="font-size: 30px" class="	fas fa-folder-open"></i>
                    <h5>ກວດສອບພັດສະດູເກັບປາຍທາງ</h5>
                </button>
            </div> --}}

            <div class="col-md-3 col-6 py-2">
                {{-- <div class="shadow-sm p-3 mb-5 bg-body rounded">Small shadow</div> --}}
                <button onclick="window.location.href='{{ route('app.parcel.DailyparcelView') }}'" type="button"
                    class="btn btn-info w-100 fw-bold" style="height: 120px">
                    <img style="width:60px;" src="{{ asset('/public/images/icons/cod.png') }}" alt="codIcon">
                    <h5>ພັດສະດຸທີ່ເກັບເງິນປາຍທາງ</h5>
                </button>
            </div>

        </div>
    </div>
@endsection
