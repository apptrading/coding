<div class="row">
    <div class="col-md-12 py-1">
        <button type="button" id="add" class="btn btn-primary float-end"><i class="fas fa-plus"></i></button>
    </div>

    <div class="col-md-12">
        <table class="table table-hover table-bordered" style="width: 100%" id="table-branch">
            <thead style="background: #ccc">
                <tr>
                    <th class="laos" width="70">ດຳລັບ</th>
                    <th>ແຂວງ</th>
                    <th>ເມືອງ</th>
                    <th>ບ້ານ</th>
                    <th>ຊື່ ສາຂາ</th>
                    <th class="laos" width="70">location</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="7" class="text-center"><i class="fas fa-spinner fa-pulse"></i> ກຳລັງໂຫຼດ...</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#add').click(function() {
            $('#modal_add').modal('show')
        })


        $.ajax({
            url: "{{ route('app.BshowProfile') }}",
            method: 'GET',
            processData: false,
            dataType: 'json',
            contentType: false,
            cashe: false,
            success: function(result) {
                _tables(result.datas);
            },
            error: function(err) {
                console.log(err);
            }
        })


    })
</script>
