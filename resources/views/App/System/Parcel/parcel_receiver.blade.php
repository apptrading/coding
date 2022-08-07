@extends('Layout.layout_back_end')
@section('title', 'DANIKA | Reciever')
@section('contents')
    <div class="container py-2">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="{{ route('app.customer.check') }}" method="POST" enctype="multipart/form-data"
                    id="frm_checkBarcode">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="route_barcode" class="form-label">ເລກລະຫັດ ບາໂຄດ</label>
                                <input type="text" class="form-control" id="route_barcode" name="route_barcode">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="customerId" class="form-label">ລາຍຊື່ລູກຄ້າ</label>
                                <select class="form-select" id="customerId" name="customerId">
                                    <option selected value="">ເລືອກລາຍຊື່ລູກຄ້າ</option>
                                    @foreach ($customer as $key => $values)
                                        <option value="{{ $values->id }}">
                                            {{ $values->customer_name }}
                                            [ {{ $values->customer_tell }} ]
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 py-1">
                            <button class="btn btn-secondary w-100" type="button"
                                onclick="window.location.href='{{ route('app.system.parcel') }}'">
                                <i class="fas fa-reply-all"></i> ຍ້ອນກັບ
                            </button>
                        </div>
                        <div class="col-md-4 py-1">
                            <button type="button" onclick="$('#customer_add').modal('show')" class="btn btn-warning w-100">
                                <i class="fas fa-plus"></i> ເພິ່ມລູກຄ້າ
                            </button>
                        </div>
                        <div class="col-md-4 py-1">
                            <button type="submit" id="btn_next" class="btn btn-primary w-100">
                                ຖັດໄປ <i class="fas fa-angle-double-right"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="customer_add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="customer_addLabel" aria-hidden="true">
        <form action="{{ route('app.customer.add') }}" method="POST" enctype="multipart/form-data" id="frm_customer">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="customer_addLabel">ເພິ່ມຂໍ້ມູນລູກຄ້າໃໝ່</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="customer_name" class="form-label">ຊື່ລູກຄ້າ</label>
                                    <input type="text" class="form-control" id="customer_name" name="customer_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="customer_tell" class="form-label">ເບິໂທ</label>
                                    <input type="text" class="form-control" id="customer_tell" name="customer_tell">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="customer_whatsapp" class="form-label">whatsapp</label>
                                    <input type="text" class="form-control" id="customer_whatsapp"
                                        name="customer_whatsapp">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="customer_address" class="form-label">ທີ່ຢູ່</label>
                                    <textarea class="form-control" id="customer_address" name="customer_address" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ປິດ</button>
                        <button type="submit" id="btn_customer" class="btn btn-primary">ບັນທືກ</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--- Modal End  -->

    <script>
        $(document).ready(function() {
            $('#customerId').select2({
                theme: "bootstrap-5",
            })
            $('#frm_customer').on('submit', function(event) {
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
                        $('#btn_customer').html(
                            '<i class="fas fa-spinner fa-pulse"></i> ກຳລັງບັນທືກ...')
                        $('#btn_customer').prop('disabled', true)
                    },
                    success: function(result) {
                        console.log(result);
                        $('#btn_customer').prop('disabled', false)
                        $('#btn_customer').html('ບັນທືກ')
                        if (result.result == true) {
                            $('#frm_customer')[0].reset();
                            _complete()
                        } else {
                            _error()
                        }

                    },
                    error: function(err) {
                        console.log(err);
                        $('#btn_customer').prop('disabled', false)
                        $('#btn_customer').html('ບັນທືກ')

                    }
                });
            });

            $('#frm_checkBarcode').on('submit', function(event) {
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
                            $('#btn_next').html(
                                '<i class="fas fa-spinner fa-pulse"></i> ກຳລັງກວດສອບ...')
                            $('#btn_next').prop('disabled', true)
                        },
                        success: function(result) {
                            console.log(result);
                            $('#btn_next').prop('disabled', false)
                            $('#btn_next').html(
                                'ຖັດໄປ <i class="fas fa-angle-double-right"></i>')
                            if (result.result == true) {
                                // $('#frm_checkBarcode')[0].reset();
                                if (result.customerid > 0) { 
                                    window.location.href = '/app/parcel/receiver/' + $(
                                        '#route_barcode').val() + '/' + result.customerid;
                                } else {
                                    window.location.href = '/app/parcel/receiver/' + $(
                                            '#route_barcode').val() + '/' + $('#customerId')
                                        .val(); 
                                }

                                _complete()
                            } else {
                                _error_step(result.st1, result.st2, result.st3);
                            }
                        },
                        error: function(err) {
                            console.log(err);
                            $('#btn_next').prop('disabled', false)
                            $('#btn_next').html(
                                'ຖັດໄປ <i class="fas fa-angle-double-right"></i>')

                        }
                    });
                } else {
                    _alert()
                }
            });



        })

        function _error() {
            Swal.fire(
                'ທ່ານບັນທືກຂໍ້ມູນຊ້ຳກັນ',
                '',
                'error'
            )
        }

        function _error_step(st1, st2, st3) {
            $title = "";
            if (st1 > 0 && st2 < 1 && st3 == 0) $title = "ພັດສະດຸຂ້າມ Step 2 ";
            if (st1 < 1 && st2 < 1 && st3 == 0) $title = "ພັດສະດຸຂ້າມ Step 1 ແລະ Step 2";
            if (st1 > 0 && st2 > 0 && st3 > 0) $title = "ເລກພັດສະດຸນີ້ຮັບເຂົ້າສາງໃຫຍ່ສຳເລັດແລ້ວ";

            Swal.fire(
                $title,
                '',
                'error'
            )
        }

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

        function _alert() {
            Swal.fire(
                'ກະລຸນາໃສ່ຂໍ້ມູນໃຫ້ຄົບ',
                '',
                'error'
            )
        }
    </script>
@endsection
