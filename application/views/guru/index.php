<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?= base_url('assets/') ?>img/favicon.png" type="image/png">
    <!-- Title -->
    <title>Kelas <?php echo $tingkat;echo " ";echo $rombel?> | Teacher Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">    
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/linericon/style.css">    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/lightbox/simpleLightbox.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/animate-css/animate.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/popup/magnific-popup.css">
    <!-- Main css -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/user_style.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/responsive.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.4/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body style="overflow-x:hidden;background-color:#fbf9fa">


    <!-- Start Navigation Bar -->
    <header class="header_area" style="background-color: white !important;">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="<?= base_url('user') ?>"><img src="<?= base_url('assets/') ?>img/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item "><a class="nav-link" href="javascript:void(0)">Hai, <?php
                                                                                                        echo $nama_guru;
                                                                                                        ?></a>
                            </li>
                            <li class="nav-item active"><a class="nav-link" href="<?= base_url('user') ?>">Beranda</a>
                            </li>
                            <li class="nav-item "><a class="nav-link text-danger" href="<?= base_url('welcome/logout') ?>">Log
                                    Out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- End Navigation Bar -->


    <!-- Start Greeting Cards -->
    <div class="container">
        <div class="bg-white mx-auto p-4 buat-text" data-aos="fade-down" data-aos-duration="1400" style="width: 100%; border-radius:10px;">
            <div class="row" style="color: black; font-family: 'poppins';">
                <div class="col-md-12 mt-1">
                    <h1 class="display-4" style="color: black; font-family:'poppins';" data-aos="fade-down" data-aos-duration="1400">SELAMAT DATANG
                    </h1>
                    <hr>

                    <h4 data-aos="fade-down" data-aos-duration="1700"><?php
                                                                        echo $nama_guru;
                                                                        ?> - Teacher</h3>
                    <h5>Wali Kelas <?php
                                             echo $tingkat;
                                             echo " - ";
                                             echo $rombel;
                                             ?></h5>
                    <Button class="btn btn-success m-1" data-toggle="modal" data-target="#AbsenModal">Absensi Hari Ini <i class="ml-2 fas fa-bars"></i></Button>
                    <Button class="btn btn-secondary m-1" data-toggle="modal" data-target="#RekapModal">Rekap Absensi <i class="ml-2 fas fa-bars"></i></Button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Greeting Cards -->


    <!-- Start Lesson Card -->
    <div class="container">
        <div class="row row-cols-md-3 my-3" data-aos-duration="1900" data-aos="fade-right">
            <?php foreach ($mata_pelajaran as $mapel) : ?>
            <div class="col-md-4 p-3">
                <div class="card-kelas w-100">
                    <a href="<?= base_url('guru/materiDashboard/').$kelas_id.'/'.$mapel->id?>">
                        <div>
                            <img src="<?= base_url('assets/') ?>img/<?= $mapel->nama_mapel ?>.png" class="card-img-top" alt="...">
                        </div>
                    </a>
                </div>
            </div>
            <?php endforeach?>
        </div>
    </div>
    <br>

    <!-- Absensi Pop up -->
    <div class="modal fade" id="AbsenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Absensi Siswa <?=mdate(' %d/%m/%Y',now())?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('guru/inputAbsensi/')?>" method="post">
                    <div class="modal-body">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>Nama</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                        $i = 0; 
                                        foreach($absen as $data):
                                    ?>
                                        <tr>
                                            <td>
                                                <?=$data->nama?>
                                                <input type="hidden" name="kelas_id" value="<?=$data->kelas_id?>">
                                                <input type="hidden" name="exist" value="<?=isset($data->absensi_id) ? TRUE : FALSE ?>">
                                                <input type="hidden" name="tanggal" value="<?=mdate('%Y/%m/%d',now())?>">
                                                <input type="hidden" name="Data[<?=$i?>][siswa_id]" value="<?=$data->siswa_id?>">
                                                <?php if(isset($data->absensi_id)){ ?> 
                                                    <input type="hidden" name="Data[<?=$i?>][absensi_id]" value="<?=$data->absensi_id?>">
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <select class="w-75" name="Data[<?=$i?>][keterangan]">
                                                    <option value="-" <?=!isset($data->keterangan)? '' : ($data->keterangan == '-' ? 'selected': '' )  ?> >-</option>
                                                    <option value="Hadir" <?=!isset($data->keterangan)? '' : ($data->keterangan == 'Hadir' ? 'selected': '' )  ?> >Hadir</option>
                                                    <option value="Izin" <?=!isset($data->keterangan)? '' : ($data->keterangan == 'Izin' ? 'selected': '' )  ?> >Izin</option>
                                                    <option value="Sakit" <?=!isset($data->keterangan)? '' : ($data->keterangan == 'Sakit' ? 'selected': '' )  ?> >Sakit</option>
                                                </select>
                                            </td>
                                        </tr>
                                    <?php
                                        $i++; 
                                        endforeach;
                                    ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
                                    
    <!-- Rekap Pop UP -->
    <div class="modal fade" id="RekapModal" tabindex="-1" role="dialog" aria-labelledby="RekapModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="RekapModalTitleLabel">Rekap Absensi <?=mdate(' Bulan %m Tahun %Y',now())?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <?php if(isset($rekap_absensi)) { ?>
                            <ul class="list-group">
                                <?php foreach($rekap_absensi as $rekap) : ?>
                                    <li class="list-group-item list-group-item-action">
                                        <button style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;" data-toggle="modal" data-target="#Rekap-<?=$rekap['id']?>" data-dismiss="modal"> <i class="fas fa-chevron-right mr-3"></i> Absensi Tanggal <?=nice_date($rekap['tanggal'],'d/m/Y')?></button>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php } else { ?>
                            <ul class="list-group">
                                    <li class="list-group-item text-center text-secondary font-weight-bold">Belum Ada Absensi</li>
                            </ul>
                        <?php } ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"></i>Close</button>
                        <!-- <button type="button" class="btn btn-secondary" data-toggle="modal" data-dismiss="modal" data-target="#RekapModal"><i class="fas fa-chevron-left mr-3"></i>Kembali</button> -->
                        <!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
                    </div>
            </div>
        </div>
    </div>

<!-- rekap harian popup -->
    <?php foreach($rekap_absensi as $rekap):?>
        <div class="modal fade" id="Rekap-<?=$rekap['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Absensi Tanggal <?=nice_date($rekap['tanggal'],'d/m/Y')?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Nama</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                        foreach($rekap['data'] as $data):
                                    ?>
                                        <tr>
                                            <td>
                                                <?=$data['nama']?>
                                            </td>
                                            <td>
                                                <?=$data['keterangan']?>
                                            </td>
                                        </tr>
                                    <?php
                                        $i++; 
                                        endforeach;
                                    ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-dismiss="modal" data-target="#RekapModal"><i class="fas fa-chevron-left mr-3"></i>Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach?>
    
    

    <!-- Start Animate On Scroll -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <!-- End Animate On Scroll -->