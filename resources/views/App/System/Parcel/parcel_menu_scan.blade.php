@extends('Layout.layout_back_end')
@section('title', 'DANIKA | Parcel Scand')
@section('contents')

    <div class="container py-2">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3 col-6">
                {{-- <div class="shadow-sm p-3 mb-5 bg-body rounded">Small shadow</div> --}}
                <button onclick="window.location.href='{{ route('app.system.parcel.normal') }}'" type="button"
                    class="btn btn-info w-100 fw-bold" style="height: 120px">
                    <i style="font-size: 30px" class="fas fa-file-alt"></i>
                    <h5>ບັນທືກລາຍການດຽວ</h5>
                </button>
            </div>
            <div class="col-md-3 col-6">
                {{-- <div class="shadow-sm p-3 mb-5 bg-body rounded">Small shadow</div> --}}
                <button onclick="window.location.href='{{ route('app.system.parcel.normal_multiple') }}'" type="button"
                    class="btn btn-primary w-100 fw-bold" style="height: 120px">
                    <i style="font-size: 30px" class="fas fa-file-alt"></i>
                    <h5>ບັນທືກຫຼາຍລາຍການພ້ອມກັນ</h5>
                </button>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

@endsection
