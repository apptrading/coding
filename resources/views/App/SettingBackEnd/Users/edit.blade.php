<div class="modal fade" id="modal_edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modal_editLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('app.UpdateProfile') }}" method="POST" enctype="multipart/form-data" id="frm_edit">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_editLabel">ແກ້ໄຂຜູ້ໃຊ້ງານ <span id="statusLoading"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        {{-- <div class="col-md-12 text-center py-2">
                            <img src="{{ asset('assets/img/iconweb/icon.png') }}" width="150" height="150"
                                alt="userLogo">
                        </div> --}}
                        <input type="hidden" name="userid" id="userid">
                        {{-- /** User login **/ --}}
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email_edit" class="form-label">ອີເມວ</label>
                                <input type="email" class="form-control" id="email_edit" name="email_edit" required>
                                <div id="emailHelp" class="form-text"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="password_edit" class="form-label">ລະຫັດຜ່ານ</label>
                                <input type="password" class="form-control" id="password_edit" name="password_edit">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="userright_edit" class="form-label">ປະເພດຜູ້ໄຊ້ງານ</label>
                                <select class="form-select" id="userright_edit" name="userright_edit" required>
                                    <option value="" selected>--ເລືອກປະເພດຜູ້ໄຊ້ງານ--</option>
                                    <option value="1">Manager</option>
                                    <option value="2">Admin</option>
                                    <option value="3">User</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name_edit" class="form-label">ຊື່ຫຼິ້ນ</label>
                                <input type="text" class="form-control" id="name_edit" name="name_edit" required>
                            </div>
                        </div>
                        {{-- /*** End User Login ***/ --}}


                        {{-- /** Profile **/ --}}
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="fullname_edit" class="form-label">ຊື່-ນາມສະກຸນ</label>
                                <input type="text" class="form-control" id="fullname_edit" name="fullname_edit"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="bightday_edit" class="form-label">ວັນ-ເດືອນ-ປີ ເກິດ</label>
                                <input type="date" class="form-control" id="bightday_edit" name="bightday_edit"
                                    onchange="ageCalculator($(this).val(),'edit')" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="ages_edit" class="form-label">ອາຍຸ</label>
                                <input type="text" class="form-control" id="ages_edit" name="ages_edit"
                                    value="0" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="tell_edit" class="form-label">ເບິໂທ</label>
                                <input type="text" class="form-control" id="tell_edit" name="tell_edit" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="py-5">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="gender_edit"
                                        id="inlineRadio1_edit" value="1">
                                    <label class="form-check-label" for="inlineRadio1_edit">ຍີງ</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender_edit"
                                        id="inlineRadio2_edit" value="2">
                                    <label class="form-check-label" for="inlineRadio2_edit">ຊາຍ</label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <div class="mb-2">
                                <label for="picture_edit" class="form-label">ຮູບພາບ</label>
                                <input class="form-control" type="file" id="picture_edit" name="picture_edit">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-2">
                                <label for="documents_edit" class="form-label">ເອກະສານ</label>
                                <input class="form-control" type="file" id="documents_edit"
                                    name="documents_edit">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ປິດ</button>
                    <button type="submit" id="btnSave_edit" class="btn btn-primary">ບັນທືກ</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#frm_edit').on('submit', function(event) {
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
                    $('#btnSave_edit').html(
                        '<i class="fas fa-spinner fa-pulse"></i> ກຳລັງບັນທືກ')
                    $('#btnSave_edit').prop('disabled', true)
                },
                success: function(result) {
                    // console.log(result);
                    $('#frm_edit')[0].reset();
                    $('#btnSave_edit').prop('disabled', false)
                    $('#btnSave_edit').html('ບັນທືກ')

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

                    $('#modal_edit').modal('hide')


                    let numb = 1;
                    $('#table-user').DataTable({
                        destroy: true,
                        data: result.datas,
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
                                createdCell: function(td, cellData, rowData,
                                    row, col) {
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
                    $('#btnSave_edit').prop('disabled', false)
                    $('#btnSave_edit').html('ບັນທືກ')
                }

            });

        });
    })
</script>
