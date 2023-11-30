<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1 style="font-size: 27px; letter-spacing:-0.5px; color:black;">Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Siswa</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $this->db->count_all('siswa'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Guru</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $this->db->count_all('guru'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Materi</h4>
                        </div>
                        <div class="card-body">
                            <?php 
                            echo $this->db->count_all('materi'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Kelas</h4>
                        </div>
                        <div class="card-body">
                            <?php 
                            echo count($kelas)?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <div class="hero text-white hero-bg-image" data-background="<?= base_url('assets/') ?>stisla-assets/img/unsplash/eberhard-grossgasteiger-1207565-unsplash.jpg">
                <div class=" hero-inner">
                    <h1>Selamat Datang, <?php
                                        echo $user['username'];
                                        ?>!</h1>
                    <p class="lead"></p>
                    <div class="mt-4">
                        <a href="<?= base_url('admin/index') ?>" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-desktop"></i>dashboard</a>
                        <a href="<?= base_url('admin/data_siswa') ?>" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i>siswa</a>
                        <a href="<?= base_url('admin/data_guru') ?>" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-chalkboard-teacher"></i>guru</a>
                        <a href="<?= base_url('admin/data_materi') ?>" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-book"></i>materi</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Start Footer -->
<footer class="main-footer">
<div class="text-center">Copyright &copy; 2023 <div class="bullet"></div><a href="">Ilmu Komputer Universitas Lampung</a>
</div>
</footer>
<!-- End Footer -->

</div>
</div>
<!-- End Main Content -->

<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?= base_url('assets/') ?>stisla-assets/js/stisla.js"></script>
<!-- Template JS File -->
<script src="<?= base_url('assets/') ?>stisla-assets/js/scripts.js"></script>
<script src="<?= base_url('assets/') ?>stisla-assets/js/custom.js"></script>
</body>

</html>