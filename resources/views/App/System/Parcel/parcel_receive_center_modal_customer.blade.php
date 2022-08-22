<div class="modal fade" id="adddetail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="adddetailLabel" aria-hidden="true">
    <form action="{{ route('app.parcel.AdddataParcel') }}" method="POST" enctype="multipart/form-data" id="form-detail">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adddetailLabel">ເພິ່ມຂໍ້ມູນລາຍລະອຽດ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                                <label for="type_parcel" class="form-label">ປະເພດພັດສະດຸ</label>
                                <select class="form-select" id="type_parcel" name="type_parcel" required>
                                    <option selected value="0">ປະເພດພັດສະດຸ</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="branchid" class="form-label">ສາຂາ</label>
                                <select class="form-select" id="branchid" name="branchid" required>
                                    <option selected value="">ເລືອກສາຂາ</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="parcel_width" class="form-label">ຄວາມກ້ວາງ</label>
                                <input type="text" class="form-control" id="parcel_width" name="parcel_width">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="parcel_length" class="form-label">ຄວາມຍາວ</label>
                                <input type="text" class="form-control" id="parcel_length" name="parcel_length">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="parcel_height" class="form-label">ຄວາມສູງ</label>
                                <input type="text" class="form-control" id="parcel_height" name="parcel_height">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="parcel_kg" class="form-label">ນ້ຳໜັກ</label>
                                <input type="text" class="form-control" id="parcel_kg" name="parcel_kg">
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <h5 class="text-center pb-1">ຂະໜາດກ່ອງລວມ: <b id="numb">00</b> cm</h5>
                            <input type="hidden" name="parcel_total" id="parcel_total" class="form-control">
                        </div>
                        <hr>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="parcel_countpayment" class="form-label">ລາຄາກ່ອງເຄື່ອງ </label>
                                <input type="text" class="form-control" id="parcel_countpayment"
                                    name="parcel_countpayment">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="parcel_paycod" class="form-label">ຍອດປາຍທາງ</label>
                                <input type="text" class="form-control" id="parcel_paycod" name="parcel_paycod">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="parcel_remark" class="form-label">ລາຍລະອຽດ</label>
                                <textarea class="form-control" id="parcel_remark" name="parcel_remark" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ປິດ</button>
                    <button type="submit" id="btnSaveDetail" class="btn btn-primary">ບັນທືກ</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    $('.customer1').hide()
    $('.required2').prop('required', true)
    /** ສຳລັບຄຳນວນ **/
    $('#parcel_width').keyup(function() {
        var _h = parseFloat($('#parcel_height').val());
        var _l = parseFloat($('#parcel_length').val());
        var _w = parseFloat($('#parcel_width').val());
        var _total = _w + _l + _h;

        if (_total > 0) {
            $('#parcel_total').val(_total.toFixed(2));
            $('#numb').html(_total.toFixed(2))
        }
    })
    $('#parcel_height').keyup(function() {
        var _h = parseFloat($('#parcel_height').val());
        var _l = parseFloat($('#parcel_length').val());
        var _w = parseFloat($('#parcel_width').val());
        var _total = _w + _l + _h;
        if (_total > 0) {
            $('#parcel_total').val(_total.toFixed(2));
            $('#numb').html(_total.toFixed(2))
        }
    })
    $('#parcel_length').keyup(function() {
        var _h = parseFloat($('#parcel_height').val());
        var _l = parseFloat($('#parcel_length').val());
        var _w = parseFloat($('#parcel_width').val());
        var _total = _w + _l + _h;
        if (_total > 0) {
            $('#parcel_total').val(_total.toFixed(2));
            $('#numb').html(_total.toFixed(2))
        }
    })

    /** Number only **/
    $("#parcel_width").on('keyup', function() {
        var n = parseInt($(this).val().replace(/\D/g, ''), 10);
        // console.log(n.toLocaleString());
        if (n.toLocaleString() != "NaN") {
            $(this).val(n.toLocaleString());
        } else {
            $(this).val('');
        }
    });
    $("#parcel_height").on('keyup', function() {
        var n = parseInt($(this).val().replace(/\D/g, ''), 10);
        // console.log(n.toLocaleString());
        if (n.toLocaleString() != "NaN") {
            $(this).val(n.toLocaleString());
        } else {
            $(this).val('');
        }
    });
    $("#parcel_length").on('keyup', function() {
        var n = parseInt($(this).val().replace(/\D/g, ''), 10);
        // console.log(n.toLocaleString());
        if (n.toLocaleString() != "NaN") {
            $(this).val(n.toLocaleString());
        } else {
            $(this).val('');
        }
    });
    $("#parcel_kg").on('keyup', function() {
        var n = parseInt($(this).val().replace(/\D/g, ''), 10);
        // console.log(n.toLocaleString());
        if (n.toLocaleString() != "NaN") {
            $(this).val(n.toLocaleString());
        } else {
            $(this).val('');
        }
    });
    $("#parcel_countpayment").on('keyup', function() {
        var n = parseInt($(this).val().replace(/\D/g, ''), 10);
        console.log(n.toLocaleString());
        if (n.toLocaleString() != "NaN") {
            $(this).val(n.toLocaleString());
        } else {
            $(this).val('');
        }
    });
    /** parcel_paycod */
    $("#parcel_paycod").on('keyup', function() {
        var n = parseInt($(this).val().replace(/\D/g, ''), 10);
        console.log(n.toLocaleString());
        if (n.toLocaleString() != "NaN") {
            $(this).val(n.toLocaleString());
        } else {
            $(this).val('');
        }
    });


    /** name customer  */
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
                Option += "<option value=\"" + _datas[_cust].id + "\">" + _datas[_cust].customer_name +
                    " [" + _datas[_cust].customer_tell + "] </option>";
            }
            $('#customerId').html(Option);

        },
        error: function(err) {
            console.log(err);
        }
    })

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

        },
        error: function(err) {
            console.log(err);
        }
    })



    $(document).ready(function() {
        $('#form-detail').on('submit', function(event) {
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
                    $('#btnSaveDetail').html(
                        '<i class="fas fa-spinner fa-pulse"></i> ກຳລັງບັນທືກ')
                    $('#btnSaveDetail').prop('disabled', true)
                },
                success: function(result) {
                    console.log(result);

                    if (result.result == true) {
                        $('#btnSaveDetail').prop('disabled', false)
                        $('#btnSaveDetail').html(
                            '<i class="fas fa-save"></i> ບັນທືກ')
                        $('#form-detail')[0].reset();
                        // _taable(result.datas)
                        window.location.href = "{{ route('app.system.parcel') }}";

                    } else {
                        $('#btnSaveDetail').prop('disabled', false)
                        $('#btnSaveDetail').html(
                            '<i class="fas fa-save"></i> ')
                        _error()
                    }


                },
                error: function(err) {
                    console.log(err);
                    $('#btnSaveDetail').prop('disabled', false)
                    $('#btnSaveDetail').html(
                        '<i class="fas fa-save"></i> ບັນທືກ')
                    _error(err)
                }

            });

        });
    })
</script>
