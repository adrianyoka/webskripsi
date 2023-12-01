<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="card" style="width:100%;">
            <div class="card-body">
                <h2 class="card-title" style="color: black;">Management absensi</h2>
                <hr>
                <p class="card-text">Halaman ini menampilkan data rekapan absensi</p>
                <button  class="btn btn-success" data-toggle="modal" data-target="#RekapModal">cetak absensi</button>
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
                        <?php if(count($absensi)>0) { ?>
                            <ul class="list-group">
                            <?php 
                                $tmp_id = 0;
                                foreach($kelas as $kls) : 
                                    if($kls['id'] !== $tmp_id){?>
                                    <li class="list-group-item list-group-item-action">
                                        <button style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;" data-toggle="modal" data-target="#Rekap-<?=$kls['id']?>" data-dismiss="modal"> <i class="fas fa-chevron-right mr-3"></i> Absensi Kelas <?=$kls['tingkat']?><?=$kls['rombel']?></button>
                                    </li>
                            <?php 
                                $tmp_id = $kls['id'];
                                }
                            endforeach; ?>
                            </ul>
                        <?php } else { ?>
                            <ul class="list-group">
                                    <li class="list-group-item text-center text-secondary font-weight-bold">Belum Ada Absensi</li>
                            </ul>
                        <?php } ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"></i>Close</button>
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