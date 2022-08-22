@extends('Layout.layout_back_end')
@section('title', 'DANIKA | Parcel Scand')
@section('contents')

    <div class="container py-2">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="{{ route('app.parcelstepfirst.FirstMultiple') }}" method="POST" enctype="multipart/form-data"
                    id="frmMultiple">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="route_barcode" id="route_barcode">
                        <button class="btn btn-primary" type="submit" id="multipleSave"><i
                                class="fas fa-save"></i></button>
                    </div>
                </form>

                <table class="table table-striped table-hover">
                    <thead class="text-center">
                        <tr>
                            <td>ລະຫັດບາໂຄດ</td>
                        </tr>
                    </thead>
                    <tbody id="datasParcel">
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-md-8">Loading...</div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-danger btn-sm float-end"><i
                                                class="fas fa-times"></i></button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <center>
                    <button class="btn btn-primary" type="button" onclick="window.location.href='{{ route('signature') }}'"
                        id="popup">ບັນທືກ</button>
                </center>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#popup').hide()


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
                        $('#multipleSave').html(
                            '<i class="fas fa-spinner fa-pulse"></i>')
                        $('#multipleSave').prop('disabled', true)
                    },
                    success: function(result) {
                        console.log(result);

                        if (result.result == true) {
                            $('#multipleSave').prop('disabled', false)
                            $('#multipleSave').html(
                                '<i class="fas fa-save"></i> ')
                            $('#frmMultiple')[0].reset();
                            _taable(result.datas)

                        } else {
                            _error()
                            $('#multipleSave').prop('disabled', false)
                            $('#multipleSave').html(
                                '<i class="fas fa-save"></i> ')
                        }


                    },
                    error: function(err) {
                        console.log(err);
                        $('#multipleSave').prop('disabled', false)
                        $('#multipleSave').html(
                            '<i class="fas fa-save"></i> ')
                        _error(err)
                    }

                });

            });

            $.ajax({
                url: "{{ route('app.parcelstepfirst.show.multiple') }}",
                method: "GET",
                contentType: false,
                dataType: 'json',
                processData: false,
                cashe: false,
                success: function(result) {
                    _taable(result.datas)
                },
            })
        })


        function _taable(resultdatas) {
            var _Datas = resultdatas;
            console.log(_Datas.length);
            var _tables = "";
            var count = -1;
            for (let _multiple = 0; _multiple < _Datas.length; _multiple++) {
                count = (_multiple + 1);
                _tables += "<tr>" +
                    "<td>" +
                    "<div class=\"row\">" +
                    "<div class=\"col-md-8\">" + _Datas[_multiple].route_barcode +
                    "</div>" +
                    "<div class=\"col-md-4\">" +
                    "<button type=\"button\" onclick=\"_del(" + _Datas[_multiple].id +
                    ")\" class=\"btn btn-danger btn-sm float-end\"><i class=\"fas fa-times\"></i></button>" +
                    "</div>" +
                    "</div>" +
                    "</td>" +
                    "</tr>"
            }
            $('#datasParcel').html(_tables)
            if (_Datas.length > 0) $('#popup').show()
            if (_Datas.length == 0) $('#popup').hide()
        }

        function _del(id) {
            Swal.fire({
                title: 'ຢືນຢັນການລົບ',
                // text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'ຢືນຢັນ',
                cancelButtonText: 'ບໍ່ຢືນຢັນ'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/app/route/del/multiple/" + id,
                        method: "GET",
                        contentType: false,
                        dataType: 'json',
                        processData: false,
                        cashe: false,
                        success: function(result) {
                            Swal.fire(
                                'Deleted!',
                                '',
                                'success'
                            )
                            _taable(result.datas)
                        },
                        error: function(err) {
                            console.log(err);
                        }

                    })
                }
            })
        }

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
