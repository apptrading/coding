@extends('Layout.layout_back_end')
@section('title', 'DANIKA | Price of Parcel')
@section('contents')

    <div class="container py-3">
        @include('App.SettingBackEnd.Prices_of_parcel.table')
    </div>

    @include('App.SettingBackEnd.Prices_of_parcel.add')
    @include('App.SettingBackEnd.Prices_of_parcel.edit')


    <script>
        function _tables(result_datas) {
            let numb = 1;
            $('#table-box').DataTable({
                destroy: true,
                data: result_datas,
                columns: [{
                        data: "id",
                        createdCell: function(td, cellData, rowData,
                            row, col) {
                            $(td).addClass('text-center');
                        },
                        render: function(data, type, row) {
                            return numb++
                        }
                    },
                    {
                        data: "box_name",
                    },
                    {
                        data: "box_width"
                    },
                    {
                        data: "box_height"
                    },
                    {
                        data: "box_length",
                    },
                    {
                        data: "box_price",
                    },
                    {
                        data: "id",
                        createdCell: function(td, cellData, rowData,
                            row, col) {
                            $(td).addClass('text-center');
                        },
                        render: function(data, type, row) {
                            var letReturn = "";
                            letReturn +=
                                "<div class=\"btn-group btn-group-sm\" role=\"group\">";
                            letReturn +=
                                "<button type=\"button\" data-bs-toggle=\"modal\" data-bs-target=\"#model_edit\" onclick=\"_edit(" +
                                row.id +
                                ")\"  class=\"btn btn-warning btnEdit\" data-id=\"" +
                                row.id +
                                " \" id=\"btnEdit\"><i class=\"fas fa-edit\"></i></button>";
                            letReturn +=
                                "<button type=\"button\"  class=\"btn btn-danger btnDelete\" data-id=\"" +
                                row.id +
                                "\" onclick=\"_delete(" +
                                row.id +
                                ")\" id=\"btnEdit\"><i class=\"fas fa-trash\"></i></button>";

                            letReturn += "</div>";

                            return letReturn;
                        }
                    }
                ]
            });
        }

        function _edit(id) {
            $('#modal_edit').modal('show')

            $.ajax({
                url: '/app/price-parcel/edit/' + id,
                method: 'GET',
                contentType: false,
                dataType: 'json',
                processData: false,
                cashe: false,
                success: function(result) {
                    console.log(result);
                    $('#box_width_edit').val(result.datas.box_width)
                    $('#box_height_edit').val(result.datas.box_height)
                    $('#box_length_edit').val(result.datas.box_length)
                    $('#box_price_edit').val(result.datas.box_price)
                    $('#box_name_edit').val(result.datas.box_name)
                    $('#id').val(result.datas.id)

                },
                error: function(err) {
                    console.log(err);
                }
            });
        }



        function _alert() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal
                        .resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'successfully'
            })
        }

        function _delete(id) {
            Swal.fire({
                title: 'ທ່ານຕ້ອງການລົບແທ້ແມ່ນບໍ?',
                text: "ຫາກທ່ານລົມຂໍ້ມູນນີ້ອອກທ່ານຈະບໍ່ສາມາດກູ້ຄືນໃດ້ອິກ!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'ຢືນຢັນການລົບ',
                cancelButtonText: 'ອອກ'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: "/app/price-parcel/delete/" + id,
                        method: 'GET',
                        processData: false,
                        dataType: 'json',
                        contentType: false,
                        cashe: false,
                        success: function(result) {
                            _alert()
                            _tables(result.datas);
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    })

                }
            })
        }
    </script>

@endsection
