@extends('Layout.layout_back_end')
@section('title', 'DANIKA | Shelf')
@section('contents')
    <div class="container py-3">
        @include('App.SettingBackEnd.Selfs.table')
    </div>

    @include('App.SettingBackEnd.Selfs.add')
    @include('App.SettingBackEnd.Selfs.edit')



    <script>
        function _tables(result_datas) {
            let numb = 1;
            $('#table-shelf').DataTable({
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
                        data: "shelf_name",
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
                            // letReturn +=
                            //     "<button type=\"button\"  class=\"btn btn-danger btnDelete\" data-id=\"" +
                            //     row.id +
                            //     "\" onclick=\"_delete(" +
                            //     row.id +
                            //     ")\" id=\"btnEdit\"><i class=\"fas fa-trash\"></i></button>";

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
                url: '/app/shelf/edit/' + id,
                method: 'GET',
                contentType: false,
                dataType: 'json',
                processData: false,
                cashe: false,
                success: function(result) {
                    console.log(result);
                    $('#shelf_name_edit').val(result.datas.shelf_name)
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
    </script>

@endsection
