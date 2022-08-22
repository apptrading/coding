@extends('Layout.layout_back_end')
@section('title', 'DANIKA | Daily')
@section('contents')
    <div class="container py-2">
        <div class="row">
            <div class="col-md-4 col-12"></div>
            <div class="col-md-4 col-12">
                <h3 class="text-center">ພັດສະດຸທີ່ເກັບເງິນປາຍທາງ</h3>

                <form action="{{ route('app.parcel.Dailyparcel') }}" method="POST" enctype="multipart/form-data"
                    id="frm-step-first-daily">

                    <div class="row">
                        <div class="col-md-6 customer1">
                            <div class="mb-3">
                                <label for="customer_name" class="form-label">ຊື່ລູກຄ້າ</label>
                                <input type="text" class="form-control required1" id="customer_name"
                                    name="customer_name">
                                <small
                                    onclick="
                                    $('.customer2').show();
                                    $('.customer1').hide();
                                    $('.required1').prop('required',false);
                                    $('.required2').prop('required',true);
                                    $('#customerId').val('')"
                                    class="text-primary" role="button">ກັບສູ່ລາຍຊື່ລູກຄ້າ</small>
                            </div>
                        </div>
                        <div class="col-md-6 customer1">
                            <div class="mb-3">
                                <label for="customer_tell" class="form-label">ເບີໂທ</label>
                                <input type="text" class="form-control required1" id="customer_tell"
                                    name="customer_tell">
                            </div>
                        </div>

                        <div class="col-md-12 customer2">
                            <label for="customerId" class="form-label">ລາຍຊື່ລູກຄ້າ</label>
                            <div class="input-group mb-3">

                                <select class="form-select required2" id="customerId" name="customerId">
                                    <option selected value="">ເລືອກລາຍຊື່ລູກຄ້າ</option>
                                </select>
                                <button
                                    onclick="
                                    $('.customer1').show();
                                    $('.customer2').hide();
                                    $('.required1').prop('required',true);
                                    $('.required2').prop('required',false);
                                    $('.required1').val('')"
                                    class="btn btn-primary" type="button" id="button-addon2"><i
                                        class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="cust_payment" class="form-label">ຍອດປາຍທາງ</label>
                                <input type="text" class="form-control" id="cust_payment" name="cust_payment" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="cust_barcode" class="form-label">ລະຫັດພັດສະດຸ</label>
                                <input type="text" name="cust_barcode" id="cust_barcode" class="form-control mb-2">
                            </div>

                        </div>
                        <div class="col-md-12">
                            <label for="cust_fileparcel" class="form-label">ຮູບເຄື່ອງ</label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="cust_fileparcel" name="cust_fileparcel">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="cust_picturepayment" class="form-label">ສະລິບໂອນເງິນ </label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="cust_picturepayment"
                                    name="cust_picturepayment" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="cust_date_pay" class="form-label">ວັນທີ່</label>
                                <input type="date" class="form-control" id="cust_date_pay" name="cust_date_pay" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="cust_time_pay" class="form-label">ເວລາ</label>
                                <input type="time" class="form-control" id="cust_time_pay" name="cust_time_pay" step="2" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="cust_count_transfer" class="form-label">ຈຳນວນເງິນທີ່ໂອນ</label>
                                <input type="tel" class="form-control" id="cust_count_transfer"
                                    name="cust_count_transfer">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="cust_nub_bill" class="form-label">ເລກບີນການໂອນ</label>
                                <input type="tel" class="form-control" id="cust_nub_bill" name="cust_nub_bill">
                            </div>
                        </div>

                    </div>



                    <div id="alertId"></div>

                    <div class="d-grid gap-2 col-12 mx-auto">
                        <button class="btn btn-primary" type="submit" id="btnSave"><i class="fas fa-save"></i>
                            ບັນທຶກ</button>
                        <button class="btn btn-danger" type="button" id="clear">
                            ລົບລາຍເຊັນ</button>

                        <button class="btn btn-secondary"
                            onclick="window.location.href='{{ route('app.system.parcel') }}'" type="button">
                            <i class="fas fa-reply-all"></i> ຍ້ອນກັບ</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4 col-12"></div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.customer1').hide()
            $('.required2').prop('required', true)

            $('form').on('submit', function(event) {
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
                        $('#btnSave').html(
                            '<i class="fas fa-spinner fa-pulse"></i> ກຳລັງບັນທືກ')
                        $('#btnSave').prop('disabled', true)
                    },
                    success: function(result) {
                        console.log(result);

                        if (result.result == true) {
                            $('#btnSave').prop('disabled', false)
                            $('#btnSave').html(
                                '<i class="fas fa-save"></i> ບັນທືກ')
                            $('#frm-step-first-daily')[0].reset();
                            // signaturePad.clear();
                            window.location.href = "{{ route('app.system.parcel') }}";

                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal
                                        .stopTimer)
                                    toast.addEventListener('mouseleave', Swal
                                        .resumeTimer)
                                }
                            })

                            Toast.fire({
                                icon: 'success',
                                title: 'successfully'
                            })
                        } else {
                            $('#alertId').html(
                                "<div class=\"alert alert-danger  alert-dismissible fade show\" role=\"alert\">" +
                                " <strong>ເກີດຂໍ້ຜິດພາດ</strong> ລະຫັດບາໂຄດນີ້ຍັງບໍ່ຖືກອະນຸມັດ ກະລຸນາຕີດຕໍ່ Admin" +
                                "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>" +
                                "</div>"
                            )
                            $('#btnSave').prop('disabled', false)
                            $('#btnSave').html(
                                '<i class="fas fa-save"></i> ບັນທືກ')
                        }


                    },
                    error: function(err) {
                        console.log(err);
                        $('#btnSave').prop('disabled', false)
                        $('#btnSave').html(
                            '<i class="fas fa-save"></i> ບັນທືກ')
                    }

                });

            });

            /** customer list */
            $.ajax({
                url: "{{ route('app.customer.customer.select') }}",
                method: "GET",
                contentType: false,
                dataType: 'json',
                processData: false,
                cashe: false,
                beforeSend: function() {
                    $('#customerId').html('<option value="" selected>ເລືອກລາຍຊື່ລູກຄ້າ</option>')
                    $('#customerId').prop('disabled', true)
                },
                success: function(result) {
                    console.log(result);
                    $('#customerId').prop('disabled', false)
                    var _datas = result.datas;
                    var Option = "<option value=\"\" selected>ເລືອກລາຍຊື່ລູກຄ້າ</option>";
                    for (let _cust = 0; _cust < _datas.length; _cust++) {
                        Option += "<option value=\"" + _datas[_cust].id + "\">" + _datas[_cust]
                            .customer_name +
                            " [" + _datas[_cust].customer_tell + "] </option>";
                    }
                    $('#customerId').html(Option);
                    $('#customerId').select2({
                        theme: "bootstrap-5",
                    })

                },
                error: function(err) {
                    console.log(err);
                }
            })
        })
    </script>
@endsection
