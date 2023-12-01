            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="">
                        <div class="card" style="width:100%;">
                            <div class="card-body">
                                <h2 class="card-title" style="color: black;">Tambah Data Kelas</h2>
                            </div>
                        </div>
                    </div>

                    <div id="detail" class="card card-success">
                        <div class="col-md-12 text-center">
                            <p class="registration-title font-weight-bold display-4 mt-4" style="color:black; font-size: 45px;">
                                Penambahan Kelas</p>
                            <p style="line-height:-30px;margin-top:-20px;">Silahkan isi data data dibawah <br> untuk rombel kelas baru diketikan secara manual</p>
                            <hr>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="<?= base_url('admin/tambah_kelas') ?>">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Tingkat</label>
                                        <select class="form-control selectric" name="tingkat">
                                            <option selected disabled>-</option>
                                            <option value="4">4 (IV)</option>
                                            <option value="5">5 (V)</option>
                                            <option value="6">6 (VI)</option>
                                        </select>
                                        <?= form_error('tingkat', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="rombel">Rombongan Belajar</label>
                                    <input id="rombel" type="text" class="form-control" name="rombel">
                                    <?= form_error('rombel', '<small class="text-danger">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg btn-block">
                                        Tambah ⭢
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