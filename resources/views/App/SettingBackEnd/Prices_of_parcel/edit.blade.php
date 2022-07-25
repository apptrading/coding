<!-- Modal -->
<div class="modal fade" id="modal_edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modal_editLabel" aria-hidden="true">
    <form action="{{ route('app.priceofparcelupdate') }}" method="POST" enctype="multipart/form-data" id="frm_edit">
        <input type="hidden" name="id" id="id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_addLabel">ເພິ່ມຂໍ້ມູນໃໝ່</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="box_width_edit" class="form-label">ຄວາມກວ້າງ</label>
                                <input type="number" class="form-control" id="box_width_edit" name="box_width_edit"
                                    placeholder="cm" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="box_height_edit" class="form-label">ຄວາມສູງ</label>
                                <input type="number" class="form-control" id="box_height_edit" name="box_height_edit"
                                    placeholder="cm" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="box_length_edit" class="form-label">ຄວາມຍາວ</label>
                                <input type="number" class="form-control" id="box_length_edit" name="box_length_edit"
                                    placeholder="cm" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="box_price_edit" class="form-label">ລາຄາ</label>
                                <input type="number" class="form-control" id="box_price_edit" name="box_price_edit"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="box_name_edit" class="form-label">ຊື່ກ່ອງ</label>
                                <input type="text" class="form-control" id="box_name_edit" name="box_name_edit"
                                    required>
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

                    _alert()
                    _tables(result.datas)
                    $('#modal_edit').modal('hide')

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
