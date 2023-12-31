<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin Dashboard - PEDAGOGI</title>
    <!-- General CSS Files -->
    <link rel="icon" href="<?= base_url('assets/') ?>img/favicon.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>stisla-assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/selectric.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>stisla-assets/css/components.css">
    <script src="<?= base_url('assets/') ?>js/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.4/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/selectric@1.13.0/public/selectric.min.css"> -->
</head>

<body>

<!-- Start Sidebar -->
<div id="app">
<div class="main-wrapper">
    <div class="navbar-bg"></div>
    <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
            <ul class=" navbar-nav mr-3">
                <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </form>
        <ul class="navbar-nav navbar-right">
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <img alt="image" style="margin-bottom:4px !important;" src="<?= base_url('assets/') ?>stisla-assets/img/avatar/avatar-2.png" class="rounded-circle mr-1 my-auto border-white">
                    <div class="d-sm-none d-lg-inline-block" style="font-size:15px;">Hello, <?php
                                                                                            echo $user['username']
                                                                                            ?></div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-title">Admin - Pedagogi</div>
                    <a href="<?= base_url('welcome/logout') ?>" class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <div class="main-sidebar">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand text-danger">
                <div>
                    <a href="<?= base_url('admin') ?>" style="font-size: 30px;font-weight:900;font-family: 'Poppins', sans-serif;" class="text-success text-center"><i style="font-size: 30px;" class="fas fa-book-open mr-2"> </i>PEDAGOGI</a>
                </div>  
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <a href="<?= base_url('admin') ?>">PD</a>
            </div>
            <ul class="sidebar-menu">

                <li class="menu-header">Dashboard</li>
                <li class="nav-item dropdown <?= $page == 'dashboard'?'active':''?> ">
                    <a href="<?= base_url('admin') ?>" class="nav-link"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
                </li>
                <li class="menu-header">Management User</li>
                <li class="nav-item dropdown <?= $page == 'guru'?'active':''?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-chalkboard-teacher"></i>
                    <span>Guru</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= base_url('admin/data_guru') ?>">Data Guru</a>
                    </li>
                    <li><a class="nav-link" href="<?= base_url('admin/add_guru') ?>">Tambah Data Guru</a>
                    </li>
                </ul>
                </li>
                <li class="nav-item dropdown <?= $page == 'siswa'?'active':''?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i>
                        <span>Siswa</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="<?= base_url('admin/data_siswa') ?>">Data Siswa</a>
                        </li>
                        <li><a class="nav-link" href="<?= base_url('user/registration') ?>">Tambah Data Siswa</a>
                        </li>
                    </ul>
                <li class="nav-item dropdown <?= $page == 'absensi'?'active':''?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-clipboard-list"></i>
                        <span>Absensi</span></a>
                        <ul class="dropdown-menu">
                        <li><a class="nav-link" href="<?= base_url('admin/data_absensi') ?>">Data Absensi</a>
                        </li>
                    </ul>
                </li>    
                </li>
                <li class="menu-header">Management Kelas</li>
                <li class="nav-item dropdown <?= $page == 'kelas'?'active':''?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-building"></i>
                        <span>Kelas</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="<?= base_url('admin/data_kelas') ?>">Data Kelas</a>
                        </li>
                        <li><a class="nav-link" href="<?= base_url('admin/tambah_kelas') ?>">Tambah Kelas</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown <?= $page == 'mapel'?'active':''?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book"></i>
                        <span>Mata Pelajaran</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="<?= base_url('admin/data_mapel') ?>">Data Mata Pelajaran</a>
                        </li>
                        <li><a class="nav-link" href="<?= base_url('admin/tambah_mapel') ?>">Tambah Mata Pelajaran</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown <?= $page == 'materi'?'active':''?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-tasks"></i>
                        <span>Materi</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="<?= base_url('admin/data_bab') ?>">Data Materi</a>
                        </li>
                        <li><a class="nav-link" href="<?= base_url('admin/tambah_materi') ?>">Tambah materi</a>
                        </li>
                    </ul>
                </li>
        </aside>
    </div>
<!-- End Sidebar -->