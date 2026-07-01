<?php
session_start();
ob_start(); // Prevent header already sent error

include "../connection.php";
?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login | P.S. Degree COllege - Admin & Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../t9logo.png">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body class="auth-body-bg">

    <div class="container-fluid">
        <!-- Log In page -->
        <div class="row">
            <div class="col-lg-3 pe-0">
                <div class="card mb-0 shadow-none">
                    <div class="card-body">

                        <h3 class="text-center m-0">
                            <a href="index.html" class="logo logo-admin"><img src="../images/logo.jpeg"
                                    alt="logo" class="my-3" style="max-height: 80px;"></a>
                        </h3>

                        <div class="px-2 mt-2">
                            <h4 class="font-size-18 mb-2 text-center">Welcome Back !</h4>
                            <!-- <p class="text-muted text-center">Sign in to continue to Amezia.</p> -->

                            <form class="form-horizontal my-4" action="" method="post">

                                <div class="mb-3">
                                    <label class="form-label" for="username">Username</label>
                                    <div class="input-group">

                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="far fa-user"></i></span>

                                        <input type="text" class="form-control" id="username" name="username"
                                            placeholder="Enter username" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="userpassword">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon2"><i
                                                class="fa fa-key"></i></span>
                                        <input type="password" class="form-control" id="userpassword" name="password"
                                            placeholder="Enter password" required>
                                    </div>
                                </div>

                                <div class="mb-3 row mt-4">
                                    <div class="col-sm-6">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customControlInline" required>
                                            <label class="form-check-label" for="customControlInline">Remember
                                                me</label>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <!-- <div class="col-sm-6 text-end">
                                        <a href="auth-recoverpw.html" class="text-muted font-size-13"><i
                                                class="mdi mdi-lock"></i> Forgot your password?</a>
                                    </div> -->
                                    <!-- end col -->
                                </div>
                                <!-- end row -->

                                <div class="mb-3 mb-0 row">
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-primary w-100 waves-effect waves-light " type="submit" name="save">Login</button>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->
                            </form>
                            <!-- end form -->
                        </div>
                        <div class="m-2 text-center bg-light p-4 text-primary">
                            <!-- <h4 class="">Don't have an account ? </h4> -->
                            <!-- <p class="font-size-13">Join <span>Amezia</span> Now</p> -->
                            <!-- <a href="register.php" class="btn btn-primary waves-effect waves-light">
                                Register</a> -->
                            <a href="../index.php" class="btn btn-primary waves-effect waves-light">
                                Back to Home</a>
                        </div>
                        <div class="mt-4 text-center">
                            <!-- <p class="mb-0">©
                                <script>document.write(new Date().getFullYear())</script> P.S.D.C. Crafted with <i
                                    class="mdi mdi-heart text-danger"></i>
                                by Cloudedge.
                            </p> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->

            <div class="col-lg-9 p-0 vh-100  d-flex justify-content-center">
                <div class="accountbg d-flex align-items-center">
                    <div class="account-title text-center text-white">
                        <h4 class="mt-3 text-white">Welcome To <span class="text-warning">Higher Education Academy</span> </h4>
                        <h1 class="text-white">Let's Get Started</h1>
                        <p class="mt-3 font-size-14">"Authorized personnel only. Please sign in."</p>
                        <div class="border w-25 mx-auto border-warning"></div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- End Log In page -->
    </div>



    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <script src="assets/js/app.js"></script>

</body>


<!-- Mirrored from themesbrand.com/amezia/layouts/admin/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2025 06:56:17 GMT -->

</html>
<?php
if (isset($_POST['save'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $qry = "SELECT * FROM `adminregisteer` WHERE `email`='$username' AND `password`='$password'";
    $run = mysqli_query($conn, $qry);

    if (mysqli_num_rows($run) > 0) {
        $data = mysqli_fetch_array($run);
        $_SESSION['user_id'] = $data['id'];
        echo "<script>alert('Login Successful!');window.location.href='index.php';</script>";
        exit;
    } else {
        echo "<script>alert('User not found');</script>";
    }
}

ob_end_flush();
?>