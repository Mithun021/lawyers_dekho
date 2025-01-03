<?php
    use App\Models\UserModel;
use App\Models\UsersModel;

    // Instantiate the model
    $userModel = new UsersModel();

    $sessionData = session()->get('loggedUserData');
    if ($sessionData) {
        $LoggedUserName = $sessionData['loggeduserFirstName'];
        $loggeduserPhone = $sessionData['loggeduserPhone'];
        $loggeduseremail = $sessionData['loggeduseremail'];
        $loggeduserId = $sessionData['loggeduserId'];
    }

    $user_data = $userModel->find($loggeduserId);

?> 

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Kanooni Sahayata - <?= $title ?> </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="#" name="description" />
        <meta content="Dcode Materials" name="author" />
        <meta content="Dcode Materials" name="developer" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url() ?>public/assets/images/<?= $user_data['web_logo'] ?>">

        <!-- App css -->
        <link href="<?= base_url() ?>public/admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>public/admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>public/admin/assets/css/theme1.min.css" rel="stylesheet" type="text/css" />

        <!-- Plugins css -->
        <link href="<?= base_url() ?>public/admin/plugins/quill/quill.core.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>public/admin/plugins/quill/quill.bubble.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>public/admin/plugins/quill/quill.snow.css" rel="stylesheet" type="text/css" />

        <!-- Plugins css -->
        <link href="<?= base_url() ?>public/admin/plugins/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>public/admin/plugins/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>public/admin/plugins/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>public/admin/plugins/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" />
        <style>
            .error{
                color: red;
                font-weight: 400;
            }
            .cke_notification_warning{
                display: none;
            }
        </style>
    </head>

    <body>
        <span class="d-done" id="base_url"><?= base_url() ?></span>
        <!-- Begin page -->
        <div id="layout-wrapper">
            <div class="header-border"></div>
            <header id="page-topbar">
                <div class="navbar-header">

                    <div class="d-flex align-items-left">
                        <button type="button" class="btn btn-sm mr-2 d-lg-none px-3 font-size-16 header-item waves-effect"
                            id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        
                    </div>

                    <div class="d-flex align-items-center">
                        <div class="dropdown d-inline-block ml-2">
                            <button type="button" class="btn header-item waves-effect"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="<?= base_url() ?>public/assets/images/<?= $user_data['web_logo'] ?>"
                                    alt="Header Avatar">
                                <span class="d-none d-sm-inline-block ml-1"><?php if ($sessionData) { echo $LoggedUserName; }  ?></span>
                                <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="javascript:void(0)">
                                    <span>Profile</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="<?= base_url() ?>admin/logout">
                                    <span>Log Out</span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <div class="navbar-brand-box">
                        <a href="<?= base_url() ?>admin/" class="logo">
                            <img src="<?= base_url() ?>public/assets/images/<?= $user_data['web_logo'] ?>" alt="" height="40" width="auto">
                                <!-- <span>
                                    TANA BHAGAT CLG
                                </span> -->
                        </a>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>
                            <li>
                                <a href="<?= base_url() ?>admin/" class="waves-effect"><i class="mdi mdi-home-analytics"></i><span>Dashboard</span></a>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                                        class="mdi mdi-table-merge-cells"></i><span>Jobs</span></a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?= base_url() ?>admin/jobs">Create New Jobs</a></li>
                                    <li><a href="<?= base_url() ?>admin/job-category">Jobs Category</a></li>
                                    <li><a href="<?= base_url() ?>admin/job-sub-category">JobsSub Category</a></li>
                                    <li><a href="<?= base_url() ?>admin/applied_jobs">Applied Jobs Candidate</a></li>
                                </ul>
                            </li>
                            
                            <li>
                                <a href="<?= base_url() ?>admin/create_page" class="waves-effect"><i class="mdi mdi-table-merge-cells"></i><span>Page Create</span></a>
                            </li>

                            <li>
                                <a href="<?= base_url() ?>admin/logout" class="waves-effect"><i class="mdi mdi-table-merge-cells"></i><span>Logout</span></a>
                            </li>
                            <!-- <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                                        class="mdi mdi-table-merge-cells"></i><span>Tables</span></a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="tables-basic.html">Basic Tables</a></li>
                                    <li><a href="tables-datatables.html">Data Tables</a></li>
                                </ul>
                            </li> -->

                            

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Kanooni Sahayata</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active"><?= $title ?></li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

