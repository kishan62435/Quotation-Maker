<?php
session_start();
if(@$_SESSION['uname']){
    header('Location:home.php');
}

require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" >
        <link href="style.css" rel="stylesheet" >
        <link href="signin.css" rel="stylesheet">
        
    </head>
    <body >


    <!--Login Modal -->
    <!-- <div class="modal fade" id="logInModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Please sign in</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="loginform" method="post" class="text-center">
                    <div class="modal-body">
                    <div id="errorMessageLog" class="alert alert-warning d-none mb-2 py-2"></div>
                        <div class= "form-signin w-100 m-auto">
                            <div class="form-floating mb-3">
                                <input required  type="text" class="form-control" id="uname" name="uname" placeholder="admin/operator">
                                <label for="uname">User Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input required type="password" class="form-control" id="pass" name="pass" placeholder="password">
                                <label for="pass">Password</label>
                            </div>
                            <button class="w-100 btn btn-lg btn-primary" type="submit">Log in </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> -->
    <!--Login Modal closed-->


    <nav class="navbar" style ="background-color: #712cf9;" >

        <div class="container-fluid" style="padding">
            <span style="color:white;" class="navbar-brand mb-3 h1">Quotation Maker</span>
            <!-- <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#logInModal">Log in</button> -->
        </div>
    </nav>

    <main class= "form-signin w-100 m-auto mt-5">
        <form id="loginform" method="post" class="mt-5">
            <h1 class="mb-3">Please sign in</h1>
            <div id="errorMessageLog" class="alert alert-warning d-none mb-2 py-2"></div>
            <div class="form-floating mb-3">
                <input required  type="text" class="form-control" id="uname" name="uname" placeholder="admin/operator">
                <label for="uname">User Name</label>
            </div>
            <div class="form-floating mb-3">
                <input required type="password" class="form-control" id="pass" name="pass" placeholder="password">
                <label for="pass">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Log in </button>
        </form>
    </main>


    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#logInModal">
    Launch demo modal
    </button> -->

        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

        <script>
            $(document).on('submit', '#loginform', function (e) {
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    url: "login.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        if(res.status == 100){
                            $('#errorMessageLog').removeClass('d-none');
                            $('#errorMessageLog').text(res.message);
                        }
                        else if(res.status == 200){
                            $('#errorMessageLog').addClass('d-none');
                            $('#loginform')[0].reset();
                            location.href = 'home.php';

                        }
                    }
                });
            });
        </script>
    </body>
</html>