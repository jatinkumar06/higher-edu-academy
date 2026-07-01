<?php

include "include/header.php";
?>

        <!-- Left Sidebar End -->

        

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <h1 class="mb-4">WELCOME ADMIN </h1>

                    <?php
                    // Fetch total enquiries
                    $total_enquiry_qry = mysqli_query($conn, "SELECT COUNT(*) as count FROM contact WHERE courses IS NOT NULL AND courses <> ''");
                    $total_enquiry = mysqli_fetch_assoc($total_enquiry_qry)['count'];
                    
                    // Fetch total contacts
                    $total_contact_qry = mysqli_query($conn, "SELECT COUNT(*) as count FROM contact WHERE subject IS NOT NULL AND subject <> ''");
                    $total_contact = mysqli_fetch_assoc($total_contact_qry)['count'];
                    ?>

                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card bg-primary text-white shadow h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="me-3">
                                            <div class="text-white-75 small">Total Enquiries</div>
                                            <div class="text-lg fw-bold fs-2"><?= $total_enquiry ?></div>
                                        </div>
                                        <i class="fa-solid fa-message fa-3x text-white-50"></i>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between border-top-0 bg-primary bg-opacity-75">
                                    <a class="small text-white stretched-link text-decoration-none" href="enquiry.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card bg-danger text-white shadow h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="me-3">
                                            <div class="text-white-75 small">Unread Enquiries</div>
                                            <div class="text-lg fw-bold fs-2"><?= $unread_enquiry_count ?></div>
                                        </div>
                                        <i class="fa-solid fa-bell fa-3x text-white-50"></i>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between border-top-0 bg-danger bg-opacity-75">
                                    <a class="small text-white stretched-link text-decoration-none" href="enquiry.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card bg-success text-white shadow h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="me-3">
                                            <div class="text-white-75 small">Total Contacts</div>
                                            <div class="text-lg fw-bold fs-2"><?= $total_contact ?></div>
                                        </div>
                                        <i class="fa-solid fa-users fa-3x text-white-50"></i>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between border-top-0 bg-success bg-opacity-75">
                                    <a class="small text-white stretched-link text-decoration-none" href="connect.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card bg-warning text-dark shadow h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="me-3">
                                            <div class="text-dark-75 small">Unread Contacts</div>
                                            <div class="text-lg fw-bold fs-2"><?= $unread_contact_count ?></div>
                                        </div>
                                        <i class="fa-solid fa-exclamation-circle fa-3x text-dark-50" style="opacity: 0.5;"></i>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between border-top-0 bg-warning bg-opacity-75">
                                    <a class="small text-dark stretched-link text-decoration-none" href="connect.php">View Details</a>
                                    <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


            <?php
            include "include/footer.php";
            ?>