@extends('Layout.layout_back_end')
@section('title', 'DANIKA | Stock Out')
@section('contents')

    {{-- <div class="container py-2"> --}}
    <div class="row py-2">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <table class="table table-bordered" style="width:100%" id="table-parcel">
                <thead style="background: #ccc">
                    <tr>
                        <td>ລຳດັບ</td>
                        <td>ເລກລະຫັດບາໂຄດ</td>
                        <td>ຊື່ລູກຄ້າ</td>
                        <td>ເບີໂທ</td>
                        <td>ເບິ ວັອດແອັບ</td>
                        <td>ຂະໜາດ</td>
                        <td>ນ້ຳໜັກ</td>
                        <td>ລາຄາ</td>
                        <td>ຊັ້ນວາງ</td>
                        <td>ຊື່ຜູ້ມອບສີນຄ້າ</td>
                        <td>ວັນທີ່ຮັບເຂົ້າສາງ</td>
                        <td>ວັນທີ່ສົ່ງລູກຄ້າ</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="11"><i class="fas fa-spinner fa-pulse"></i> ກຳລັງໂຫຼດ...</td>
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
                url: "{{ route('report.out_laos') }}",
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
            $('#table-parcel').DataTable({
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
                        data: "parcel_barcode",
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
                        data: "id",
                        render: function(data, type, row) {
                            var letReturn = "";
                            letReturn +=
                                "<span>" + row.parcel_width + "cm*" + row.parcel_length + "cm*" + row
                                .parcel_height + "cm</span>";

                            return letReturn;
                        }
                    },
                    {
                        data: "parcel_kg",
                    },
                    {
                        data: "parcel_countpayment",
                    },
                    {
                        data: "parcel_shelfid",
                    },
                    {
                        data: "name",
                    },
                    {
                        data: "parcel_receivedate",
                    },
                    {
                        data: "parcel_outdate",
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
                                "<a href=\"/app/report/out/laos/detail/" + row.parcel_barcode +
                                "\" class=\"btn btn-warning btn-sm\"><i class=\"far fa-folder\"></i></a>";

                            return letReturn;
                        }
                    }
                ]
            });
        }
    </script>


@endsection
