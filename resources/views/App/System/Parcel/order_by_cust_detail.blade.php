@extends('Layout.layout_back_end')
@section('title', 'DANIKA | Customer')
@section('contents')
    <div class="container py-2">
        <form action="{{ route('app.parcel.Register_OrderByCust') }}" method="POST" enctype="multipart/form-data"
            id="frm_check">
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="barcode" class="form-label">ເລກລະຫັດບາໂຄດ</label>
                        <input type="text" class="form-control" id="barcode" name="barcode" value="{{ $barcode }}"
                            readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="name_customer" class="form-label">ຊື່ລູກຄ້າ</label>
                        <input type="text" class="form-control" id="name_customer" value="{{ $Cust->customer_name }}"
                            readonly>

                        <input type="hidden" class="form-control" id="id" name="id" value="{{ $Cust->id }}"
                            readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="customer_tell" class="form-label">ເບິໂທ</label>
                        <input type="text" class="form-control" id="customer_tell" value="{{ $Cust->customer_tell }}"
                            readonly>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="count_payment" class="form-label">ຈຳນວນເງິນທີ່ຕ້ອງຈ່າຍ</label>
                        <input type="text" class="form-control" id="count_payment" name="count_payment">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="filespayment" class="form-label">ຫຼັກຖານການຈ່າຍ</label>
                        <input class="form-control" type="file" id="filespayment" name="filespayment">
                    </div>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary float-end" type="submit" id="btnSave">ບັນທຶກ</button>
                </div>

            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#frm_check').on('submit', function(event) {
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
                            $('#btnSave').html('ບັນທຶກ')
                            if (result.result == true) {
                                // $('#frm_checkBarcode')[0].reset();
                                window.location.href = "{{ route('app.system.parcel') }}";
                                _complete()
                            } else {
                                _error();
                            }
                        },
                        error: function(err) {
                            console.log(err);
                            $('#btnSave').prop('disabled', false)
                            $('#btnSave').html(
                                'ຖັດໄປ <i class="fas fa-angle-double-right"></i>')

                        }
                    });
                } else {
                    _alert()
                }
            });
        });

        function _error() {
            Swal.fire(
                'ເກີດຂໍ້ຜີດພາດ',
                '',
                'error'
            )
        }
    </script>
@endsection
