@extends('Layout.layout_back_end')
@section('title', 'DANIKA | Storage')
@section('contents')
    <div class="container py-2">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form action="{{ route('app.parcel.add') }}" method="POST" enctype="multipart/form-data" id="frm_parcel">
                    <input type="date" style="display: none" name="datein" id="datein" value="{{ date('Y-m-d') }}">
                    <input type="date" style="display: none" name="dateout" id="dateout" value="">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="parcel_barcode" class="form-label">ເລກລະຫັດ ບາໂຄດ</label>
                                <input type="text" class="form-control text-center" id="parcel_barcode"
                                    name="parcel_barcode" value="{{ $barcode }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="cuatname" class="form-label">ຊື່ລູກຄ້າ</label>
                                <input type="text" class="form-control text-center" id="cuatname"
                                    value="{{ $custid->customer_name }}" readonly>
                                <input type="hidden" class="form-control text-center" id="custid" name="custid"
                                    value="{{ $custid->id }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="tel" class="form-label">ເບິໂທ</label>
                                <input type="text" class="form-control text-center" id="tel" name="tel"
                                    value="{{ $custid->customer_tell }}" readonly>
                            </div>
                        </div>

                        {{-- Size --}}

                        <div class="col-md-2 col-6">
                            <div class="mb-3">
                                <label for="parcel_width" class="form-label">ຄວາມກ້ວາງ</label>
                                <input type="text" class="form-control" id="parcel_width" name="parcel_width" required>
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="mb-3">
                                <label for="parcel_length" class="form-label">ຄວາມຍາວ</label>
                                <input type="text" class="form-control" id="parcel_length" name="parcel_length" required>
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="mb-3">
                                <label for="parcel_height" class="form-label">ຄວາມສູງ</label>
                                <input type="text" class="form-control" id="parcel_height" name="parcel_height" required>
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="mb-3">
                                <label for="parcel_kg" class="form-label">ນ້ຳໜັກ</label>
                                <input type="text" class="form-control" id="parcel_kg" name="parcel_kg" required>
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="mb-3">
                                <label for="parcel_total" class="form-label">ລວມ</label>
                                <input type="text" class="form-control" id="parcel_total" name="parcel_total" required
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="mb-3">
                                <label for="parcel_countpayment" class="form-label">ລາຄາ</label>
                                <input type="text" class="form-control" id="parcel_countpayment"
                                    name="parcel_countpayment" required>
                            </div>
                        </div>
                        {{-- <div class="col-md-12">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="parcel_signature"
                                    name="parcel_signature">
                                <div style="width: 100%;height: 200px;">
                                    <canvas id="sig" class="sig"
                                        style="border:1px solid red;width: 100%;height: 200px;"></canvas>
                                    <i class="fab fa-adn" role="button" id="save-png"
                                        style="top: -45px;position: relative;font-size: 35px;left: 5px;"></i>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="pacel_picture" class="form-label">ຮູບພັດສະດຸ</label>
                                <input class="form-control" type="file" id="pacel_picture" name="pacel_picture[]"
                                    required multiple>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-secondary float-start d-none d-lg-block d-md-block" type="button"
                                onclick="window.location.href='{{ route('app.system.parcel.receiver') }}'"><i
                                    class="fas fa-reply-all"></i> ຍ້ອນກັບ</button>


                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                {{-- <button class="btn btn-danger me-md-2" id="clear" type="button">ລົບລາຍເຊັນ</button> --}}
                                <button id="btnSave" class="btn btn-primary" type="submit"><i
                                        class="fas fa-save"></i>
                                    ບັນທືກ</button>

                                <button class="btn btn-secondary float-start d-sm-none d-lg-none d-md-none" type="button"
                                    onclick="window.location.href='{{ route('app.system.parcel.receiver') }}'"><i
                                        class="fas fa-reply-all"></i> ຍ້ອນກັບ</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#frm_parcel').on('submit', function(event) {
                event.preventDefault();
                if ($('#route_barcode').val() != '' && $('#customerId').val() != '') {
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
                            $('#frm_parcel')[0].reset();
                            _complete()
                            window.location.href = '{{ route('app.system.parcel') }}';
                        },
                        error: function(err) {
                            console.log(err);
                            $('#btnSave').prop('disabled', false)
                            $('#btnSave').html('ບັນທືກ')
                        }
                    });
                } else {
                    _alert()
                }
            });

            $('#parcel_width').keyup(function() {
                var _h = parseFloat($('#parcel_height').val());
                var _l = parseFloat($('#parcel_length').val());
                var _w = parseFloat($('#parcel_width').val());
                var _total = _w + _l + _h;

                if (_total > 0) {
                    $('#parcel_total').val(_total.toFixed(2));
                }
            })
            $('#parcel_height').keyup(function() {
                var _h = parseFloat($('#parcel_height').val());
                var _l = parseFloat($('#parcel_length').val());
                var _w = parseFloat($('#parcel_width').val());
                var _total = _w + _l + _h;
                if (_total > 0) {
                    $('#parcel_total').val(_total.toFixed(2));
                }
            })
            $('#parcel_length').keyup(function() {
                var _h = parseFloat($('#parcel_height').val());
                var _l = parseFloat($('#parcel_length').val());
                var _w = parseFloat($('#parcel_width').val());
                var _total = _w + _l + _h;
                if (_total > 0) {
                    $('#parcel_total').val(_total.toFixed(2));
                }
            })
        })

        // var _parcel_width = document.getElementById("parcel_width");
        // _parcel_width.addEventListener('keyup', function(evt) {
        //     var n = parseInt(this.value.replace(/\D/g, ''), 10);
        //     _parcel_width.value = n.toLocaleString();
        // }, false);


        $("#parcel_width").on('keyup', function() {
            var n = parseInt($(this).val().replace(/\D/g, ''), 10);
            // console.log(n.toLocaleString());
            if (n.toLocaleString() != "NaN") {
                $(this).val(n.toLocaleString());
            } else {
                $(this).val('');
            }
        });
        $("#parcel_height").on('keyup', function() {
            var n = parseInt($(this).val().replace(/\D/g, ''), 10);
            // console.log(n.toLocaleString());
            if (n.toLocaleString() != "NaN") {
                $(this).val(n.toLocaleString());
            } else {
                $(this).val('');
            }
        });
        $("#parcel_length").on('keyup', function() {
            var n = parseInt($(this).val().replace(/\D/g, ''), 10);
            // console.log(n.toLocaleString());
            if (n.toLocaleString() != "NaN") {
                $(this).val(n.toLocaleString());
            } else {
                $(this).val('');
            }
        });
        $("#parcel_kg").on('keyup', function() {
            var n = parseInt($(this).val().replace(/\D/g, ''), 10);
            // console.log(n.toLocaleString());
            if (n.toLocaleString() != "NaN") {
                $(this).val(n.toLocaleString());
            } else {
                $(this).val('');
            }
        });
        $("#parcel_countpayment").on('keyup', function() {
            var n = parseInt($(this).val().replace(/\D/g, ''), 10);
            console.log(n.toLocaleString());
            if (n.toLocaleString() != "NaN") {
                $(this).val(n.toLocaleString());
            } else {
                $(this).val('');
            }
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
        // $('#btnSave').prop('disabled', true)
        // var canvas = document.getElementById('sig');

        // function resizeCanvas() {
        //     var ratio = Math.max(window.devicePixelRatio || 1, 1);
        //     canvas.width = canvas.offsetWidth * ratio;
        //     canvas.height = canvas.offsetHeight * ratio;
        //     canvas.getContext("2d").scale(ratio, ratio);
        // }

        // window.onresize = resizeCanvas;
        // resizeCanvas();

        // var signaturePad = new SignaturePad(canvas, {
        //     backgroundColor: 'rgb(255, 255, 255)' // necessary for saving image as JPEG; can be removed is only saving as PNG or SVG
        // });

        // var data = signaturePad.toDataURL('image/png');
        // console.log(data);
        // $('#parcel_signature').val(data);


        // document.getElementById('save-png').addEventListener('click', function() {
        //     if (signaturePad.isEmpty()) {
        //         // return alert("Please provide a signature first.");
        //         return _error_sign()
        //     }

        //     var data = signaturePad.toDataURL('image/png');
        //     document.getElementById('parcel_signature').value = data;
        //     $('#btnSave').prop('disabled', false)
        //     // console.log(data);
        // });
        // document.getElementById('clear').addEventListener('click', function() {
        //     signaturePad.clear();
        //     $('#btnSave').prop('disabled', true)
        // });
    </script>
@endsection
