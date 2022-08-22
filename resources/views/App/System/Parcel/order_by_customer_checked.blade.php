@extends('Layout.layout_back_end')
@section('title', 'DANIKA | Customer Check')
@section('contents')

    <div class="container-fluid py-2">
        <div class="row py-2">
            <div class="col-md-1"></div>
            <div class="col-md-10  table-responsive">
                <table class="table table-bordered" style="width:100%" id="table-parcel">
                    <thead>
                        <tr>
                            <td>ດຳລັບ</td>
                            <td>ເລກລະຫັດບາໂຄດ</td>
                            <td>ຊື່ລູກຄ້າ</td>
                            <td>ເບີໂທ</td>
                            {{-- <td>ເບິ ວັອດແອັບ</td> --}}
                            <td>ລາຄາ</td>
                            <td>ຂໍ້ມູນການຊຳລະ</td>
                            <td>ອະນູມັດໂດຍ</td>
                            <td>ເລກບີນ</td>
                            <td>ວັນທີ່</td>
                            <td>ເວລາ</td>
                            <td>ສະຖານະການອະນູມັດ</td>
                            <td>ຫຼັກຖານ</td>
                            <td>ວັນທີ່ບັນທືກ</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="14"><i class="fas fa-spinner fa-pulse"></i> ກຳລັງໂຫຼດ...</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="mdal_edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="mdal_editLabel" aria-hidden="true">
        <form action="{{ route('app.parcel.cusr.OrderCustupdate') }}" method="POST" enctype="multipart/form-data"
            id="frm-edit">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mdal_editLabel">ແກ້ໄຂຂໍ້ມູນ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="inp_id">
                        <input type="text" name="barcode" id="barcode" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ປີດ</button>
                        <button type="submit" id="btnEdit" class="btn btn-primary">ບັນທືກ</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('app.parcel.cusr.show.checked') }}",
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

            $('#frm-edit').on('submit', function(event) {
                event.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: new FormData(this),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    cashe: false,
                    success: function(result) {
                        $('#frm-edit')[0].reset();
                        $('#mdal_edit').modal('hide')
                        Swal.fire(
                            'Success!',
                            '',
                            'success'
                        )
                        _tables(result.datas);
                    },
                    error: function(err) {
                        console.log(err);
                    }
                })

            });
        })


        function _tables(result_datas) {
            let numb = 1;
            var table = $('#table-parcel').DataTable({
                responsive: true,
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
                        data: "cust_barcode",
                    },
                    {
                        data: "customer_name"
                    },
                    {
                        data: "customer_tell"
                    },
                    // {
                    //     data: "customer_whatsapp",
                    // },
                    {
                        data: "cust_payment",
                    },
                    {
                        data: "cust_status",
                        render: function(data, type, row) {
                            var letReturn = "";
                            if (row.cust_status == 0) {
                                letReturn += "<span>ຍັງບໍ່ຈ່າຍ</span>";
                            } else {
                                letReturn += "<span>ຈ່າຍແລ້ວ</span>";
                            }


                            return letReturn;
                        }
                    },
                    {
                        data: "name",
                    },
                    {
                        data: "cust_nub_bill",
                    },
                    {
                        data: "cust_date_pay",
                    },
                    {
                        data: "cust_time_pay",
                    },
                    {
                        data: "cust_approve",
                        render: function(data, type, row) {
                            var letReturn = "";
                            if (row.cust_status == 2) {
                                letReturn +=
                                    "<span class=\"badge rounded-pill bg-success\">ອະນູມັດແລ້ວ</span>";
                            } else if (row.cust_status == 3) {
                                letReturn +=
                                    "<span class=\"badge rounded-pill bg-danger\">ບໍ່ອະນູມັດແລ້ວ</span>";
                            } else {
                                letReturn +=
                                    "<span class=\"badge rounded-pill bg-warning text-dark\">ລໍຖ້າອະນູມັດ</span>";
                            }


                            return letReturn;
                        }
                    },
                    {
                        data: "cust_picturepayment",
                        render: function(data, type, row) {
                            var _files = row.cust_picturepayment;
                            return "<a href=\"" + _files +
                                "\" style=\"text-decoration: none\" target=\"_blank\">ຫຼັກຖານການໂອນ</a>";
                        }
                    },
                    {
                        data: "created_at",
                        render: function(data, type, row) {
                            var _split = row.created_at.split('T')
                            return _split[0];
                        }

                    },

                    {
                        data: "id",
                        createdCell: function(td, cellData, rowData,
                            row, col) {
                            $(td).addClass('text-center');
                        },
                        render: function(data, type, row) {
                            var btnDisabled = "";
                            if (row.cust_approve > 0) {
                                btnDisabled = "disabled"
                            }
                            var letReturn = "";
                            var btn1 =
                                "<button {{ Auth::user()->userright == 1 ? '' : 'disabled' }} type=\"button\" " +
                                btnDisabled + " onclick=\"_agree(" + row
                                .id +
                                ")\" class=\"btn btn-success\"><i class=\"far fa-check-circle\"></i></button>";
                            var btn2 =
                                "<button type=\"button\" onclick=\"$('#mdal_edit').modal('show'); $('#inp_id').val(" +
                                row.id +
                                ")\" class=\"btn btn-warning\"><i class=\"far fa-edit\"></i></button>";

                            letReturn +=
                                "<div class=\"btn-group btn-group-sm\" role=\"group\">" + btn1 + btn2 +
                                " </div>";

                            return letReturn;
                        }
                    }
                ]
            });
            new $.fn.dataTable.FixedHeader(table);
        }

        function _agree(id) {
            Swal.fire({
                title: 'ການອະນຸມັດບີນເກັບເງິນປາຍທາງ',
                // text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                showDenyButton: true,
                confirmButtonColor: '#006600',
                denyButtonColor: '#ff9900',
                cancelButtonColor: '#e60000',
                confirmButtonText: 'ອະນູມັດ',
                denyButtonText: `ບໍ່ອະນູມັດ`,
                cancelButtonText: 'ອອກ',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/app/parcel/cust/confirm/" + id + "/2",
                        method: 'GET',
                        processData: false,
                        dataType: 'json',
                        contentType: false,
                        cashe: false,
                        success: function(result) {
                            Swal.fire(
                                'Confirm Success!',
                                '',
                                'success'
                            )
                            _tables(result.datas);
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    })
                } else if (result.isDenied) {
                    $.ajax({
                        url: "/app/parcel/cust/confirm/" + id + "/3",
                        method: 'GET',
                        processData: false,
                        dataType: 'json',
                        contentType: false,
                        cashe: false,
                        success: function(result) {
                            Swal.fire(
                                'Confirm Success!',
                                '',
                                'success'
                            )
                            _tables(result.datas);
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    })
                }
            })
        }
    </script>


@endsection
