<!-- Main Content -->
<div class="main-content">
<section class="section">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title" style="color: black;">Management Data BAB</h2>
            <hr>
            <p class="card-text">Halaman ini menampilkan data BAB dan Materi 
            <br><span class ="small font-weight-bold">*  Pemberlakuan pembatasan hak akses oleh admin dalam BAB dan Materi ditujukan untuk keamanan dalam pembelajaran</span></p>
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
                                <th scope="col">Judul Bab</th>
                                <th scope="col">Deskripsi Bab</th>
                                <th scope="col">Nama Mata Pelajaran</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $nomor = 1;    
                            foreach ($bab as $u) {
                            ?>
                                <tr class="text-center">

                                    <th scope="row">
                                        <?php echo $nomor++ ?>
                                    </th>

                                    <td>
                                        <?php echo $u->judul_bab ?>
                                    </td>
                                    <td>
                                        <?= substr($u->deskripsi, 0, 30); ?>
                                        <?=strlen($u->deskripsi) > 30?'.&nbsp;.&nbsp;.&nbsp;':''?>
                                    <td>
                                        <?php echo $u->nama_mapel ?>
                                    </td>
                                    <td>
                                        <?php echo $u->tingkat ?><?php echo $u->rombel ?>
                                    </td>

                                    <td class="text-center">
                                        <span class="d-inline-block" <?= count($u->materi) > 0 ? 'data-toggle="popover" data-content="Bab Yang Masih Berisi Materi Tidak Dapat Dihapus / Diupdate" data-placement="bottom"' :'' ?> >
                                            <a href="<?php echo site_url('admin/detail_bab/' . $u->id_bab); ?>" class="btn btn-success">Detail ⭢</a>
                                        </span>
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
</div>
</div>
<!-- End Main Content -->

<!-- Start Sweetalert -->

<?php if ($this->session->flashdata('bab-add')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: '<?=$this->session->flashdata('bab-add')?>',
            text: 'Data Bab Telah Ditambahkan!',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
<?php unset($_SESSION['bab-add']);endif; ?>

<?php if ($this->session->flashdata('bab-delete')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: '<?=$this->session->flashdata('bab-delete')?>',
            text: 'Data Bab Telah Dihapus!',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
<?php unset($_SESSION['bab-delete']);endif; ?>

<?php if ($this->session->flashdata('bab-edit')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: '<?=$this->session->flashdata('bab-edit')?>',
            text: 'Data Bab Telah Diubah!',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
<?php unset($_SESSION['bab-edit']);endif; ?>

<!-- End Sweetalert -->

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