@extends('Layout.layout_back_end')
@section('title', 'DANIKA | Parcel Normal')
@section('contents')
    <div class="container py-2">
        <div class="row">
            <div class="col-md-6 col-6">
                <button onclick="window.location.href='{{ route('app.system.parcel.normal.pc') }}'" class="btn btn-primary w-100"
                    style="height:120px">
                    <i class="fas fa-desktop" style="font-size: 30px"></i><br>
                    Computer PC / Laptop</button>
            </div>
            <div class="col-md-6 col-6">
                <button onclick="window.location.href='{{ route('app.system.parcel.normal.mb') }}'" class="btn btn-info w-100" style="height:120px">
                    <i class="fas fa-tablet-alt" style="font-size: 30px"></i><br>
                    Mobile</button>
            </div>
            <div class="col-md-4 col-6"></div>
        </div>
    </div>
@endsection
