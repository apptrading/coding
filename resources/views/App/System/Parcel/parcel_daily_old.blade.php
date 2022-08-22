@extends('Layout.layout_back_end')
@section('title', 'DANIKA | Daily')
@section('contents')
    <div class="container py-2">
        <div class="row">
            <div class="col-md-4 col-12"></div>
            <div class="col-md-4 col-12">
                <h3 class="text-center">ໃສ່ເລກລະຫັດ ບາໂຄດ</h3>

                <form action="{{ route('app.parcel.Dailyparcel') }}" method="POST" enctype="multipart/form-data"
                    id="frm-step-first-daily">

                    <input type="text" name="route_barcode" id="route_barcode" class="form-control mb-2" required>

                    {{-- <div id="sig"></div> --}}
                    <div style="width: 100%;height: 200px;">
                        <canvas id="sig" class="sig"
                            style="border:1px solid red;width: 100%;height: 200px;"></canvas>
                        <i class="fab fa-adn" role="button" id="save-png"
                            style="top: -45px;position: relative;font-size: 35px;left: 5px;"></i>
                    </div>


                    <div class="input-group py-2">
                        <input type="file" class="form-control" id="img_parcel" name="img_parcel[]" multiple>
                    </div>

                    <input type="hidden" name="signature_img" id="signature_img">

                    <div id="alertId"></div>

                    <div class="d-grid gap-2 col-12 mx-auto">
                        <button class="btn btn-primary" type="submit" id="btnSave"><i class="fas fa-save"></i>
                            ບັນທຶກ</button>
                        <button class="btn btn-danger" type="button" id="clear">
                            ລົບລາຍເຊັນ</button>

                        <button class="btn btn-secondary" onclick="window.location.href='{{ route('app.system.parcel') }}'"
                            type="button">
                            <i class="fas fa-reply-all"></i> ຍ້ອນກັບ</button>
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
                            $('#frm-step-first-daily')[0].reset();
                            signaturePad.clear();

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
                            $('#alertId').html(
                                "<div class=\"alert alert-danger  alert-dismissible fade show\" role=\"alert\">" +
                                " <strong>ເກີດຂໍ້ຜິດພາດ</strong> ລະຫັດບາໂຄດນີ້ຍັງບໍ່ຖືກອະນຸມັດ ກະລຸນາຕີດຕໍ່ Admin" +
                                "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>" +
                                "</div>"
                            )
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
                    }

                });

            });
        })
    </script>
    <script>
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
                // return alert("Please provide a signature first.");
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
