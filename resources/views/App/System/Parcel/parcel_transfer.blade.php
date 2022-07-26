@extends('Layout.layout_back_end')
@section('title', 'DANIKA | Scan by PC')
@section('contents')
    <div class="container py-2">
        <div class="row">
            <div class="col-md-4 col-12"></div>
            <div class="col-md-4 col-12">
                <h3 class="text-center">ໃສ່ເລກລະຫັດ ບາໂຄດ</h3>

                <form action="{{ route('app.parcelstepsecond') }}" method="POST" enctype="multipart/form-data"
                    id="frm-step-first">

                    <input type="text" name="route_barcode" id="route_barcode" class="form-control mb-2" required>
                    <div id="alertId"></div>

                    <div class="d-grid gap-2 col-12 mx-auto">
                        <button class="btn btn-primary" type="submit" id="btnSave"><i class="fas fa-save"></i>
                            ບັນທຶກ</button>

                        <button class="btn btn-secondary" onclick="window.location.href='{{ route('app.system.parcel') }}'"
                            type="button"><i class="fas fa-reply-all"></i> ຍ້ອນກັບ</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4 col-12"></div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('form').on('submit', function(event) {
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
                            '<i class="fas fa-spinner fa-pulse"></i> ກຳລັງບັນທືກ')
                        $('#btnSave').prop('disabled', true)
                    },
                    success: function(result) {
                        console.log(result);

                        if (result.result == true) {
                            $('#btnSave').prop('disabled', false)
                            $('#btnSave').html(
                                '<i class="fas fa-save"></i> ບັນທືກ')
                            $('#frm-step-first')[0].reset();
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
                        } else {
                            _error('ລະຫັດນີ້ ມີໃນສະເຕັບນີ້ແລ້ວ')
                            $('#btnSave').prop('disabled', false)
                            $('#btnSave').html(
                                '<i class="fas fa-save"></i> ບັນທືກ')
                        }


                    },
                    error: function(err) {
                        console.log(err);
                        $('#btnSave').prop('disabled', false)
                        $('#btnSave').html(
                            '<i class="fas fa-save"></i> ບັນທືກ')
                        _error(err)
                    }

                });

            });
        })


        function _error(err = false) {
            var _err = 'Something went wrong!';
            if (err != false) _err = err;
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: _err,
                footer: '<a href="https://nsoftdev.com">www.nsofdev.com</a>'
            })
        }
    </script>
@endsection
