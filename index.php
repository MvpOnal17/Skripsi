<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistem Informasi Prediksi Menggunakan Algoritma Naive Bayes Pada Kasus Data Numeric">
    <!--favicon-->
    <!-- <link rel="icon" href="assets/images/bys-favicon.png" type="image/png" /> -->
    <!--plugins-->
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script>
    <!-- sweet css -->
    <link rel="stylesheet" href="assets/sweet/sweetalert2.css">
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <link rel="stylesheet" href="loginbaru.css">
    <title>Sistem Informasi - Naive Bayes</title>
</head>

<body class="bg-login">



    <div class="wrapper">
        <div class="title">
            Login Form
        </div>
        <form action="index.php?page=aksi-login" method="POST">
            <div class="field">
                <input type="text" name="username" id="username" class="form-control">
                <label type="text" name="username" id="username" placeholder="Your Username">Username</label>
            </div>
            <div class="field" class="input-group" id="show_hide_password">
                <input type="password" class="form-control border-end-0" id="password" name="password" placeholder="Enter Password"> <a href="javascript:;">
                    <label for="inputChoosePassword"></label>
            </div>
            <div class="field">
                <input type="submit" name="submit" class="btn btn-primary" value="Login">
            </div>

        </form>
    </div>
    <?php
    $page = (isset($_GET['page'])) ? $_GET['page'] : "main";
    switch ($page) {
        case 'aksi-login':
            include "aksi-login/aksi-login.php";
            break;
    }
    ?>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!--Password show & hide js -->
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>

    <!--app JS-->
    <script src="assets/js/app.js"></script>
    <!--sweet alert -->
    <script src="assets/js/sweet/sweetalert2.all.min.js "></script>
</body>

</html>