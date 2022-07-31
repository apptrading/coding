@extends('Layout.layout_back_end')
@section('title', 'DANIKA | Customer Recieve')
@section('contents')
    <div class="container py-2">
        <div class="row">
            <div class="col-md-12">
                <form action="#" method="POST" enctype="multipart/form-data" id="frm">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exampleFormControlInput11" class="form-label">ເລກລະຫັດບາໂຄດ</label>
                                <input type="text" class="form-control" id="exampleFormControlInput11">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exampleFormControlInput12" class="form-label">ຊື່ລູກຄ້າ</label>
                                <input type="text" class="form-control" id="exampleFormControlInput12">
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput13" class="form-label">ເບີໂທ</label>
                                <input type="text" class="form-control" id="exampleFormControlInput13">
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput14" class="form-label">ເບີວັອດແອັບ</label>
                                <input type="text" class="form-control" id="exampleFormControlInput14">
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput15" class="form-label">ຄວາມກວ້າງ</label>
                                <input type="text" class="form-control" id="exampleFormControlInput15">
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput16" class="form-label">ຄວາມຍາວ</label>
                                <input type="text" class="form-control" id="exampleFormControlInput16">
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput17" class="form-label">ຄວາມສູງ</label>
                                <input type="text" class="form-control" id="exampleFormControlInput17">
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput18" class="form-label">ນ້ຳໜັກ</label>
                                <input type="text" class="form-control" id="exampleFormControlInput18">
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput19" class="form-label">ລວມ</label>
                                <input type="text" class="form-control" id="exampleFormControlInput19">
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput110" class="form-label">ລາຄາ</label>
                                <input type="text" class="form-control" id="exampleFormControlInput110">
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput111" class="form-label">ຊື່ຜູ້ບັນທືກພັດສະດຸເຂົ້າສາງ</label>
                                <input type="text" class="form-control" id="exampleFormControlInput111">
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput112" class="form-label">ວັນທີ່ຮັບພັດສະດຸເຂົ້າສາງ</label>
                                <input type="text" class="form-control" id="exampleFormControlInput112">
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput113" class="form-label">ຊື່ຜູ້ສົ່ງພັດສະດຸໃຫ້ລູກຄ້າ</label>
                                <input type="text" class="form-control" id="exampleFormControlInput113">
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput114"
                                    class="form-label">ວັນທີ່ສົ່ງພັດສະດຸໃຫ້ລູກຄ້າ</label>
                                <input type="text" class="form-control" id="exampleFormControlInput114">
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-3 py-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios1" value="option1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        ຈ່າຍເງີນສົດ
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios2" value="option2">
                                    <label class="form-check-label" for="exampleRadios2">
                                        ໂອນຈ່າຍ
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput115" class="form-label">ຈຳນວນເງີນຮັບຈາກລູກຄ້າ</label>
                                <input type="text" class="form-control" id="exampleFormControlInput115">
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput116" class="form-label">ຈຳນວນເງີນທອນຄືນລູກຄ້າ</label>
                                <input type="text" class="form-control" id="exampleFormControlInput116">
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-3">
                                <label for="exampleFormControlInput116" class="form-label">ຫຼັກຖານການຈ່າຍ</label>
                                <input class="form-control" type="file" id="formFile">
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="mb-3">
                                <label for="exampleFormControlInput117" class="form-label">ລາຍເຊັນລູກຄ້າ</label>
                                <input type="text" name="signature_img" id="signature_img" class="form-control mb-2">
                                <div id="sig"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            var sig = $('#sig').signature();
            var signature = $('#sig').signature({
                syncField: '#signature_img',
                syncFormat: 'PNG'
            });


            $('#disable').click(function() {
                var disable = $(this).text() === 'Disable';
                $(this).text(disable ? 'Enable' : 'Disable');
                sig.signature(disable ? 'disable' : 'enable');
            });
            $('#clear').click(function() {
                sig.signature('clear');
            });
            $('#json').click(function() {
                alert(sig.signature('toJSON'));
            });
            $('#svg').click(function() {
                alert(sig.signature('toSVG'));
            });
        });
    </script>
@endsection
