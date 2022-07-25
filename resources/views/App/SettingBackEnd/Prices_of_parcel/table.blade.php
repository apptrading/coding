<div class="row">
    <div class="col-md-12 py-1">
        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#modal_add"><i
                class="fas fa-plus"></i></button>
    </div>

    <div class="col-md-12">
        <table class="table table-hover table-bordered" style="width: 100%" id="table-box">
            <thead style="background: #ccc">
                <tr>
                    <th class="laos" width="70">ດຳລັບ</th>
                    <th>ຊື່ກ່ອງ</th>
                    <th>ຄວາມກວ້າງ</th>
                    <th>ຄວາມສູງ</th>
                    <th>ຄວາມຍາວ</th>
                    <th>ລາຄາ</th>
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
        $.ajax({
            url: "{{ route('app.PriceOfParcelShow') }}",
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
