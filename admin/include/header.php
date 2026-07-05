<?php
session_start();
include "../connection.php";
$ID = $_SESSION['user_id'];
$qry = "SELECT * FROM `adminregisteer` WHERE id=$ID";
$run = mysqli_query($conn, $qry);
$fetch = mysqli_fetch_array($run);
$username = $fetch['name'];

// Fetch unread enquiries count
$unread_enquiry_qry = "SELECT COUNT(*) as unread_count FROM contact WHERE courses IS NOT NULL AND courses <> '' AND status = 0";
$unread_enquiry_run = mysqli_query($conn, $unread_enquiry_qry);
$unread_enquiry_fetch = mysqli_fetch_assoc($unread_enquiry_run);
$unread_enquiry_count = $unread_enquiry_fetch['unread_count'];

// Fetch unread contact count
$unread_contact_qry = "SELECT COUNT(*) as unread_count FROM contact WHERE subject IS NOT NULL AND subject <> '' AND status = 0";
$unread_contact_run = mysqli_query($conn, $unread_contact_qry);
$unread_contact_fetch = mysqli_fetch_assoc($unread_contact_run);
$unread_contact_count = $unread_contact_fetch['unread_count'];

// Total notifications for top bell
$total_unread_count = $unread_enquiry_count + $unread_contact_count;

?>
<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/amezia/layouts/admin/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2025 06:54:24 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Admin & Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../../t9logo.png">

    <!--Chartist Chart CSS -->
    <link href="assets/libs/chartist/chartist.min.css" rel="stylesheet" type="text/css" />
    <!-- plugin css -->
    <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet"
        type="text/css" />
    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body data-topbar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">


        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="../images/logo.jpeg" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="../images/logo.jpeg" alt="" height="17">
                            </span>
                        </a>

                        <a href="#" class="logo logo-light">
                            <img src="../images/logo.jpeg" alt="" style="max-height: 60px; border-radius: 50%; ">
                            <!-- <span class="logo-sm">
                                <img src="../pscollegelogo.png" alt="" height="22">
                            </span> -->
                            <!-- <span class="logo-lg">
                                <img src="../pscollegelogo.png" alt="" height="17">
                            </span> -->
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>


                </div>





                <!-- Notifications -->
                <div class="dropdown d-inline-block">
                    <a href="index.php" class="btn header-item noti-icon waves-effect" style="position: relative;" title="Notifications Dashboard">
                        <i class="fa-solid fa-bell fs-4 d-inline-block"></i>
                        <?php if ($total_unread_count > 0): ?>
                            <span class="badge bg-danger rounded-pill" style="position: absolute; top: 15px; right: 5px; font-size: 10px;"><?php echo $total_unread_count; ?></span>
                        <?php endif; ?>
                    </a>
                </div>

                <!-- User -->
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect user-step" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-solid fa-user fs-3 d-inline-block"></i>

                        <!-- <img class="rounded-circle header-profile-user" src="assets/images/users/user-1.jpg"
                                alt="Header Avatar"> -->
                        <span class="d-none d-xl-inline-block ms-1"><?php echo $username; ?></span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <form action="" method="post">
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <!-- <a class="dropdown-item" href="#"><i class="dripicons-user d-inline-block text-muted me-2"></i>
                                Profile</a> -->
                            <!-- <a class="dropdown-item" href="#"><i class="dripicons-wallet d-inline-block text-muted me-2"></i> My
                                Wallet</a>
                            <a class="dropdown-item d-block" href="#"><i
                                    class="dripicons-gear d-inline-block text-muted me-2"></i> Settings</a>
                            <a class="dropdown-item" href="#"><i class="dripicons-lock d-inline-block text-muted me-2"></i> Lock
                                screen</a> -->
                            <div class="dropdown"></div>
                            <a class="dropdown-item" href="logout.php" name="logout" type="submit"><i class="dripicons-exit d-inline-block text-muted me-2"></i>
                                Logout</a>
                        </div>
                    </form>

                </div>

                <!-- <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                            <i class="mdi mdi-spin mdi-cog"></i>
                        </button>
                    </div> -->

            </div>
    </div>
    </header>

    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <!-- <li class="menu-title">Main</li> -->

                    <li>
                        <a href="index.php" class="waves-effect">
                            <i class="mdi mdi-speedometer"></i>
                            <!-- <span class="badge rounded-pill bg-danger float-end">9+</span> -->
                            <span>Dashboards</span>
                        </a>
                        
                    </li>
                    <li>
                        <a href="courses.php" class=" waves-effect">
                            <i class="fa-solid fa-book"></i> <span> Courses</span>
                        </a>
                    </li>
                    <li>
                        <a href="university.php" class=" waves-effect">
                            <i class="fa-solid fa-building-columns"></i><span>Universities</span>
                        </a>
                    </li>
                     <li>
                        <a href="admin_notice_list.php" class=" waves-effect">
                            <i class="fa-solid fa-bullhorn"></i> <span>Notice List</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="admin_notice_list.php" class=" waves-effect">
                            <i class="fa-solid fa-comments"></i>
                            <span>Notice List</span>
                        </a>
                    </li> -->

                    <!-- <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-email-variant"></i>
                            <span>Email</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="#">Inbox</a></li>
                            <li><a href="#">Read Email</a></li>
                            <li><a href="#">Compose Email</a></li>
                        </ul>
                    </li> -->

                    <!-- Calender -->
                    <!-- <li>
                        <a href="uploadcampousmomentimage.php" class=" waves-effect">

                            <i class="fa-solid fa-folder-plus"></i>
                            <span>Upload Gallery Image</span>
                        </a>
                    </li>
                    <li>
                        <a href="show_gallery.php" class=" waves-effect">

                            <i class="fa-solid fa-image"></i>
                            <span>Show Gallery Image</span>
                        </a>
                    </li>
                    <li>
                        <a href="add_teacher.php" class=" waves-effect">
                            <i class="fa-solid fa-user-plus"></i>
                            <span>Add faulty</span>
                        </a>
                    </li>
                    <li>
                        <a href="show_faculty.php" class=" waves-effect">
                            <i class="fa-solid fa-user"></i>
                            <span>Show faulty Details</span>
                        </a>
                    </li> -->
                    
                    <!-- <li>
                        <a href="vdo_data.php" class=" waves-effect">
                            <i class="fa-solid fa-video"></i>
                            <span>Gallery Video</span>
                        </a>
                    </li>
                    <li>
                        <a href="activity.php" class=" waves-effect">
                            <i class="fa-solid fa-paperclip"></i>
                            <span> Activities</span>
                        </a>
                    </li> -->                                    
                    <li>
                        <a href="connect.php" class=" waves-effect">
                            <i class="fa-solid fa-user"></i> <span> Contact</span>
                            <?php if ($unread_contact_count > 0): ?>
                            <span class="badge rounded-pill bg-danger float-end"><?php echo $unread_contact_count; ?></span>
                            <?php endif; ?>
                        </a>
                    </li>
                    <li>
                        <a href="enquiry.php" class=" waves-effect">
                            <i class="fa-solid fa-message"></i> <span>Enquiry</span>
                            <?php if ($unread_enquiry_count > 0): ?>
                            <span class="badge rounded-pill bg-danger float-end"><?php echo $unread_enquiry_count; ?></span>
                            <?php endif; ?>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="colleges.php" class=" waves-effect">
                            <i class="fa-solid fa-house"></i> <span>Colleges</span>
                        </a>
                    </li> -->
                     
                    <li>
                        <a href="gallery.php" class=" waves-effect">
                            <i class="fa-solid fa-images"></i> <span> Gallery</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-certificate"></i>

                            <span> Subcourses</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="collegetype.php"> <i class="mdi mdi-circle-small"></i>Add College Type</a></li>
                            <li><a href="subcourse.php"> <i class="mdi mdi-circle-small"></i>Add SubCourse</a></li>
                        </ul>
                    </li> -->
                    <li>
                        <a class="dropdown-item" href="logout.php" name="logout" type="submit"><i class="dripicons-exit d-inline-block text-muted me-2"></i>
                            <span>Logout</span></a>
                    </li>


                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>