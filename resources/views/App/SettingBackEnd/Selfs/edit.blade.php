<!-- Modal -->
<div class="modal fade" id="modal_edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modal_editLabel" aria-hidden="true">
    <form action="{{ route('app.shelfupdate') }}" method="POST" enctype="multipart/form-data" id="frm_edit">
        <input type="hidden" name="id" id="id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_editLabel">ເພິ່ມ ຊັ້ນວາງໃໝ່</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="shelf_name_edit" class="form-label">ຊື່ ຊັ້ນວາງ</label>
                        <input type="text" class="form-control" id="shelf_name_edit" name="shelf_name_edit">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ປິດ</button>
                    <button type="submit" id="btnSave_edit" class="btn btn-primary">ບັນທີກ</button>
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
                    $('#modal_edit').modal('hide')

                    _alert()

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
