<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/plugins/images/favicon.png">
    <title>Aplikasi Penglolaan Laundry</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="../assets/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="../assets/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="../assets/plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css"
        rel="stylesheet">
    <!-- animation CSS -->
    <link href="../assets/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="../assets/css/colors/default.css" id="theme" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="../assets/DataTables/datatables.min.css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style>
    /* Main Background */
    body,
    #page-wrapper {
        background: #415a77 !important;
    }

    .container-fluid {
        background: #415a77 !important;
    }

    /* Navbar & Header */
    .navbar {
        background-color: #0d1b2a !important;
    }

    .navbar-header {
        background-color: #0d1b2a !important;
    }

    .logo b,
    .logo span {
        color: #e0e1dd !important;
    }

    /* Profile section */
    .profile-pic b {
        color: #e0e1dd !important;
    }

    .nav.navbar-top-links>li>a {
        color: #e0e1dd !important;
    }

    /* Sidebar */
    .sidebar {
        background-color: #0d1b2a !important;
    }

    .sidebar-nav {
        background-color: #1b263b !important;
    }

    .sidebar .nav-second-level li a,
    .sidebar .nav>li>a {
        color: #e0e1dd !important;
    }

    .sidebar-head h3 span {
        color: #e0e1dd !important;
    }

    /* Dashboard title */
    .bg-title {
        background: #1b263b !important;
        border-bottom: 1px solid #778da9;
    }

    .page-title-header {
        color: #e0e1dd !important;
    }

    tr {
        color: #e0e1dd;
    }

    /* Cards/Boxes */
    .white-box {
        background: #1b263b;
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        padding: 25px;
        color: #e0e1dd;
    }

    .analytics-info {
        transition: all 0.3s ease;
    }

    .analytics-info:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
    }

    .box-title {
        color: #e0e1dd;
        font-weight: 600;
    }

    /* Table styling */
    .table {
        background: #778da9;
        border-radius: 8px;
        color: #e0e1dd;
    }

    .table thead th {
        background: #415a77;
        color: #e0e1dd;
        border-bottom: 2px solid #1b263b;
    }

    .table tbody tr:hover {
        background-color: #415a77;
    }

    /* Button */
    .btn-success {
        background: #1b263b;
        border: none;
        border-radius: 4px;
        color: #e0e1dd;
    }

    .btn-success:hover {
        background: #0d1b2a;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    /* Text colors */
    .text-success,
    .text-purple,
    .text-info {
        color: #e0e1dd !important;
    }

    .top-left-part {
        background-color: #0d1b2a !important;
    }

    a,
    .page-title {
        color: #e0e1dd !important;
    }
    </style>
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <?php if($title=='dashboard'){?>
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <?php }?>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="index.php">
                        <!-- Logo icon image, you can use font-icon also -->
                        <b style="color:black">
                            LAUNDRY
                        </b>
                        <!-- Logo text image you can use text also -->
                        <span class="hidden-xs text-dark">
                            DOYDEV
                        </span>
                    </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="profile-pic" href="#"> <img src="../assets/plugins/images/users/varun.jpg"
                                alt="user-img" width="36" class="img-circle"><b
                                class="hidden-xs"><?php echo $_SESSION['nama_user']?></b></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span
                            class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="transaksi.php" class="waves-effect"><i class="fa fa-shopping-cart fa-fw"
                                aria-hidden="true"></i> Transaksi</a>
                    </li>
                    <li>
                        <a href="pelanggan.php" class="waves-effect <?php if($title=='pelanggan'){echo 'active';}?>"><i
                                class="fa fa-users fa-fw" aria-hidden="true"></i> Pelanggan</a>
                    </li>
                    <li>
                        <a href="laporan.php" class="waves-effect <?php if($title=='laporan'){echo 'active';}?>"><i
                                class="fa fa-file-text fa-fw" aria-hidden="true"></i> Laporan</a>
                    </li>
                </ul>
                <div class="center p-20">
                    <a href="logout.php" class="btn btn-danger btn-block waves-effect waves-light">Logout</a>
                </div>
            </div>

        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">