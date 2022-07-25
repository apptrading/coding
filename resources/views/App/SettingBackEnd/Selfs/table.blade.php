<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 py-1">
        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#modal_add"><i
                class="fas fa-plus"></i></button>
    </div>
    <div class="col-md-2"></div>

    <div class="col-md-2"></div>
    <div class="col-md-8">
        <table class="table table-hover table-bordered" style="width: 100%" id="table-shelf">
            <thead style="background: #ccc">
                <tr>
                    <th class="laos" width="70">ດຳລັບ</th>
                    <th>ຊື່ ຊັ້ນວາງ</th>
                    <th width="50"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="3" class="text-center"><i class="fas fa-spinner fa-pulse"></i> ກຳລັງໂຫຼດ...</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-2"></div>
</div>
<script>
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('app.profiles') }}",
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
