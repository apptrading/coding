@extends('Layout.layout_back_end')
@section('title', 'DANIKA | Scan by Mobile')
@section('contents')
    <div class="container py-2">
        <div class="row">
            {{-- <div class="col-md-4 "></div> --}}
            <div class="col-md-12 ">
                <center>
                    <div id="camera"></div>
                    <button class="btn btn-primary btn-sm"
                        onclick="window.location.href='{{ route('app.system.parcel.transfer') }}'"><i
                            class="fas fa-reply-all"></i> ຍ້ອນກັບ</button>
                </center>
            </div>
            {{-- <div class="col-md-4 "></div> --}}
        </div>
    </div>
    <style>
        /* In order to place the tracking correctly */
        canvas.drawing,
        canvas.drawingBuffer {
            position: absolute;
            left: 0;
            top: 0;
        }
    </style>
    <script>
        Quagga.init({
            inputStream: {
                name: "Live",
                type: "LiveStream",
                target: document.querySelector('#camera'), // Or '#yourElement' (optional)
                constraints: {
                    width: 550,
                    height: 340,
                },

            },
            decoder: {
                readers: [
                    'code_128_reader'
                ]
            },
            locate: true,
            // src: '{{ asset('assets/img/barcode01.jpeg') }}'
        }, function(err) {
            if (err) {
                console.log(err);
                return
            }
            // console.log("Initialization finished. Ready to start");
            Quagga.start();
        });

        Quagga.onDetected(function(data) {
            // console.log("==>" + data.codeResult.code);
            if (data.codeResult.code != "") {
                var barcode = data.codeResult.code;
                _popup(barcode)
            }
        });

        function _popup(barcode) {
            var BrCode = barcode.toUpperCase();
            Swal.fire({
                title: 'Check BarCode again.!',
                text: "this's barcode number : " + BrCode,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#009900',
                cancelButtonColor: '#007acc',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'barcode: ' + BrCode,
                        'success'
                    )
                }
            })
        }
    </script>
@endsection
