    <!-- Start Greeting Cards -->
    <div class="container">
        <div class="materi p-4 buat-text" data-aos="fade-down" data-aos-duration="1400" style="width: 100%; border-radius:10px;">
            <div class="row" style="color: black; font-family: 'poppins';">
                <div class="col-md-12 mt-1 text-center">
                    <h1 class="display-6" data-aos="fade-down" data-aos-duration="1400">Silahkan pilih materi yang akan
                        kamu pelajari !
                    </h1>
                    <h4 data-aos="fade-down" data-aos-duration="1700"><?php
                                                                        echo $user['nama'];
                                                                        ?> - SmartLearn Students</h4>
                    <hr width="80%">
                    <p data-aos="fade-down" class="font-weight-bold" data-aos-duration="1800">
                        <?=$topik[0]->nama_mapel?> - Kelas <?php echo $user['tingkat'].$user['rombel']?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Greeting Cards -->


    <!-- Start Lesson Cards -->
    <div class="container">
        <div class="accordion mt-4" id="BabAccordion" data-aos="fade-down" data-aos-duration="1200">
            <?php try{
                foreach ($topik as $bab) { 
                    if (!isset($bab->materi))
                        {
                        throw new Exception("Belum ada materi");
                        } ?>
                    <div class="card w-100">
                        <div class="card-header " id="<?='heading-topik-'.$bab->bab_id?>">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed text-decoration-none text-dark font-weight-bold" type="button" data-toggle="collapse" data-target="#topik-<?=$bab->bab_id?>" aria-expanded="true" aria-controls="topik-<?=$bab->bab_id?>">
                                <i class="fa fa-bars mr-3"></i> <?=$bab->judul_bab?>
                                </button>
                            </h2>
                            <p class="ml-5 text-muted"><?=$bab->deskripsi?></p>
                        </div>
                        <div id="topik-<?=$bab->bab_id?>" class="collapse" aria-labelledby="<?='heading-topik-'.$bab->bab_id?>" data-parent="#BabAccordion">
                            <div class="card-body">
                                <ul class="list-group ml-5">
                                    <?php if ($bab->materi == 0) {?>
                                        <h3 class="text-center"> Belum Ada Materi</h3>
                                    <?php } else {?>
                                        <?php foreach($bab->materi as $materi) : 
                                        if ($materi->tipe=='video'|| $materi->tipe=='youtube') {?>
                                            <li class="list-group-item">
                                                <a href="<?= base_url('siswa/belajar/').$materi->id ?>" class="card-link"> <i class=" text-dark fas fa-file-<?=$materi->tipe=='video'|| $materi->tipe=='youtube'?'video':($materi->tipe=='ppt'?'powerpoint':'pdf')?> mr-2"> </i> <?=$materi->judul?> </a>
                                            </li>
                                        <?php } elseif ($materi->tipe=='ppt'|| $materi->tipe=='pdf') { ?>
                                            <li class="list-group-item">
                                                <a href="<?= base_url() . 'assets/materi_attachment/' . $materi->attachment; ?>" class="card-link"> <i class=" text-dark fas fa-file-<?=($materi->tipe=='ppt'?'powerpoint':'pdf')?> mr-2"> </i> <?=$materi->judul?> </a>
                                                <p class="ml-5"><?=$materi->deskripsi?></p>
                                            </li>
                                        <?php } else { ?>
                                            <li class="list-group-item">
                                                <a href="<?= $materi->attachment; ?>" class="card-link"> <i class=" text-dark fas fa-file-alt mr-2"> </i> <?=$materi->judul?> </a>
                                                <p class="ml-5"><?=$materi->deskripsi?></p>
                                            </li>
                                        <?php } endforeach;
                                    }?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php }
            } catch(Exception $e){ ?>
                <div class="container">
                    <div class="bg-white mx-auto p-4 buat-text" data-aos="fade-down" data-aos-duration="1400" style="width: 100%; border-radius:10px;">
                        <div class="row" style="color: black; font-family: 'poppins';">
                            <div class="col-md-12 mt-1 text-center">
                                <h3 class="display-6 text-muted" data-aos="fade-down" data-aos-duration="1400"><?=$e->getMessage()?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- End Lesson Cards -->

    <br>

    <!-- Start Animate On Scroll -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <!-- End Animate On Scroll -->