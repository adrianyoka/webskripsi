<!--================ Start footer Area  =================-->
<?php if($this->session->userdata('id')!=null): ?>
<footer class="footer-area p_60">
    <div class="container">
        <div class="row">
            <div class="col-lg-2  col-md-6 col-sm-6">
                <div class="single-footer-widget tp_widgets">
                    <h6 class="footer_title">Pelajaran - Materi</h6>
                    <ul class="list">
                        <li><a href="javaScript:void(0);">IPA</a></li>
                        <li><a href="javaScript:void(0);">Matematika</a></li>
                        <li><a href="javaScript:void(0);">Bahasa Inggris</a></li>
                        <li><a href="javaScript:void(0);">Bahasa Indonesia</a></li>
                        <li><a href="javaScript:void(0);">Pendidikan Agama Islam</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-between align-items-center footer-bottom">
            <p class="col-lg-8 col-md-8 footer-text m-0">
            </p>
            <div class="col-lg-4 col-md-4 footer-social">
                <a href="https://www.facebook.com/syaaauqi"><i class="fa fa-facebook"></i></a>
                <a href="https://twitter.com/syaaauqi"><i class="fa fa-twitter"></i></a>
                <a href="https://dribbble.com/syaufy"><i class="fa fa-dribbble"></i></a>
                <a href="https://www.behance.net/syaufy"><i class="fa fa-behance"></i></a>
                <a href="https://www.github.com/syauqi"><i class="fa fa-github"></i></a>
                <a href="https://www.instagram.com/syaufy"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
    </div>
</footer>
<!--================ End footer Area  =================-->



<?php endif?>
<!-- End Login Modal -->


<!-- Sweetaler Flashdata -->
<?php if ($this->session->flashdata('success-reg')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Bab berhasil ditambahkan!',
            text: 'Silahkan lihat bab terbaru!',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
<?php unset($_SESSION['success-reg']); endif; ?>

<?php if ($this->session->flashdata('delete-bab')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Bab berhasil dihapus!',
            text: 'Bab telah berhasil dihapus!',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
<?php unset($_SESSION['delete-bab']); endif; ?>

<?php if ($this->session->flashdata('update-bab')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Bab berhasil diubah!',
            text: 'Silahkan lihat perubahan bab!',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
<?php unset($_SESSION['update-bab']); endif; ?>

<?php if ($this->session->flashdata('login-success')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Kamu berhasil daftar!',
            text: 'Sekarang login yuk!',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
<?php unset($_SESSION['login-success']); endif; ?>


<?php if ($this->session->flashdata('success-logout')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Kamu berhasil logout!',
            text: 'Selamat tinggal, Sampai jumpa lagi!',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
<?php unset($_SESSION['success-logout']); endif; ?>


<?php if ($this->session->flashdata('fail-login')) : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal login!',
            text: 'Silahkan Periksa Kembali Email dan Password Kamu!',
            showConfirmButton: false,
            timer: 2500
        });
    </script>
<?php unset($_SESSION['fail-login']); endif; ?>


<?php if ($this->session->flashdata('fail-pass')) : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Password Salah!',
            text: 'Silahkan Periksa Kembali Password Kamu!',
            showConfirmButton: false,
            timer: 2500
        });
    </script>
<?php unset($_SESSION['fail-pass']); endif; ?>


<?php if ($this->session->flashdata('not-login')) : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Harap Login Terlebih Dahulu !',
            text: 'Silahkan Login Dahulu !',
            showConfirmButton: false,
            timer: 2500
        });
    </script>
<?php unset($_SESSION['not-login']);endif; ?>

<?php if ($this->session->flashdata('false-login')) : ?>
    <script>
        $("#exampleModalCenter").modal("show")
    </script>
<?php unset($_SESSION['false-login']); endif; ?>

<script src="<?= base_url('assets/') ?>js/stellar.js"></script>
<script src="<?= base_url('assets/') ?>vendors/lightbox/simpleLightbox.min.js"></script>
<script src="<?= base_url('assets/') ?>vendors/nice-select/js/jquery.nice-select.min.js"></script>
<script src="<?= base_url('assets/') ?>vendors/isotope/imagesloaded.pkgd.min.js"></script>
<script src="<?= base_url('assets/') ?>vendors/isotope/isotope.pkgd.min.js"></script>
<script src="<?= base_url('assets/') ?>vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="<?= base_url('assets/') ?>vendors/popup/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url('assets/') ?>js/jquery.ajaxchimp.min.js"></script>
<script src="<?= base_url('assets/') ?>vendors/counter-up/jquery.waypoints.min.js"></script>
<script src="<?= base_url('assets/') ?>vendors/counter-up/jquery.counterup.js"></script>
<script src="<?= base_url('assets/') ?>js/mail-script.js"></script>
<script src="<?= base_url('assets/') ?>js/theme.js"></script>
<script>
    var animateButton = function(e) {
        e.preventDefault;
        e.target.classList.remove('animate');
        e.target.classList.add('animate');
        setTimeout(function() {
            e.target.classList.remove('animate');
        }, 700);
    };

    var bubblyButtons = document.getElementsByClassName("bubbly-button");

    for (var i = 0; i < bubblyButtons.length; i++) {
        bubblyButtons[i].addEventListener('click', animateButton, false);
    }
</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</body>

</html>