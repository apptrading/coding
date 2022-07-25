@extends('Layout.layout_back_end')
@section('title', 'DANIKA | Branchs')
@section('contents')
    <div class="container py-3">
        @include('App.SettingBackEnd.Branchs.tables')
    </div>

    @include('App.SettingBackEnd.Branchs.add')
    @include('App.SettingBackEnd.Branchs.edit')




    <script>
        function _tables(result_datas) {
            let numb = 1;
            $('#table-branch').DataTable({
                destroy: true,
                data: result_datas,
                columns: [{
                        data: "branch_id",
                        createdCell: function(td, cellData, rowData,
                            row, col) {
                            $(td).addClass('text-center');
                        },
                        render: function(data, type, row) {
                            return numb++
                        }
                    },
                    {
                        data: "pr_name",
                    },
                    {
                        data: "dr_name"
                    },
                    {
                        data: "vill_name"
                    },
                    {
                        data: "branch_name",
                    },
                    {
                        data: "location",
                        createdCell: function(td, cellData, rowData,
                            row, col) {
                            $(td).addClass('text-center');
                        },
                        render: function(data, type, row) {
                            var letReturn = "";

                            if (row.location != 'na') {
                                letReturn = "<a href=\"" + row
                                    .location +
                                    "\" class=\"btn btn-secondary btn-sm\" target=\"_blank\"><i class=\"fas fa-map-marker-alt\" style=\"color: red\"></i></a>";
                            }
                            return letReturn;
                        }
                    },
                    {
                        data: "branch_id",
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
                                row.branch_id +
                                ")\"  class=\"btn btn-warning btnEdit\" data-id=\"" +
                                row.branch_id +
                                " \" id=\"btnEdit\"><i class=\"fas fa-edit\"></i></button>";
                            letReturn +=
                                "<button type=\"button\"  class=\"btn btn-danger btnDelete\" data-id=\"" +
                                row.branch_id +
                                "\" onclick=\"_delete(" +
                                row.branch_id +
                                ")\" id=\"btnEdit\"><i class=\"fas fa-trash\"></i></button>";

                            letReturn += "</div>";

                            return letReturn;
                        }
                    }
                ]
            });
        }

        function _edit(branchId) {
            $('#modal_edit').modal('show')
            $.ajax({
                url: '/app/branchs/edit/' + branchId,
                method: 'GET',
                contentType: false,
                dataType: 'json',
                processData: false,
                cashe: false,
                success: function(result) {
                    // console.log(result);
                    // console.log(result.datas.dr_id);

                    var _district = result.district;
                    var Options_district = "<option value=\"\">--ເລືອກ ເມືອງ--</option>";
                    var selected_dr = "";
                    for (let index = 0; index < _district.length; index++) {
                        if (_district[index].dr_id == result.datas.dr_id) {
                            selected_dr = "selected";
                        } else {
                            selected_dr = "";
                        }
                        Options_district += "<option " + selected_dr + " value=\"" + _district[index].dr_id +
                            "\">" + _district[
                                index].dr_name + "</option>"
                    }

                    var villages = result.villages;
                    var Options_villages = "<option value=\"\">--ເລືອກ ບ້ານ--</option>";
                    var selected_vill_id = "";
                    for (let index_vill = 0; index_vill < villages.length; index_vill++) {
                        if (villages[index_vill].vill_id == result.datas.vill_id) {
                            selected_vill_id = "selected";
                        } else {
                            selected_vill_id = "";
                        }
                        Options_villages += "<option " + selected_vill_id + " value=\"" + villages[index_vill]
                            .vill_id + "\">" +
                            villages[
                                index_vill].vill_name + "</option>"
                    }

                    $('#provinces_edit').val(result.datas.pr_id);
                    $('#villages_edit').html(Options_villages);
                    $('#districts_edit').html(Options_district);


                    $('#branch_name_edit').val(result.datas.branch_name);
                    $('#location_edit').val(result.datas.location);
                    $('#branch_id').val(result.datas.branch_id)

                },
                error: function(err) {

                }
            })
        }

        function _delete() {
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


                    // $.ajax({
                    //     url: "/app/branchs/delete/" + id,
                    //     method: 'GET',
                    //     processData: false,
                    //     dataType: 'json',
                    //     contentType: false,
                    //     cashe: false,
                    //     success: function(result) {

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


                    //     },
                    //     error: function(err) {
                    //         console.log(err);
                    //     }
                    // })

                }
            })
        }
    </script>
@endsection
