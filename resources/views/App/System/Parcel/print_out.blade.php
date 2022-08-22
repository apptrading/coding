<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DANIKA | Print</title>
    <link href="{{ asset('assets/img/iconweb/icon.png') }}" rel="icon">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="container py-2">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <table class="table " id="PrintBill">
                    <thead>
                        <tr>
                            <th colspan="2">
                                <center>
                                    <img style="width: 150px" class="pb-1"
                                        src="{{ asset('assets/img/iconweb/icon.png') }}" alt="logoBill">
                                </center>

                                {{-- <h6 class="text-center">ບໍລິສັດ ດານິກາ ການຄ້າ ຂາເຂົ້າ-ຂາອອກ ຈຳກັດຜູ້ດຽວ</h6> --}}
                                {{-- <h6 class="text-center">DANIKA TRADING IMPORT-EXPORT SOLE Co.,LTD </h6> --}}
                                <div class="row">
                                    <div class="col-md-6 col-6">
                                        <h6>ບ້ານ ອາມອນ ເມືອງ ໄຊເສດຖາ ນະຄອນຫຼວງວຽງຈັນ</h6>
                                    </div>
                                    <div class="col-md-6 col-6">
                                        <h6 class="text-end">ເບີໂທ: 020 29946365</h6>
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
                                    <div class="col-md-6">
                                        ໝາຍເຫດ:the original words and form of a written or printed work
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <h6 id="T1">ຈຳນວນລວມ:....3....ກ່ອງ</h6>
                                        <h6 id="T2">ລາຄາລວມ:....6,000....ບາດ</h6>
                                        <h6 id="T3">ລາຄາລວມ:....60,000....ກີບ</h6>
                                        <h6 id="T4">ເລດເງິນ:....490....</h6>
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
            <div class="col-md-4"></div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('app.parcel.listsendout') }}",
                method: "GET",
                contentType: false,
                dataType: 'json',
                processData: false,
                cashe: false,
                success: function(result) {
                    _table(result.datas)
                    window.print();
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
                    "<tr>" +
                    "<td colspan=\"2\">" +
                    "<div class=\"row\">" +
                    "<div class=\"col-md-7 col-7\">" +
                    "ເລກພັດສະດຸ: " + _Datas[_multiple].route_barcode + "" + "<br>" +
                    " ຂະໜາດ&ນ້ຳໜັກ: " + _Datas[_multiple].parcel_total + "cm&" + _Datas[_multiple].parcel_kg + "Kg" +
                    "</div>" +
                    "<div class=\"col-md-5 col-5 text-end\">" +
                    "COD: " + _Datas[_multiple].parcel_paycod.toLocaleString() + " ₭<br>" +
                    "ລາຄາ: " + _Datas[_multiple].parcel_countpayment.toLocaleString() + " ₭" +
                    "</div>" +
                    "</div>" +
                    "</td>" +
                    "</tr>";
            }
            $('#datasParcel').html(_tables)
            $('#T1').html("<h6 id=\"T1\">ຈຳນວນລວມ:...." + count + "....ກ່ອງ</h6>")
            $('#T2').html("<h6 id=\"T2\">ລາຄາລວມ:...." + Math.ceil((parseFloat(_T3) / 490)) + "....ບາດ</h6>")
            $('#T3').html("<h6 id=\"T3\">ລາຄາລວມ:...." + _T3.toLocaleString() + "....ກີບ</h6>")
            $('#T4').html("<h6 id=\"T4\">ເລດເງິນ:....490....</h6>")
            // if (_Datas.length == 0) $('#popup').hide()
        }

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
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
