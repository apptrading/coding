@extends('Layout.layout_back_end')
@section('title', 'DANIKA | Parcel')
@section('contents')
    <div class="container py-3">
        <div class="row">
            <div class="col-md-3 col-6 py-2">
                {{-- <div class="shadow-sm p-3 mb-5 bg-body rounded">Small shadow</div> --}}
                <button onclick="window.location.href='{{ route('app.system.parcel.normal') }}'" type="button"
                    class="btn btn-primary w-100 fw-bold" style="height: 120px">
                    <i style="font-size: 30px" class="fas fa-dolly"></i>
                    <h5>ບັນທືກພັດສະດູທົ່ວໄປ</h5>
                </button>
            </div>
            <div class="col-md-3 col-6 py-2">
                {{-- <div class="shadow-sm p-3 mb-5 bg-body rounded">Small shadow</div> --}}
                <button onclick="window.location.href='{{ route('app.system.parcel.normal') }}'" type="button"
                    class="btn btn-info w-100 fw-bold" style="height: 120px">
                    <i style="font-size: 30px" class="fas fa-clipboard-list"></i>
                    <h5>ບັນທືກພັດສະດູທີ່ເກັບເງີນປາຍທາງ</h5>
                </button>
            </div>
            <div class="col-md-3 col-6 py-2">
                {{-- <div class="shadow-sm p-3 mb-5 bg-body rounded">Small shadow</div> --}}
                <button onclick="window.location.href='{{ route('app.system.parcel.transfer') }}'" type="button"
                    class="btn btn-warning w-100 fw-bold" style="height: 120px">
                    <i style="font-size: 30px" class="fas fa-shipping-fast"></i>
                    <h5>ສົ່ງພັດສະດູຈາກ ໄທ-ລາວ</h5>
                </button>
            </div>
            <div class="col-md-3 col-6 py-2">
                <button onclick="window.location.href='{{ route('app.system.parcel.receiver') }}'" type="button"
                    class="btn btn-primary w-100 fw-bold" style="height: 120px">
                    <i style="font-size: 30px" class="fas fa-warehouse"></i>
                    <h5>ຮັບພັດສະດູເຂົ້າສູນກາງ</h5>
                </button>
            </div>
            <div class="col-md-3 col-6 py-2">
                <button onclick="window.location.href='{{ route('app.parcel.cust.recieve') }}'" type="button"
                    class="btn btn-success w-100 fw-bold" style="height: 120px">
                    <i style="font-size: 30px" class="far fa-check-circle"></i>
                    <h5>ສົ່ງພັດສະດຸໃຫ້ລູກຄ້າ</h5>
                </button>
            </div>
        </div>
    </div>
@endsection
