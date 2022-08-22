@extends('Layout.layout_back_end')
@section('title', 'DANIKA | Dashboard')
@section('contents')
    <div class="container-fluid py-2">
        <div class="row py-2">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <table class="table table-bordered" style="width:100%" id="table-parcel">
                    <thead>
                        <tr>
                            <th>ດຳລັບ</th>
                            <th>ເລກພັດສະດຸ</th>
                            <th>ຊື່ລູກຄ້າ</th>
                            <th>ເບີໂທ</th>
                            <th>ຂະໜາດ</th>
                            <th>ນ້ຳໜັກ</th>
                            <th>ລາຄາ</th>
                            <th>ມູນຄ່າປາຍທາງ</th>
                            <th>ປະເພດເຄື່ອງ</th>
                            <th>ສາຂາ</th>
                            <th>ວັນທີ່ຮັບເຂົ້າສາງ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="11"><i class="fas fa-spinner fa-pulse"></i> ກຳລັງໂຫຼດ...</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            {{-- <td></td> --}}
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('report.sentoutList') }}",
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
            $('#table-parcel thead tr').clone(true).addClass('filters').appendTo('#table-parcel thead');

            var myTable = $('#table-parcel').DataTable({
                orderCellsTop: true,
                select: true,
                initComplete: function() {
                    var api = this.api();

                    // For each column
                    api
                        .columns()
                        .eq(0)
                        .each(function(colIdx) {
                            // Set the header cell to contain the input element
                            var cell = $('.filters th').eq(
                                $(api.column(colIdx).header()).index()
                            );
                            var title = $(cell).text();
                            $(cell).html(
                                '<input type="text" class="form-control form-control-sm" placeholder="' +
                                title + '" />');

                            // On every keypress in this input
                            $(
                                    'input',
                                    $('.filters th').eq($(api.column(colIdx).header()).index())
                                )
                                .off('keyup change')
                                .on('keyup change', function(e) {
                                    e.stopPropagation();

                                    // Get the search value
                                    $(this).attr('title', $(this).val());
                                    var regexr =
                                        '({search})'; //$(this).parents('th').find('select').val();

                                    var cursorPosition = this.selectionStart;
                                    // Search the column for that value
                                    api
                                        .column(colIdx)
                                        .search(
                                            this.value != '' ?
                                            regexr.replace('{search}', '(((' + this.value + ')))') :
                                            '',
                                            this.value != '',
                                            this.value == ''
                                        )
                                        .draw();

                                    $(this)
                                        .focus()[0]
                                        .setSelectionRange(cursorPosition, cursorPosition);
                                });
                        });
                },
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
                        data: "id",
                        render: function(data, type, row) {
                            var letReturn = "";
                            letReturn +=
                                "<span>" + row.parcel_width + "cm*" + row.parcel_length +
                                "cm*" + row
                                .parcel_height + "cm</span>";

                            if (row.parcel_width > 0 && row.parcel_length > 0 && row
                                .parcel_height > 0) {
                                return letReturn;
                            } else {
                                return "";
                            }

                        }
                    },
                    {
                        data: "parcel_kg",
                    },
                    {
                        data: "parcel_countpayment",
                        render: function(data, type, row) {
                            if (row.parcel_countpayment > 0) {
                                return "<span>" + row.parcel_countpayment.toLocaleString() +
                                    "</span>";
                            } else {
                                return "";
                            }

                        }
                    },
                    {
                        data: "parcel_paycod",
                        render: function(data, type, row) {
                            if (row.parcel_paycod > 0) {
                                return "<span>" + row.parcel_paycod.toLocaleString() +
                                    "</span>";
                            } else {
                                return "";
                            }
                        }
                    },
                    {
                        data: "parcel_countpayment",
                        render: function(data, type, row) {
                            return "<span>ດຳເນິນການຢູ່</span>";
                        }
                    },
                    {
                        data: "branch_name",
                    },



                    {
                        data: "parcel_outdate",
                    },
                ],
                drawCallback: function() {
                    var api = this.api();
                    var sum = 0;
                    var formated = 0;
                    //to show first th
                    $(api.column(0).footer()).html('Total');
                    sum = api.column(6, { page: 'current'}).data().sum();
                    sum2 = api.column(7, { page: 'current' }).data().sum();

                    formated = parseFloat(sum).toLocaleString(undefined, {
                        minimumFractionDigits: 2
                    });
                    formated2 = parseFloat(sum2).toLocaleString(undefined, {
                        minimumFractionDigits: 2
                    });
                    $(api.column(6).footer()).html(formated);
                    $(api.column(7).footer()).html(formated2);
                }
            });
        }
    </script>


@endsection
