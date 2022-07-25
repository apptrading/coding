@extends('Layout.layout_back_end')
@section('title', 'DANIKA | Register')
@section('contents')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">

                {{-- <h3 class="text-center">Login User</h3> --}}
                <div class="shadow-sm p-3 mb-5 bg-body rounded">
                    <center class="py-2">
                        <img src="{{ asset('assets/img/iconweb/icon.png') }}" style="height: 180px;width: 180px;"
                            alt="">
                    </center>
                    <form action="{{ route('app.RegisterUser') }}" method="POST" enctype="multipart/form-data">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" name="name" placeholder="name">
                            <label for="name">name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="name@example.com">
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="userright" name="userright"
                                aria-label="Floating label select example">
                                <option selected>Select Type of User</option>
                                <option value="1">Manager</option>
                                <option value="2">Admin</option>
                                <option value="3">User</option>
                            </select>
                            <label for="userright">User Right</label>
                        </div>
                        <button type="submit" id="btnSave" class="btn btn-primary w-100">Register User</button>
                    </form>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
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
                            '<i class="fas fa-spinner fa-pulse"></i> Register User')
                        $('#btnSave').prop('disabled', true)
                    },
                    success: function(result) {
                        console.log(result);
                        $('#btnSave').prop('disabled', false)
                    },
                    error: function(err) {
                        console.log(err);
                        $('#btnSave').prop('disabled', false)
                    }

                });

            });
        })
    </script>
    <style>
        body {
            background-color: rgb(201, 199, 199)
        }

        @media (max-width: 575px) {
            .py-5 {
                padding-top: 150px !important;
            }
        }
    </style>
@endsection
