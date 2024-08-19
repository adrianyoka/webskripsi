            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="">
                        <div class="card" style="width:100%;">
                            <div class="card-body">
                                <h2 class="card-title" style="color: black;">Tambah Data Pendidik</h2>

                            </div>


                        </div>
                    </div>

                    <div id="detail" class="card card-success">
                        <div class="col-md-12 text-center">
                            <p class="registration-title font-weight-bold display-4 mt-4" style="color:black; font-size: 49px;">
                                Pendaftaran Pendidik</p>
                            <p style="line-height:-30px;margin-top:-20px;">Silahkan isi data data yang diperlukan
                                dibawah </p>
                            <hr>
                            <!-- <div class="mx-3 mb-2 d-flex justify-content-end">
                                <div class="">
                                    <div class="input-group text-left">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-success" type="button" id="inputGroupFileAddon03">Unduh Template</button>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                                            <label class="custom-file-label" for="inputGroupFile03">Import Data Guru</label>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>

                        <div class="card-body">
                            <form method="POST" action="<?= base_url('admin/add_guru') ?>">
                                <div id="" class="form-group">
                                    <label for="nip">Nomor Induk Pegawai</label>
                                    <input id="nip" type="number" class="form-control" name="nip">
                                    <?= form_error('nip', '<small class="text-danger">', '</small>'); ?>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email">
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input id="nama" type="text" class="form-control" name="nama">
                                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="password" class="d-block">Password</label>
                                        <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                        <div id="pwindicator" class="pwindicator">
                                            <div class="bar"></div>
                                            <div class="label"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="password2" class="d-block">Konfirmasi Password</label>
                                        <input id="password2" type="password" class="form-control" name="password2">
                                        <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>

                                <div id="" class="row">
                                    <div class="form-group col-12">
                                        <label>Kelas yang diajar</label>
                                        <select class="form-control selectric" name="kelas">
                                            <option selected disabled>-</option>
                                            <?php foreach ($kelas as $k) : ?>
                                                <option value="<?=$k->id?>"><?= $k->tingkat ?><?= $k->rombel ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <?= form_error('kelas', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
<!-- 
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                                        <label class="custom-control-label" for="agree">Saya Mengerti dan ingin
                                            melajutkan.</label>
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg btn-block">
                                        Daftar ⭢
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
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
    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>
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
    <!-- Page Specific JS File -->
</body>

</html>