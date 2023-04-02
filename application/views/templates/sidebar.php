<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?> - Toeic Application</title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/backend/') ?>polsri.png">


    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/backend/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/backend/') ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/backend/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/backend/') ?>sweetalert2/package/dist/sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <style type="text/css">
    .nav-item {
        margin-top: -10px;
        margin-bottom: -10px;
    }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-book"></i>
                </div>
                <div class="sidebar-brand-text mx-3">TOEIC <sup>v1</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <img class="img-profile rounded-circle"
                        src="<?= base_url('assets/backend/') ?>img/undraw_profile.svg">
                    <?php $nama = $this->session->userdata('nama');
                    $user = $this->db->get_where('user', ['username' => $nama])->row_array();
                    $namanya = $user['nama'];
                    $level = $user['level'];
                    $id = $user['id'];
                    ?>
                    <span><?= strtoupper($namanya); ?></span>
                </a>
            </li>

            <li class="nav-item <?php if ($title == 'Dashboard') {
                                    echo "active";
                                } else {
                                    echo "";
                                }; ?>">
                <a class="nav-link" href="<?= base_url('dashboard'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>DASHBOARD</span>
                </a>
            </li>
            <!-- Heading -->
            <div class="sidebar-heading">
                MAIN MENU
            </div>
            <li class="nav-item 
                <?php if ($title == 'Reading') {
                        echo "active";
                    } else if ($title == 'Bank Soal Reading') {
                        echo "active";
                    } else if ($title == 'Bank Soal Listening') {
                        echo "active";
                    } else {
                        echo "";
                    }; 
                ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-warehouse"></i>
                    <span>BANK SOAL</span>
                </a>
                <div id="collapseTwo" class="collapse
                <?php if ($title == 'Bank Soal Reading') {
                        echo "show";
                    } else if ($title == 'Bank Soal Listening') {
                        echo "show";
                    } else {
                        echo "";
                    }; ?>" aria-labelledby="headingTwo"
                    data-parent="#accordionSidebar">

                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">DATABASE SOAL:</h6>
                        <a class="collapse-item <?php if ($title == 'Bank Soal Reading') {
                                                    echo "active";
                                                } else {
                                                    echo "";
                                                }; ?>" href="<?= base_url('reading'); ?>"
                            href="<?= base_url('Dash/Jabatan'); ?>">SOAL READING </a>

                        <a class="collapse-item <?php if ($title == 'Bank Soal Listening') {
                                                    echo "active";
                                                } else {
                                                    echo "";
                                                }; ?>" href="<?= base_url('listening'); ?>">SOAL LISTENING</a>
                    </div>
                </div>

            </li>
            <li class="nav-item
            <?php if ($title == 'Hasil dan Skor') { echo "active"; } else { echo ""; }; ?>">
                <a class="nav-link" href="<?= base_url('score'); ?>">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>HASIL & SKOR TOEIC</span></a>
            </li>
            <li class="nav-item
            <?php if ($title == 'Akun Mahasiswa') { echo "active"; } else { echo ""; }; ?>">
                <a class="nav-link" href="<?= base_url('akun-mahasiswa'); ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>AKUN MAHASISWA</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                SETTINGS
            </div>
            <li class="nav-item
            <?php if ($title == 'Users') { echo "active"; } else { echo ""; }; ?>">
                <a class="nav-link " href="<?= base_url('users'); ?>">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>ADMINISTRATOR</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Search -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="modal"
                                data-target="#M_Change_Pass" id="btn-edit" data-id="<?= $id; ?>">
                                <i class="fas fa-unlock fa-fw"></i>
                            </a>

                            <!-- Dropdown - Alerts -->

                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small"><?= strtoupper($namanya); ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?= base_url('assets/backend/') ?>img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#M_Profile"
                                    id="btn-edit" data-id="<?= $id; ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Profile
                                </a>
                                <a class="dropdown-item" href="<?= base_url('logout') ?>" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->