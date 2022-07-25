@extends('Layout.layout_back_end')
@section('title', 'DANIKA | Parcel Normal')
@section('contents')
    <div class="container py-2">
        <div class="row">
            {{-- <div class="col-md-4 "></div> --}}
            <div class="col-md-12 ">
                <center>
                    <div id="camera"></div>
                    {{-- <div class="form-group"> --}}
                    <input type="text" class="form-control text-center" id="barcodes" name="barcodes" placeholder="barcodes"
                        readonly>
                    <button type="button" class="btn btn-block btn-outline-primary"><i class="fas fa-barcode"></i>
                        Save-5555</button>
                    {{-- </div> --}}
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
                // area: { // defines rectangle of the detection/localization area
                //     top: "10%", // top offset
                //     right: "0%", // right offset
                //     left: "80%", // left offset
                //     bottom: "0%" // bottom offset
                // },
                // singleChannel: false // true: only the red color-channel is read

            },
            decoder: {
                readers: [
                    'code_128_reader'
                ]
            },
            locate: true,
            // src: '{{asset('assets/img/barcode01.jpeg')}}'
        }, function(err) {
            if (err) {
                console.log("err==>" + err);
                return
            }
            // console.log("Initialization finished. Ready to start");
            Quagga.start();
        });

        Quagga.onDetected(function(data) {
            console.log("==>" + data.codeResult.code);
            // document.querySelector('#resultado').innerText = data.codeResult.code;
            // document.getElementById("demo").innerText = data.codeResult.code;
            $('#barcodes').val(data.codeResult.code);
        });
    </script>
@endsection
