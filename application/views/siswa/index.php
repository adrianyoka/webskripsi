    <!-- Start Greeting Cards -->
    <div class="container">
        <div class="bg-white mx-auto p-4 buat-text" data-aos="fade-down" data-aos-duration="1400" style="width: 100%; border-radius:10px;">
            <div class="row" style="color: black; font-family: 'poppins';">
                <div class="col-md-12 mt-1">
                    <h1 class="display-4" style="color: black; font-family:'poppins';" data-aos="fade-down" data-aos-duration="1400">Silahkan pilih mata pelajaran !
                    </h1>
                    <hr>

                    <h4 data-aos="fade-down" data-aos-duration="1700"><?php
                                                                        echo $nama;
                                                                        ?> - SmartLearn Students</h3>
                    <h5>Mata Pelajaran Kelas <?php
                                             echo $tingkat;
                                             echo " - ";
                                             echo $rombel;
                                             ?></h5>
                </div>
            </div>
        </div>
    </div>
    <!-- End Greeting Cards -->


    <!-- Start Lesson Card -->
    <div class="container">
        <div class="row row-cols-md-3 my-3" data-aos-duration="1900" data-aos="fade-right">
            <?php foreach ($mata_pelajaran as $mapel) : ?>
            <div class="col-md-4 p-3">
                <div class="card-kelas w-100">
                    <a href="<?= base_url('siswa/materiSiswa/').$kelas_id.'/'.$mapel->id?>">
                        <div>
                            <img src="<?= base_url('assets/') ?>img/<?= $mapel->nama_mapel ?>.png" class="card-img-top" alt="...">
                        </div>
                    </a>
                </div>
            </div>
            <?php endforeach?>
        </div>
    </div>
    <br>

    <!-- Start Animate On Scroll -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <!-- End Animate On Scroll -->