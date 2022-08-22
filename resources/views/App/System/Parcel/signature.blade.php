@extends('Layout.layout_back_end')
@section('title', 'DANIKA | Signature')
@section('contents')
    <div class="container py-2">
        <form action="{{ route('app.parcelstepfirst.SignMultiple') }}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div style="width: 100%;height: 200px;">
                        <canvas id="sig" class="sig"
                            style="border:1px solid red;width: 100%;height: 200px;"></canvas>
                        <i class="fab fa-adn" role="button" id="save-png"
                            style="top: -45px;position: relative;font-size: 35px;left: 5px;"></i>
                    </div>

                    <input type="hidden" name="signature_img" id="signature_img">
                    <br>
                    <div class="d-grid gap-2 col-12 mx-auto">
                        <button class="btn btn-primary" type="submit" id="btnSave"><i class="fas fa-save"></i>
                            ບັນທຶກ</button>
                        <button class="btn btn-danger" type="button" id="clear">
                            ລົບລາຍເຊັນ</button>

                        <button class="btn btn-secondary"
                            onclick="window.location.href='{{ route('app.system.parcel.normal_multiple') }}'"
                            type="button">
                            <i class="fas fa-reply-all"></i> ຍ້ອນກັບ</button>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </form>
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
                            '<i class="fas fa-spinner fa-pulse"></i> ກຳລັງບັນທຶກ')
                        $('#btnSave').prop('disabled', true)
                    },
                    success: function(result) {
                        console.log(result);
                        window.location.href = '{{ route('app.system.parcel') }}'

                    },
                    error: function(err) {
                        console.log(err);
                        $('#btnSave').prop('disabled', false)
                        $('#btnSave').html(
                            '<i class="fas fa-save"></i> ບັນທຶກ')
                    }

                });

            });
        })



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
