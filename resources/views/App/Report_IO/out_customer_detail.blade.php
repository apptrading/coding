@extends('Layout.layout_back_end')
@section('title', 'DANIKA | Out Customer')
@section('contents')
    <div class="container py-3">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        {{-- https://sengsavang.org/wp-content/uploads/2020/11/One-pay-SSV.png --}}
                        <img width="323" height="473"
                            src="{{ $parcel->parcel_picturepayment == 'na' ? 'https://sengsavang.org/wp-content/uploads/2020/11/One-pay-SSV.png' : $parcel->parcel_picturepayment }}"
                            alt="">
                    </div>
                    <div class="col-md-6">
                        {{-- parcel_picturepayment --}}
                        <img class="img-thumbnail" src="{{ $parcel->parcel_signature }}" alt="">
                        {{-- <span>{{$parcel->parcel_picturepayment }}</span> --}}
                    </div>
                    <div class="col-md-12 text-center">
                        {{-- <span>{{ $parcel }}</span> --}}
                        <h2>Barcode: {{ $parcel->parcel_barcode }} || ລາຄາ: {{ $parcel->parcel_payment }}</h2>
                        <h2>ຂະໜາດ:{{ $parcel->parcel_width }}cm*{{ $parcel->parcel_length }}cm*{{ $parcel->parcel_height }}cm
                            || ນຳໜັກ:{{ $parcel->parcel_kg }}Kg</h2>
                        <h2>ວັນທີ່ຮັບເຂົ້າສາງ: {{ $parcel->parcel_receivedate }} || ວັນທີ່ສົ່ງລູກຄ້າ:
                            {{ $parcel->parcel_outdate }}</h2>
                        <h2>ລູກຄ້າ: {{ $parcel->customer_name }} </h2>
                        <h2>ຊຳລະໂດຍ: {{ $parcel->paymenttype == 1 ? 'ເງິນສົດ' : 'ໂອນຈ່າຍ' }} </h2>
                        <h2>ຜູ້ມອບສີນຄ້າ:{{ $parcel->name }} </h2>
                        <button class="btn btn-secondary"
                            onclick="window.location.href='{{ route('report.out_to_cust') }}'"><i
                                class="fas fa-reply-all"></i> ຍ້ອນກັບ</button>
                    </div>

                </div>
                <div class="col-8">

                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    </div>
@endsection
