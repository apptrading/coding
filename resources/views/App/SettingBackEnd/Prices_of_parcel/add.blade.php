<!-- Modal -->
<div class="modal fade" id="modal_add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modal_addLabel" aria-hidden="true">
    <form action="{{ route('app.priceofparceladd') }}" method="POST" enctype="multipart/form-data" id="frm_add">
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
                                <label for="box_width" class="form-label">ຄວາມກວ້າງ</label>
                                <input type="number" class="form-control" id="box_width" name="box_width"
                                    placeholder="cm" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="box_height" class="form-label">ຄວາມສູງ</label>
                                <input type="number" class="form-control" id="box_height" name="box_height"
                                    placeholder="cm" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="box_length" class="form-label">ຄວາມຍາວ</label>
                                <input type="number" class="form-control" id="box_length" name="box_length"
                                    placeholder="cm" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="box_price" class="form-label">ລາຄາ</label>
                                <input type="number" class="form-control" id="box_price" name="box_price" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="box_name" class="form-label">ຊື່ກ່ອງ</label>
                                <input type="text" class="form-control" id="box_name" name="box_name" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ປິດ</button>
                    <button type="submit" id="btnSave" class="btn btn-primary">ບັນທືກ</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        $('#frm_add').on('submit', function(event) {
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
                    $('#frm_add')[0].reset();
                    $('#btnSave').prop('disabled', false)
                    $('#btnSave').html('ບັນທືກ')

                    _alert()
                    _tables(result.datas)


                },
                error: function(err) {
                    console.log(err);
                    $('#btnSave').prop('disabled', false)
                    $('#btnSave').html('ບັນທືກ')
                }

            });

        });
    })
</script>
