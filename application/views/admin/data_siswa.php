<!-- Main Content -->
<div class="main-content">
<section class="section">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title" style="color: black;">Management Data Peserta Didik</h2>
            <hr>
            <p class="card-text">Halaman ini menampilkan data peserta didik</p>
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
                                <th scope="col">NISN</th>
                                <th scope="col">Nama Peserta didik</th>
                                <th scope="col">Email</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Detail</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $nomor = 1;    
                            foreach ($siswa as $u) {
                            ?>
                                <tr class="text-center">

                                    <th scope="row">
                                        <?php echo $nomor++ ?>
                                    </th>

                                    <td>
                                        <?php echo $u->nisn ?>
                                    </td>
                                    <td>
                                        <?php echo $u->nama ?>
                                    </td>

                                    <td>
                                        <?php echo $u->email ?>
                                    </td>

                                    <td>
                                        <img height="20px" src="<?= base_url() . 'assets/profile_picture/' . $u->image; ?>">
                                    </td>

                                    <td>
                                        <?php echo $u->tingkat ?> <?php echo $u->rombel ?>  
                                    </td>

                                    <td class="text-center">
                                        <a href="<?php echo site_url('admin/detail_siswa/' . $u->id_siswa); ?>" class="btn btn-success">Detail ⭢</a>
                                    </td>

                                    <td class="text-center">
                                        <a href="<?php echo site_url('admin/update_siswa/' . $u->id_siswa); ?>" class="btn btn-info">Update ⭢</a>

                                        <button data-url="<?php echo site_url('admin/delete_siswa/' . $u->id_user); ?>" class="btn btn-danger remove" onclick="handleDelete(this)" >Delete ✖</button>

                                        <a href="<?php echo site_url('admin/reset_password/' . $u->id_user); ?>" class="btn btn-success">Reset Password <span><i class=" fas fa-sync"></i></span></a>
                                    </td>

                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <p class="small font-weight-bold"> </p>
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

<?php if ($this->session->flashdata('success-edit')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: '<?=$this->session->flashdata('success-edit')?>',
            text: 'Data Peserta Didik Telah Dirubah!',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
<?php unset($_SESSION['success-edit']);endif; ?>

<?php if ($this->session->flashdata('success-reg')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: '<?=$this->session->flashdata('success-reg')?>',
            text: 'Data Peserta Didik Telah Ditambahkan!',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
<?php unset($_SESSION['success-reg']);endif; ?>

<?php if ($this->session->flashdata('user-delete')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: '<?=$this->session->flashdata('user-delete')?>',
            text: 'Data Peserta Didik Telah Dihapus!',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
<?php unset($_SESSION['user-delete']);endif; ?>

<?php if ($this->session->flashdata('success-reset')) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Password Peserta Didik Telah Direset!',
                text: 'Selamat Password  telah Direset!',
                showConfirmButton: false,
                timer: 2500
            })
        </script>
    <?php unset($_SESSION['success-reset']); endif; ?>
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