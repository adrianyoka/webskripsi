<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="card" style="width:100%;">
            <div class="card-body">
                <h2 class="card-title" style="color: black;">Management Presensi</h2>
                <hr>
                <p class="card-text">Halaman ini menampilkan data rekapan presensi</p>
                <div class="dropdown">
                <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                Cetak Presensi
                </button>
                <div class="dropdown-menu">
                    <?php
                        $tingkat = 0;
                        $rombel = '';
                        foreach ($cetak as $k) {
                            if($k['tingkat'] != $tingkat || $k['rombel'] != $rombel){
                    ?>
                        <a class="dropdown-item" href="<?=base_url('admin/cetak_absensi/' . $k['id'])?>">Kelas <?=$k['tingkat']?><?=strtoupper($k['rombel'])?></a>
                        
                        <?php $tingkat = $k['tingkat'];$rombel= $k['rombel']; } else { continue; }} ?>
                </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="bg-white p-4" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px;">
                    <div class="table-responsive">
                        <table id="example" class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr class="text-center">
                                    <th scope="col">NO</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Total Kehadiran</th>
                                    <th scope="col">Detail</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $nomor = 1;    
                                foreach ($absensi as $u) {
                                    ?>
                                    <tr class="text-center">

                                        <th scope="row">
                                            <?php echo $nomor++ ?>
                                        </th>
                                        <td>
                                            <?=nice_date($u['tanggal'],'d/m/Y')?>
                                        </td>
                                        <td>
                                            <?php echo $u['tingkat'] ?><?php echo $u['rombel'] ?>
                                        </td>
                                        <td>
                                            <?php echo $u['total'] ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?php echo site_url('admin/detail_absensi/' . $u['master_id']); ?>" class="btn btn-success">Detail ⭢</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>      
    </section>
</div>
<!-- End Main Content -->

<!-- Start Footer -->
    <footer class="main-footer">
    <div class="text-center">Copyright &copy; 2023 <div class="bullet"></div><a href="">Ilmu Komputer Universitas Lampung</a>
        </div>
    </footer>
<!-- End Footer -->

<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?= base_url('assets/') ?>stisla-assets/js/stisla.js"></script>
<!-- JS Libraies -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });

</script>
<!-- Template JS File -->
<script src="<?= base_url('assets/') ?>stisla-assets/js/scripts.js"></script>
<script src="<?= base_url('assets/') ?>stisla-assets/js/custom.js"></script>
</body>

</html>