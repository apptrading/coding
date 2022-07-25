@extends('Layout.layout_back_end')
@section('title', 'DANIKA | User')
@section('contents')
    <div class="container py-3">
        @include('App.SettingBackEnd.Users.table')
    </div>

    @include('App.SettingBackEnd.Users.add')

    @include('App.SettingBackEnd.Users.edit')

    <script>
        function _edit(id) {
            // alert(id)
            $('#modal_edit').modal('show')
            $.ajax({
                url: "/app/user/edit/" + id,
                method: 'GET',
                processData: false,
                dataType: 'json',
                contentType: false,
                cashe: false,
                beforeSend: function() {
                    $('#statusLoading').html(' (ກຳລັງໂຫຼດ...)')
                },
                success: function(result) {
                    var response = result.datas;
                    // console.log(result.datas);
                    // console.log(response.email);
                    $('#statusLoading').html('')

                    $('#userid').val(response.userid)
                    $('#email_edit').val(response.email);
                    $('#password_edit').val();
                    $('#userright_edit').val(response.userright);
                    $('#name_edit').val(response.name);
                    $('#fullname_edit').val(response.fullname);
                    $('#bightday_edit').val(response.bightday);
                    $('#ages_edit').val(response.ages);
                    $('#tell_edit').val(response.tell);
                    $('#gender_edit').val(response.gender);

                    if (response.gender == 2) {
                        $('#inlineRadio2_edit').prop('checked', true);
                    } else {
                        $('#inlineRadio1_edit').prop('checked', true);
                    }
                    // $('#picture_edit').val();
                    // $('#documents_edit').val();

                },
                error: function(err) {
                    console.log(err);
                }
            })
        }

        function _delete(id) {
            Swal.fire({
                title: 'ທ່ານຕ້ອງການລົບແທ້ແມ່ນບໍ?',
                text: "ຫາກທ່ານລົມຂໍ້ມູນນີ້ອອກທ່ານຈະບໍ່ສາມາດກູ້ຄືນໃດ້ອິກ!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'ຢືນຢັນການລົບ',
                cancelButtonText: 'ອອກ'
            }).then((result) => {
                if (result.isConfirmed) {


                    $.ajax({
                        url: "/app/user/delete/" + id,
                        method: 'GET',
                        processData: false,
                        dataType: 'json',
                        contentType: false,
                        cashe: false,
                        // beforeSend: function() {
                        //     $('#statusLoading').html(' (ກຳລັງໂຫຼດ...)')
                        // },
                        success: function(result) {

                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal
                                        .resumeTimer)
                                }
                            })

                            Toast.fire({
                                icon: 'success',
                                title: 'successfully'
                            })


                            let numb = 1;
                            $('#table-user').DataTable({
                                destroy: true,
                                data: result.datas,
                                columns: [{
                                        data: "id",
                                        createdCell: function(td, cellData, rowData, row,
                                            col) {
                                            $(td).addClass('text-center');
                                        },
                                        render: function(data, type, row) {
                                            return numb++
                                        }
                                    },
                                    {
                                        data: "picture",
                                        render: function(data, type, row) {
                                            var picture = "";
                                            if (data == "na") {
                                                picture =
                                                    "<img src=\"{{ asset('assets/img/iconweb/icon.png') }}\" width=\"80\" height=\"80\" alt=\"puser\">";
                                            } else {
                                                picture =
                                                    "<img src=\"" + data +
                                                    "\" width=\"80\" height=\"80\" alt=\"puser\"> ";
                                            }

                                            return picture;
                                        }
                                    },
                                    {
                                        data: "fullname"
                                    },
                                    {
                                        data: "email"
                                    },
                                    {
                                        data: "tell",
                                    },
                                    {
                                        data: "bightday",
                                    },
                                    {
                                        data: "ages",
                                    },
                                    {
                                        data: "gender",
                                        render: function(data, type, row) {
                                            var gender = "";
                                            if (data == 2) {
                                                gender = "ຊາຍ";
                                            } else {
                                                gender = "ຍີງ";
                                            }

                                            return gender;
                                        }
                                    },
                                    {
                                        data: "documents",
                                        createdCell: function(td, cellData, rowData, row,
                                            col) {
                                            $(td).addClass('text-center');
                                        },
                                        render: function(data, type, row) {
                                            var documents = "";
                                            if (data == "") {
                                                documents =
                                                    "<a href=\"#\" class=\"btn btn-primary btn-sm\"><i class=\"fas fa-cloud-download-alt\"></i></a>";
                                            } else {
                                                documents =
                                                    "<a href=\"" + data +
                                                    "\" target=\"_blank\" class=\"btn btn-primary btn-sm\"><i class=\"fas fa-cloud-download-alt\"></i></a>";
                                            }

                                            return documents;
                                        }
                                    },
                                    {
                                        data: "id",
                                        createdCell: function(td, cellData, rowData, row,
                                            col) {
                                            $(td).addClass('text-center');
                                        },
                                        render: function(data, type, row) {
                                            var letReturn = "";
                                            letReturn +=
                                                "<div class=\"btn-group btn-group-sm\" role=\"group\">";
                                            letReturn +=
                                                "<button type=\"button\" data-bs-toggle=\"modal\" data-bs-target=\"#model_edit\" onclick=\"_edit(" +
                                                row.userid +
                                                ")\"  class=\"btn btn-warning btnEdit\" data-id=\"" +
                                                row.id +
                                                " \" id=\"btnEdit\"><i class=\"fas fa-edit\"></i></button>";
                                            letReturn +=
                                                "<button type=\"button\"  class=\"btn btn-danger btnDelete\" data-id=\"" +
                                                row.id +
                                                "\" onclick=\"_delete(" +
                                                row.userid +
                                                ")\" id=\"btnEdit\"><i class=\"fas fa-trash\"></i></button>";

                                            letReturn += "</div>";

                                            return letReturn;
                                        }
                                        // createdCell: function(td, cellData, rowData, row, col) {
                                        //     $(td).addClass('text-center');
                                        // }
                                    }
                                ]
                            });

                        },
                        error: function(err) {
                            console.log(err);
                        }
                    })

                }
            })
        }

        function ageCalculator(bightday, locations) {
            // var userinput = document.getElementById("bightday").value;
            var userinput = bightday;

            var dob = new Date(userinput);
            if (userinput == null || userinput == '') {
                document.getElementById("message").innerHTML = "**Choose a date please!";
                return false;
            } else {

                //calculate month difference from current date in time  
                var month_diff = Date.now() - dob.getTime();

                //convert the calculated difference in date format  
                var age_dt = new Date(month_diff);

                //extract year from date      
                var year = age_dt.getUTCFullYear();

                //now calculate the age of the user  
                var age = Math.abs(year - 1970);

                //display the calculated age  
                // return document.getElementById("result").innerHTML =
                // "Age is: " + age + " years. ";
                if (locations == 'add') {
                    return $('#ages').val(age);
                } else {
                    return $('#ages_edit').val(age);
                }

            }
        }
    </script>
@endsection
