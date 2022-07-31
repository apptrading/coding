@extends('Layout.layout_back_end')
@section('title', 'DANIKA | Customer Recieve')
@section('contents')

    <div class="container py-2">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered" style="width:100%" id="table-parcel">
                    <thead>
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
                            <td>ວັນທີ່ຮັບເຂົ້າສາງ</td>
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
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('app.parcel.cusr.show') }}",
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
                        data: "parcel_receivedate",
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
                                "<a href=\"/app/parcel/customer/"+row.parcel_barcode+"\" class=\"btn btn-success btn-sm\"><i class=\"far fa-check-circle\"></i></a>";

                            return letReturn;
                        }
                    }
                ]
            });
        }
    </script>


@endsection
