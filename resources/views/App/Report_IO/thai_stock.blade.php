@extends('Layout.layout_back_end')
@section('title', 'DANIKA | Stock Thai')
@section('contents')

    {{-- <div class="container py-2"> --}}
    <div class="row py-2">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <table class="table table-bordered" style="width:100%" id="table-stockthai">
                <thead>
                    <tr>
                        <td>ດຳລັບ</td>
                        <td>ເລກລະຫັດບາໂຄດ</td>
                        <td>ຊື່ລູກຄ້າ</td>
                        <td>ເບີໂທ</td>
                        <td>ເບິ ວັອດແອັບ</td>
                        {{-- <td>ຂະໜາດ</td> --}}
                        <td>ລາຄາ</td>
                        <td>ຊັ້ນວາງ</td>
                        <td>ຜູ້ຮັບເຄື່ອງ</td>
                        <td>ວັນທີ່ຮັບເຂົ້າສາງ</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="9"><i class="fas fa-spinner fa-pulse"></i> ກຳລັງໂຫຼດ...</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-1"></div>
    </div>
    {{-- </div> --}}


    <script>
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('report.stockthaidetail') }}",
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


        function _tables(result_datas) {
            let numb = 1;
            $('#table-stockthai').DataTable({
                destroy: true,
                data: result_datas,
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
                        data: "route_barcode",
                    },
                    {
                        data: "customer_name"
                    },
                    {
                        data: "customer_tell"
                    },
                    {
                        data: "customer_whatsapp",
                    },
                    {
                        data: "cust_payment",
                    },
                    {
                        data: "id",
                    },
                    {
                        data: "name",
                    },
                    {
                        data: "created_at",
                        render: function(data, type, row) {
                            var _split = row.created_at.split('T')
                            return _split[0];
                        }
                    },
                ]
            });
        }
    </script>


@endsection
