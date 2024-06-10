<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Absensi Kelas <?=$kelas->tingkat?><?=strtoupper($kelas->rombel)?></title>
    <link rel="icon" href="<?= base_url('assets/') ?>img/favicon.png" type="image/png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/responsive.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>stisla-assets/css/components.css">

    <style>
        @media print {
        .cetak {
            display: none;
        }
        }
  </style>
</head>

<body class="text-dark">
    <div class="w-100 my-3">
        <div class="container w-75">
            <div class="d-flex justify-content-between mx-3">
                <a class="btn btn-success mb-3 cetak" href="<?= site_url('admin/data_absensi')?>"> <i class="fas fa-chevron-left"></i> Kembali</a>
                <button class="btn btn-success mb-3 cetak" onclick='cetak()'>Cetak<i class="fas fa-download"></i></button>
            </div>
            <div class="header container-fluid">
                <div class="d-flex justify-content-between">
                    <div>
                        <div style="font-size: 30px;font-weight:900;font-family: 'Poppins', sans-serif;" class="text-success text-center">PEDAGOGI</div>
                    </div> 
                    <p class="text-center m-0 fw-normal" style="font-size:24px">Rekap Presensi</p>
                </div>
                <hr class="border-top border-bottom border-dark my-2" style="height:3px">
            </div>
            <div class="body container-fluid">
                <p class="text-center m-0 fw-normal" style="font-size:24px">Kelas <?=$kelas->tingkat?><?=strtoupper($kelas->rombel)?></p>
                <table class="table table-bordered mt-3">
                    <thead class="text-center">
                        <tr>
                            <th scope="col" rowspan=2 class="align-middle">No.</th>
                            <th scope="col" rowspan=2 class="w-50 align-middle">Nama</th>
                            <th scope="col" colspan=4 class="w-25 align-middle">Total Kehadiran</th>
                        </tr>
                        <tr>
                            <th style="width:12.5%">Hadir</th>
                            <th style="width:12.5%">Izin</th>
                            <th style="width:12.5%">Sakit</th>
                            <th style="width:12.5%">T. Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $nomor = 1;
                            if(isset($absensi)){
                                foreach ($absensi as $nisn => $data) { 
                            ?>
                                    <tr>
                                        <th scope="row"><?=$nomor++?></th>
                                        <td><?=$data['nama']?></td>
                                        <td><?=$data['hadir']?></td>
                                        <td><?=$data['izin']?></td>
                                        <td><?=$data['sakit']?></td>
                                        <td><?=$data['tKeterangan']?></td>
                                    </tr>
                        <?php   }
                            } else { 
                        ?>
                                    <th colspan="6" class="text-center text-secondary"><h3>Belum Ada Data Presensi</h3></th>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<script>
    function cetak(){
        window.print();
    }
</script>
</body>
</html>