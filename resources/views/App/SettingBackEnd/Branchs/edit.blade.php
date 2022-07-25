<!-- Modal edit -->
<div class="modal fade" id="modal_edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modal_editLabel" aria-hidden="true">
    <form action="{{ route('app.updatebranchs') }}" method="POST" enctype="multipart/form-data" id="frm_edit">
        <input type="hidden" name="branch_id" id="branch_id">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_editLabel">ແກ້ໄຂຂໍ້ມູນສາຂາ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="provinces_edit" class="form-label">ແຂວງ</label>
                                <select class="form-select" id="provinces_edit" name="provinces_edit" required>
                                    <option value="" selected>--ເລືອກ ແຂວງ--</option>
                                    @foreach ($provinces as $key => $values)
                                        <option value="{{ $values->pr_id }}">{{ $values->pr_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="districts_edit" class="form-label">ເມືອງ</label>
                                <select class="form-select" id="districts_edit" name="districts_edit" required>
                                    <option value="" selected>--ກະລຸນາເລືອກແຂວງກ່ອນ--</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="villages_edit" class="form-label">ບ້ານ</label>
                                <select class="form-select" id="villages_edit" name="villages_edit" required>
                                    <option value="" selected>--ກະລຸນາເລືອກເມືອງກ່ອນ--</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="branch_name_edit" class="form-label">ຊື່ ສາຂາ</label>
                                <input type="text" class="form-control" id="branch_name_edit"
                                    name="branch_name_edit" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="location_edit" class="form-label">location</label>
                                <input type="text" class="form-control" id="location_edit" name="location_edit">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ປິດ</button>
                    <button type="submit" id="btnSave_edit" class="btn btn-primary">ບັນທືກ</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    $('#provinces_edit').change(function() {
        var prId = $('#provinces_edit').val();
        if (prId > 0) {
            $.ajax({
                url: "/app/branchs/district/" + prId,
                method: 'GET',
                processData: false,
                dataType: 'json',
                contentType: false,
                cashe: false,
                beforeSend: function() {
                    $('#districts_edit').html('<option value="1">ກຳລັງໂຫຼດ...</option>');
                    // $('#villages').html('<option value="1">ກຳລັງໂຫຼດ...</option>');
                },
                success: function(result) {
                    console.log(result.district);
                    var _district = result.district;

                    var Options = "<option selected>--ເລືອກ ເມືອງ--</option>";

                    for (let index = 0; index < _district.length; index++) {
                        Options += "<option value=\"" + _district[index].dr_id + "\">" + _district[
                            index].dr_name + "</option>"
                    }
                    $('#districts_edit').html(Options);
                    $('#districts_edit').prop('disabled', false)
                },
                error: function(err) {
                    console.log(err);
                }
            })
        } else {
            $('#districts_edit').html('<option value="" selected>--ກະລຸນາເລືອກແຂວງກ່ອນ--</option>');
            $('#villages_edit').html('<option value="" selected>--ກະລຸນາເລືອກເມືອງກ່ອນ--</option>');

            $('#districts_edit').prop('disabled', true)
            $('#villages_edit').prop('disabled', true)
        }
    })

    $('#districts_edit').change(function() {
        var drId = $('#districts_edit').val();
        if (drId > 0) {
            $.ajax({
                url: "/app/branchs/villages/" + drId,
                method: 'GET',
                processData: false,
                dataType: 'json',
                contentType: false,
                cashe: false,
                beforeSend: function() {
                    $('#villages').html('<option value="1">ກຳລັງໂຫຼດ...</option>');
                },
                success: function(result) {
                    console.log(result.villages);
                    var villages = result.villages;

                    var Options = "<option selected>--ເລືອກ ບ້ານ--</option>";

                    for (let index = 0; index < villages.length; index++) {
                        Options += "<option value=\"" + villages[index].vill_id + "\">" + villages[
                            index].vill_name + "</option>"
                    }
                    $('#villages').html(Options);
                    $('#villages').prop('disabled', false)
                },
                error: function(err) {
                    console.log(err);
                }
            })
        } else {
            $('#districts').html('<option value="" selected>--ກະລຸນາເລືອກແຂວງກ່ອນ--</option>');
            $('#villages').html('<option value="" selected>--ກະລຸນາເລືອກເມືອງກ່ອນ--</option>');

            $('#districts').prop('disabled', true)
            $('#villages').prop('disabled', true)
        }
    })

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
                    console.log(result);
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
                    _tables(result.datas);
                },
                error: function(err) {
                    console.log(err);
                    $('#btnSave_edit').prop('disabled', false)
                    $('#btnSave_edit').html('ບັນທືກ')
                }

            });
        })
    })
</script>
