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
                                <input type="text" class="form-control" id="parcel_total" name="parcel_total" required>
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="mb-3">
                                <label for="parcel_countpayment" class="form-label">ລາຄາ</label>
                                <input type="text" class="form-control" id="parcel_countpayment"
                                    name="parcel_countpayment" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="parcel_signature"
                                    name="parcel_signature">
                                <div id="sig"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="pacel_picture" class="form-label">ຮູບພັດສະດຸ</label>
                                <input class="form-control" type="file" id="pacel_picture" name="pacel_picture"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-secondary float-start" type="button"
                                onclick="window.location.href='{{ route('app.system.parcel.receiver') }}'"><i
                                    class="fas fa-reply-all"></i> ຍ້ອນກັບ</button>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-danger me-md-2" id="clear" type="button">ລົບລາຍເຊັນ</button>
                                <button id="btnSave" class="btn btn-primary" type="submit"><i
                                        class="fas fa-save"></i>
                                    ບັນທືກ</button>
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
        })

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


        $(function() {
            var sig = $('#sig').signature();
            var signature = $('#sig').signature({
                syncField: '#parcel_signature',
                syncFormat: 'PNG'
            });
            $('#clear').click(function() {
                sig.signature('clear');
            });
        });
    </script>
@endsection
