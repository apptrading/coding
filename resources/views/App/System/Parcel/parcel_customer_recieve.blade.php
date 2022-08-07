@extends('Layout.layout_back_end')
@section('title', 'DANIKA | Customer Recieve')
@section('contents')
    <div class="container py-2">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('app.parcel.ParcelCustomerRecieve') }}" method="POST" enctype="multipart/form-data"
                    id="frm-customer-recieve">
                    <input type="hidden" name="id" id="id" value="{{ $datas->id }}">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exampleFormControlInput11" class="form-label">ເລກລະຫັດບາໂຄດ</label>
                                <input type="text" class="form-control" id="exampleFormControlInput11"
                                    value="{{ $datas->parcel_barcode }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exampleFormControlInput12" class="form-label">ຊື່ລູກຄ້າ</label>
                                <input type="text" class="form-control" id="exampleFormControlInput12"
                                    value="{{ $datas->customer_name }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput13" class="form-label">ເບີໂທ</label>
                                <input type="text" class="form-control" id="exampleFormControlInput13"
                                    value="{{ $datas->customer_tell }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput14" class="form-label">ເບີວັອດແອັບ</label>
                                <input type="text" class="form-control" id="exampleFormControlInput14"
                                    value="{{ $datas->customer_whatsapp }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput15" class="form-label">ຄວາມກວ້າງ</label>
                                <input type="text" class="form-control" id="exampleFormControlInput15"
                                    value="{{ $datas->parcel_width }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput16" class="form-label">ຄວາມຍາວ</label>
                                <input type="text" class="form-control" id="exampleFormControlInput16"
                                    value="{{ $datas->parcel_length }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput17" class="form-label">ຄວາມສູງ</label>
                                <input type="text" class="form-control" id="exampleFormControlInput17"
                                    value="{{ $datas->parcel_height }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput18" class="form-label">ນ້ຳໜັກ</label>
                                <input type="text" class="form-control" id="exampleFormControlInput18"
                                    value="{{ $datas->parcel_kg }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput19" class="form-label">ລວມ</label>
                                <input type="text" class="form-control" id="exampleFormControlInput19"
                                    value="{{ $datas->parcel_total }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="mb-3">
                                <label for="price" class="form-label">ລາຄາ</label>
                                <input type="text" class="form-control" id="price"
                                    value="{{ $datas->parcel_countpayment }}" readonly>
                            </div>
                        </div>

                        <div class="col-md-3 col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput111"
                                    class="form-label">ຊື່ຜູ້ບັນທືກພັດສະດຸເຂົ້າສາງ</label>
                                <input type="text" class="form-control" id="exampleFormControlInput111"
                                    value="{{ $datas->name }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput112"
                                    class="form-label">ວັນທີ່ຮັບພັດສະດຸເຂົ້າສາງ</label>
                                <input type="text" class="form-control" id="exampleFormControlInput112"
                                    value="{{ $datas->parcel_receivedate }}" readonly>
                            </div>
                        </div>

                        <div class="col-md-3 col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput113"
                                    class="form-label">ຊື່ຜູ້ສົ່ງພັດສະດຸໃຫ້ລູກຄ້າ</label>
                                <input type="text" class="form-control" id="exampleFormControlInput113"
                                    value="{{ Auth::user()->name }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="mb-3">
                                <label for="parcel_outdate" class="form-label">ວັນທີ່ສົ່ງພັດສະດຸໃຫ້ລູກຄ້າ</label>
                                <input type="text" class="form-control" id="parcel_outdate" name="parcel_outdate"
                                    value="{{ date('Y-m-d') }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-3 py-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymenttype" id="paymenttype1"
                                        value="1" checked {{ $customerCount > 0 ? 'disabled' : '' }}>
                                    <label class="form-check-label" for="paymenttype1">
                                        ຈ່າຍເງີນສົດ
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymenttype" id="paymenttype2"
                                        value="2" {{ $customerCount > 0 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="paymenttype2">
                                        ໂອນຈ່າຍ
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-6">
                            <div class="mb-3">
                                <label for="parcel_payment" class="form-label">ຈຳນວນເງີນຮັບຈາກລູກຄ້າ</label>
                                <input type="text" class="form-control" id="parcel_payment" name="parcel_payment"
                                    required value="{{ number_format($customerCount) }}"
                                    {{ $customerCount > 0 ? 'readonly' : '' }}>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="mb-3">
                                <label for="payment_return" class="form-label">ຈຳນວນເງີນທອນຄືນລູກຄ້າ</label>
                                <input type="text" class="form-control" id="payment_return" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="mb-3">
                                <label for="exampleFormControlInput116" class="form-label">ຫຼັກຖານການຈ່າຍ</label>
                                <input class="form-control" type="file" id="filepayment" name="filepayment">
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="mb-3">
                                {{-- <label for="exampleFormControlInput117" class="form-label">ລາຍເຊັນລູກຄ້າ</label> --}}
                                <input type="hidden" name="signature_img" id="signature_img" class="form-control mb-2">
                                <div style="width: 100%;height: 200px;">
                                    <canvas id="sig" class="sig"
                                        style="border:1px solid red;width: 100%;height: 200px;"></canvas>
                                    <i class="fab fa-adn" role="button" id="save-png"
                                        style="top: -45px;position: relative;font-size: 35px;left: 5px;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-secondary float-start d-none d-lg-block d-md-block" type="button"
                                onclick="window.location.href='{{ route('app.parcel.cust.recieve') }}'"><i
                                    class="fas fa-reply-all"></i> ຍ້ອນກັບ</button>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-danger me-md-2" id="clear" type="button">ລົບລາຍເຊັນ</button>

                                <button id="btnSave" class="btn btn-primary" type="submit">
                                    <i class="fas fa-save"></i>
                                    ບັນທືກ</button>

                                <button class="btn btn-secondary float-start d-sm-none d-lg-none d-md-none" type="button"
                                    onclick="window.location.href='{{ route('app.parcel.cust.recieve') }}'"><i
                                        class="fas fa-reply-all"></i> ຍ້ອນກັບ</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#paymenttype1').click(function() {
                $('#filepayment').prop('required', false);

                $('#parcel_payment').prop('readonly', false)
                $('#parcel_payment').val('')
                $('#payment_return').val('')
            })
            $('#paymenttype2').click(function() {
                $('#filepayment').prop('required', true);

                $('#parcel_payment').prop('readonly', true)
                $('#parcel_payment').val($('#price').val())
                $('#payment_return').val('0')
            })

            $('#frm-customer-recieve').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: new FormData(this),
                    contentType: false,
                    dataType: 'json',
                    processData: false,
                    cashe: false,
                    beforeSend: function() {
                        $('#btnSave').html(
                            '<i class="fas fa-spinner fa-pulse"></i> ກຳລັງກວດສອບ...')
                        $('#btnSave').prop('disabled', true)
                    },
                    success: function(result) {
                        console.log(result);
                        $('#btnSave').prop('disabled', false)
                        $('#btnSave').html('ບັນທືກ')
                        $('#frm-customer-recieve')[0].reset();
                        _complete()
                        window.location.href = '{{ route('app.parcel.cust.recieve') }}';
                    },
                    error: function(err) {
                        console.log(err);
                        $('#btnSave').prop('disabled', false)
                        $('#btnSave').html('ບັນທືກ')
                    }
                });
            });


            $('#parcel_payment').keyup(function() {
                var n = parseInt($(this).val().replace(/\D/g, ''), 10);
                // console.log(n.toLocaleString());
                if (n.toLocaleString() != "NaN") {
                    $(this).val(n.toLocaleString());
                } else {
                    $(this).val('');
                }
            })
            $('#parcel_payment').blur(function() {
                var _split = $(this).val().split(',');
                var _payment = _split[0] + _split[1];
                if (parseInt(_payment) >= $('#price').val()) {

                    var _tt = (_payment - $('#price').val());
                    $('#payment_return').val(_tt.toLocaleString())
                } else {
                    $(this).val('')
                }
            })



        });



        function _complete() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal
                        .stopTimer)
                    toast.addEventListener('mouseleave', Swal
                        .resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'successfully'
            })
        }


        function _error_sign() {
            Swal.fire(
                'ກະລຸນາລົງລາຍເຊັນ',
                '',
                'error'
            )
        }
        $('#btnSave').prop('disabled', true)
        var canvas = document.getElementById('sig');

        function resizeCanvas() {
            var ratio = Math.max(window.devicePixelRatio || 1, 1);
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = canvas.offsetHeight * ratio;
            canvas.getContext("2d").scale(ratio, ratio);
        }

        window.onresize = resizeCanvas;
        resizeCanvas();

        var signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgb(255, 255, 255)' // necessary for saving image as JPEG; can be removed is only saving as PNG or SVG
        });

        var data = signaturePad.toDataURL('image/png');
        console.log(data);
        $('#signature_img').val(data);


        document.getElementById('save-png').addEventListener('click', function() {
            if (signaturePad.isEmpty()) {
                return _error_sign()
            }

            var data = signaturePad.toDataURL('image/png');
            document.getElementById('signature_img').value = data;
            $('#btnSave').prop('disabled', false)
            // console.log(data);
        });
        document.getElementById('clear').addEventListener('click', function() {
            signaturePad.clear();
            $('#btnSave').prop('disabled', true)
        });
    </script>
@endsection
