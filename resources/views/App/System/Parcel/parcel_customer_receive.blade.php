@extends('Layout.layout_back_end')
@section('title', 'DANIKA | Receiver')
@section('contents')

    <div class="container py-2">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="{{ route('app.parcel.sendout') }}" method="POST" enctype="multipart/form-data" id="frm-cust">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"
                            onclick="$('.branchs').hide();$('#branchid').prop('required',false)" name="receiver"
                            id="bycust" value="1" checked>
                        <label class="form-check-label" for="bycust">ຮັບດ້ວຍຕົວເອງ</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"
                            onclick="$('.branchs').show();$('#branchid').prop('required',true)" name="receiver"
                            id="sentbranch" value="2">
                        <label class="form-check-label" for="sentbranch">ສົ່ງສາຂາ</label>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="route_barcode" id="route_barcode" required>
                        <button class="btn btn-primary" type="submit" id="btncust"><i class="fas fa-save"></i>
                        </button>
                    </div>
                    <div class="col-md-12 branchs">
                        <div class="mb-3">
                            {{-- <label for="branchid" class="form-label">ສາຂາ</label> --}}
                            <select class="form-select" id="branchid" name="branchid">
                                <option selected value="">ເລືອກສາຂາ</option>
                            </select>
                        </div>
                    </div>

                </form>

                <div id="PrintBill">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="2">


                                    {{-- <h6 class="text-center">ບໍລິສັດ ດານິກາ ການຄ້າ ຂາເຂົ້າ-ຂາອອກ ຈຳກັດຜູ້ດຽວ</h6> --}}
                                    {{-- <h6 class="text-center">DANIKA TRADING IMPORT-EXPORT SOLE Co.,LTD </h6> --}}
                                    <div class="row">
                                        <center>
                                            <img style="width: 150px" class="pb-1"
                                                src="{{ asset('assets/img/iconweb/icon.png') }}" alt="logoBill">
                                        </center>
                                        <div class="col-md-12 col-12">
                                            <h6 class="fw-bold text-center" style="font-size: 12px">ບ້ານ ອາມອນ ເມືອງ ໄຊເສດຖາ
                                                ນະຄອນຫຼວງວຽງຈັນ</h6>
                                            {{-- <h6 class="fw-bold" style="font-size: 12px">ເມືອງ ໄຊເສດຖາ</h6> --}}
                                            {{-- <h6 class="fw-bold" style="font-size: 12px">ນະຄອນຫຼວງວຽງຈັນ</h6> --}}
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <h6 class="fw-bold text-center" style="font-size: 12px">ເບີໂທ: 020 29946365</h6>
                                        </div>
                                    </div>

                                </th>
                            </tr>
                        </thead>
                        <tbody id="datasParcel">
                            <tr>
                                <td colspan="2">
                                    <div class="row">
                                        <div class="col-md-7 col-7">
                                            ເລກພັດສະດຸ: ABC123456789 <br>
                                            ຂະໜາດ&ນ້ຳໜັກ: 50cm&5Kg
                                        </div>
                                        <div class="col-md-5 col-5 text-end">
                                            COD: 20,000 ₭<br>
                                            ລາຄາ: 2,000,000 ₭
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <h6 id="T1" class="fw-bold" style="font-size: 12px">
                                                ຈຳນວນລວມ:....3....ກ່ອງ</h6>
                                            <h6 id="T2" class="fw-bold" style="font-size: 12px">
                                                ລາຄາລວມ:....6,000....ບາດ</h6>
                                            <h6 id="T3" class="fw-bold" style="font-size: 12px">
                                                ລາຄາລວມ:....60,000....ກີບ</h6>
                                            <h6 id="T4" class="fw-bold" style="font-size: 12px">ເລດເງິນ:....490....
                                            </h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h6 id="nametel" class="fw-bold" style="font-size: 12px">ຊື່ລູກຄ້າ:Danika
                                                020 29946365</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <span class="fw-bold" style="font-size: 12px">ໝາຍເຫດ:the original words and form
                                                of a written or printed work</span>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                                    value="option1">
                                                <label class="form-check-label" for="inlineCheckbox1">ຈ່າຍສົດ </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                    value="option2">
                                                <label class="form-check-label" for="inlineCheckbox2">ໂອນ</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                                    value="option3">
                                                <label class="form-check-label" for="inlineCheckbox3">ຕິດໜີ້</label>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <center>
                    {{-- <button type="button" class="btn btn-primary" onclick="window.open('{{ route('print_out') }}','_blank')"><i class="fas fa-print"></i></button> --}}
                    <button type="button" class="btn btn-primary" onclick="printCertificate()"><i
                            class="fas fa-print"></i></button>
                    {{-- <button type="button" class="btn btn-primary" onclick="printCertificate2()"><i
                            class="fas fa-print"></i></button> --}}
                </center>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            $('.branchs').hide()
            if ($('#sentbranch').prop('checked') == true) {
                $('.branchs').show()
            }



            $('#frm-cust').on('submit', function(event) {
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
                        $('#btncust').html(
                            '<i class="fas fa-spinner fa-pulse"></i>')
                        $('#btncust').prop('disabled', true)
                    },
                    success: function(result) {
                        console.log(result);

                        if (result.result == true) {
                            $('#btncust').prop('disabled', false)
                            $('#btncust').html(
                                '<i class="fas fa-save"></i> ')
                            // $('#frm-cust')[0].reset();
                            $('#route_barcode').val('')
                            _table(result.datas)

                        } else {
                            _error()
                            $('#route_barcode').val('')
                            $('#btncust').prop('disabled', false)
                            $('#btncust').html(
                                '<i class="fas fa-save"></i> ')
                        }
                    },
                    error: function(err) {
                        console.log(err);
                        $('#btncust').prop('disabled', false)
                        $('#btncust').html(
                            '<i class="fas fa-save"></i> ')
                        _error(err)
                    }
                });
            });

            $.ajax({
                url: "{{ route('app.parcel.listsendout') }}",
                method: "GET",
                contentType: false,
                dataType: 'json',
                processData: false,
                cashe: false,
                success: function(result) {
                    _table(result.datas)
                },
            })
        })

        function _table(resultdatas) {
            var _Datas = resultdatas;
            console.log(_Datas.length);
            var _tables = "";
            var count = 0;
            var _T3 = 0;
            for (let _multiple = 0; _multiple < _Datas.length; _multiple++) {
                count = (_multiple + 1);
                _T3 = (parseFloat(_Datas[_multiple].parcel_paycod) + parseFloat(_T3));
                _tables +=
                    "<tr style=\"border-bottom:2px solid #000 !important \">" +
                    "<td colspan=\"2\">" +
                    "<div class=\"row\">" +
                    "<div class=\"col-md-12 col-12\">" +
                    "<h6 class=\"fw-bold\" style=\"font-size: 12px\">ເລກພັດສະດຸ: " + _Datas[_multiple].route_barcode +
                    "</h6>" +
                    "<h6 class=\"fw-bold\" style=\"font-size: 12px\"> ຂະໜາດ&ນ້ຳໜັກ: " + _Datas[_multiple].parcel_total +
                    "cm&" + _Datas[_multiple].parcel_kg + "Kg </h6>" +
                    "</div>" +
                    "<div class=\"col-md-12 col-12\">" +
                    "<h6 class=\"fw-bold\" style=\"font-size: 12px\">COD: " + _Datas[_multiple].parcel_paycod
                    .toLocaleString() + " ₭ | ລາຄາ:" + _Datas[_multiple].parcel_countpayment.toLocaleString() + " ₭ </h6>" +
                    "</div>" +
                    "</div>" +
                    "</td>" +
                    "</tr>";
            }
            $('#datasParcel').html(_tables)
            $('#T1').html("<h6 id=\"T1\" class=\"fw-bold\" style=\"font-size: 12px\">ຈຳນວນລວມ:...." + count +
                "....ກ່ອງ</h6>")
            $('#T2').html("<h6 id=\"T2\" class=\"fw-bold\" style=\"font-size: 12px\">ລາຄາລວມ:...." + Math.ceil((parseFloat(
                _T3) / 490)) + "....ບາດ</h6>")
            $('#T3').html("<h6 id=\"T3\" class=\"fw-bold\" style=\"font-size: 12px\">ລາຄາລວມ:...." + _T3.toLocaleString() +
                "....ກີບ</h6>")
            $('#T4').html("<h6 id=\"T4\" class=\"fw-bold\" style=\"font-size: 12px\">ເລດເງິນ:....490....</h6>")
            $('#nametel').html("<h6 class=\"fw-bold\" style=\"font-size: 12px\">ຊື່ລູກຄ້າ:" + _Datas[0].customer_name +
                " " + _Datas[0].customer_tell + "</h6>")


            // if (_Datas.length == 0) $('#popup').hide()
        }
        /** name branch  */
        $.ajax({
            url: "{{ route('app.customer.branch.select') }}",
            method: "GET",
            contentType: false,
            dataType: 'json',
            processData: false,
            cashe: false,
            beforeSend: function() {
                $('#branchid').html('<option value="" selected>ເລືອກສາຂາ</option>')
                $('#branchid').prop('disabled', true)
            },
            success: function(result) {
                console.log(result);
                $('#branchid').prop('disabled', false)
                var _datas = result.datas;
                var Option = "<option value=\"\" selected>ເລືອກສາຂາ</option>";
                for (let _branch = 0; _branch < _datas.length; _branch++) {
                    Option += "<option value=\"" + _datas[_branch].branch_id + "\">" + _datas[_branch]
                        .branch_name + "</option>";
                }

                $('#branchid').html(Option);
                $('#branchid').select2({
                    theme: "bootstrap-5",
                })

            },
            error: function(err) {
                console.log(err);
            }
        })




        function _error(err = false) {
            var _err = 'Something went wrong!';
            if (err != false) _err = err;
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: _err,
                footer: '<a href="https://nsoftdev.com">www.nsofdev.com</a>'
            })
        }


        function printCertificate() {
            const printContents = document.getElementById('PrintBill').innerHTML;
            const originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            document.body.innerHTML = originalContents;

            setTimeout(_Print, 3000);

            $.ajax({
                url: "{{ route('app.parcel.listsendoutUpdate') }}",
                method: "GET",
                contentType: false,
                dataType: 'json',
                processData: false,
                cashe: false,
                success: function(result) {
                    // _table(result.datas)
                    console.log(result);
                },
            })
        }

        function _Print() {
            const printContents = document.getElementById('PrintBill').innerHTML;
            const originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
