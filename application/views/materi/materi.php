<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?= base_url('assets/') ?>img/favicon.png" type="image/png">
    <title><?=$topik[0]->materi[0]->nama_mapel?> | Kelas <?=$user['tingkat'].$user['rombel']?>  - SmartLearn</title>
    <!-- Bootstrap CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/linericon/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/lightbox/simpleLightbox.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/animate-css/animate.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/popup/magnific-popup.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/materi_style.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/responsive.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.4/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</head>

<body style="overflow-x:hidden;background-color:#fbf9fa;">


    <!-- Start Navigation Bar -->
    <header class="header_area" style="background-color: white !important;">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="<?= base_url('welcome') ?>"><img src="<?= base_url('assets/') ?>img/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item "><a class="nav-link" href="javascript:void(0)">Hai, <?php
                                                                                                        echo $user['nama'];
                                                                                                        ?></a>
                            </li>
                            <li class="nav-item active"><a class="nav-link" href="<?= base_url('user') ?>">Beranda</a>
                            </li>
                            <li class=" nav-item "><a class=" nav-link text-danger" href="<?= base_url('welcome/logout') ?>">Log Out</a>
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
                <div class="col-md-12 mt-1 text-center">
                    <h1 class="display-6" data-aos="fade-down" data-aos-duration="1400">Silahkan pilih materi yang akan
                        kamu pelajari !
                    </h1>
                    <h4 data-aos="fade-down" data-aos-duration="1700"><?php
                                                                        echo $user['nama'];
                                                                        ?> - SmartLearn Students</h4>
                    <hr width="80%">
                    <p data-aos="fade-down" class="font-weight-bold" data-aos-duration="1800">
                        <?=$topik[0]->materi[0]->nama_mapel?> - Kelas <?php echo $user['tingkat'].$user['rombel']?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Greeting Cards -->


    <!-- Start Lesson Cards -->

    <div class="container">
        <div class="accordion mt-4" id="BabAccordion" data-aos="fade-down" data-aos-duration="1200">
            <?php foreach ($topik as $bab) { ?>
                <div class="card w-100">
                    <div class="card-header" id="<?='heading-topik-'.$bab->id?>">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed text-decoration-none text-dark font-weight-bold" type="button" data-toggle="collapse" data-target="#topik-<?=$bab->id?>" aria-expanded="true" aria-controls="topik-<?=$bab->id?>">
                            <?=$bab->judul_bab?>
                            </button>
                        </h2>
                    </div>
                    <div id="topik-<?=$bab->id?>" class="collapse" aria-labelledby="<?='heading-topik-'.$bab->id?>" data-parent="#BabAccordion">
                        <div class="card-body">
                            <ul class="list-group ml-5">
                                <?php foreach($bab->materi as $materi) : 
                                    // var_dump($materi->attachment);
                                    $extensi = $materi->attachment != "" ? explode(".",$materi->attachment): ['kosong','kosong'];
                                    $ext = $extensi[1] ?>
                                    <li class="list-group-item">
                                        <a href="<?= base_url('materi/belajar/').$materi->id ?>" class="card-link"> <i class=" text-dark fa fa-file-<?=$ext=='mp4'?'video':($ext=='doc'?'word':($ext=='ppt'?'powerpoint':($ext=='pdf'?'pdf':'text')))?>-o mr-2"> </i> <?=$materi->judul?> </a>
                                    </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    

    <!-- <div class="container">
        <div class="mt-4 w-100">
                <div class="col-md-12 mb-4" data-aos="fade-down" data-aos-duration="1200">
                    <div class="topik">
                        <div class="card-header">
                            <h3><?= $bab->judul_bab ?></h3>
                        </div>
                        <div class="card-body p-3">
                            <p class="ml-3 card-text">
                                <?= substr($bab->deskripsi, 0, 75); ?>&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.
                            </p>
                        </div>
                    </div>
                </div>
                
        </div>
    </div> -->
    <!-- End Lesson Cards -->


    <br>


    <!-- Start Animate On Scroll -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <!-- End Animate On Scroll -->