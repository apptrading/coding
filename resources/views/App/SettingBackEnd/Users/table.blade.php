<div class="row">
    <div class="col-md-12 py-1">
        {{-- <button onclick="window.location.href='{{ route('app.user.add') }}'" type="button"
                class="btn btn-primary float-end" data-title="ເພິ່ມຂໍ້ມູນໃໝ່"><i class="fas fa-plus"></i></button> --}}
        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#modal_add"><i
                class="fas fa-plus"></i></button>
    </div>

    <div class="col-md-12">
        <table class="table table-hover table-bordered" style="width: 100%" id="table-user">
            <thead style="background: #ccc">
                <tr>
                    <th class="laos" width="70">ດຳລັບ</th>
                    <th>ຮູບພາບ</th>
                    <th>ຊື່-ນາມສະກຸນ</th>
                    <th>ອິເມວ</th>
                    <th>ເບິໂທຕິດຕໍ່</th>
                    <th>ວັນ-ເດືອນ-ປີ ເກີດ</th>
                    <th>ອາຢຸ</th>
                    <th>ເພດ</th>
                    <th>ເອກະສານ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="10" class="text-center"><i class="fas fa-spinner fa-pulse"></i> ກຳລັງໂຫຼດ...</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('app.ShowProfile') }}",
            method: 'GET',
            processData: false,
            dataType: 'json',
            contentType: false,
            cashe: false,
            success: function(result) {
                // console.log(result.datas);
                // $(this)[0].reset();
                // $('#btnProduct').html('ບັນທືກ')

                let numb = 1;
                $('#table-user').DataTable({
                    destroy: true,
                    data: result.datas,
                    columns: [{
                            data: "id",
                            createdCell: function(td, cellData, rowData, row, col) {
                                $(td).addClass('text-center');
                            },
                            render: function(data, type, row) {
                                return numb++
                            }
                        },
                        {
                            data: "picture",
                            render: function(data, type, row) {
                                var picture = "";
                                if (data == "na") {
                                    picture =
                                        "<img src=\"{{ asset('assets/img/iconweb/icon.png') }}\" width=\"80\" height=\"80\" alt=\"puser\">";
                                } else {
                                    picture =
                                        "<img src=\"" + data +
                                        "\" width=\"80\" height=\"80\" alt=\"puser\"> ";
                                }

                                return picture;
                            }
                        },
                        {
                            data: "fullname"
                        },
                        {
                            data: "email"
                        },
                        {
                            data: "tell",
                        },
                        {
                            data: "bightday",
                        },
                        {
                            data: "ages",
                        },
                        {
                            data: "gender",
                            render: function(data, type, row) {
                                var gender = "";
                                if (data == 2) {
                                    gender = "ຊາຍ";
                                } else {
                                    gender = "ຍີງ";
                                }

                                return gender;
                            }
                        },
                        {
                            data: "documents",
                            createdCell: function(td, cellData, rowData, row, col) {
                                $(td).addClass('text-center');
                            },
                            render: function(data, type, row) {
                                var documents = "";
                                if (data == "") {
                                    documents =
                                        "<a href=\"#\" class=\"btn btn-primary btn-sm\"><i class=\"fas fa-cloud-download-alt\"></i></a>";
                                } else {
                                    documents =
                                        "<a href=\"" + data +
                                        "\" target=\"_blank\" class=\"btn btn-primary btn-sm\"><i class=\"fas fa-cloud-download-alt\"></i></a>";
                                }

                                return documents;
                            }
                        },
                        {
                            data: "id",
                            createdCell: function(td, cellData, rowData, row, col) {
                                $(td).addClass('text-center');
                            },
                            render: function(data, type, row) {
                                var letReturn = "";
                                letReturn +=
                                    "<div class=\"btn-group btn-group-sm\" role=\"group\">";
                                letReturn +=
                                    "<button type=\"button\" data-bs-toggle=\"modal\" data-bs-target=\"#model_edit\" onclick=\"_edit(" +
                                    row.userid +
                                    ")\"  class=\"btn btn-warning btnEdit\" data-id=\"" +
                                    row.id +
                                    " \" id=\"btnEdit\"><i class=\"fas fa-edit\"></i></button>";
                                letReturn +=
                                    "<button type=\"button\"  class=\"btn btn-danger btnDelete\" data-id=\"" +
                                    row.id +
                                    "\" onclick=\"_delete(" +
                                    row.userid +
                                    ")\" id=\"btnEdit\"><i class=\"fas fa-trash\"></i></button>";

                                letReturn += "</div>";

                                return letReturn;
                            }
                            // createdCell: function(td, cellData, rowData, row, col) {
                            //     $(td).addClass('text-center');
                            // }
                        }
                    ]
                });
            },
            error: function(err) {
                console.log(err);
            }
        })
    })

</script>
<style>
    button[data-title]:hover::after {
        content: attr(data-title);
        color: #fff;
        border: .5px solid #92278f;
        background-color: #92278f;
        border-radius: 5px;
        position: absolute;
        top: -100%;
        left: 0;
    }
</style>
