    <!-- Start Greeting Cards -->
    <div class="container">
        <div class="materi p-4 buat-text" data-aos="fade-down" data-aos-duration="1400" style="width: 100%; border-radius:10px;">
            <div class="row" style="color: black; font-family: 'poppins';">
                <div class="col-md-12 mt-1 text-left">
                    <h1 class="display-6" data-aos="fade-down" data-aos-duration="1400">Daftar Materi</h1>
                    <h4 data-aos="fade-down" data-aos-duration="1700"><?php
                                                                        echo $user['nama_guru'];
                                                                        ?> - SmartLearn Teacher</h4>
                    <p data-aos="fade-down" class="font-weight-bold" data-aos-duration="1800">
                        <?=$topik[0]->nama_mapel?> - Kelas <?php echo $user['tingkat'].$user['rombel']?>
                    </p>
                    <hr width="100%">
                    <div class = "d-flex justify-content-end" >
                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#TambahBabModal"><i class="fa fa-plus text-light"></i> BAB</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Greeting Cards -->


    <!-- Start Lesson Cards -->
    <div class="container">
        <?php if (isset($_SESSION['form-error'])) {?>
            <div class="my-2 alert alert-danger" role="alert" data-aos="fade-down" data-aos-duration="1500">
                Gagal Tambah Bab
            </div>
        <?php }unset($_SESSION['form-error'])?>
        <div class="accordion mt-4" id="BabAccordion" data-aos="fade-down" data-aos-duration="1200">
            <?php try{
                foreach ($topik as $bab) { 
                    if (!isset($bab->materi)) {
                            throw new Exception("Tidak ada kelas");
                        } ?>
                    <div class="card w-100">
                        <div class="card-header d-flex justify-content-between" id="<?='heading-topik-'.$bab->bab_id?>">
                            <div>
                                <h2 class="mb-0"> 
                                    <button class="btn btn-link btn-block text-left collapsed text-decoration-none text-dark font-weight-bold" type="button" data-toggle="collapse" data-target="#topik-<?=$bab->bab_id?>" aria-expanded="true" aria-controls="topik-<?=$bab->bab_id?>">
                                        <i class="fa fa-bars mr-3"></i> <?=$bab->judul_bab?>
                                    </button>
                                </h2>
                                <p class="ml-5 text-muted"><?=$bab->deskripsi?></p>
                            </div>
                            <div id="action-bar">
                                <button class="btn btn-sm btn-success text-light tambah-materi" data-bab-id ="<?=$bab->bab_id?>"  data-toggle="modal" data-target="#TambahMateriModal"><i class="fa fa-plus text-light"></i> Materi</button>
                                <button class="btn btn-sm btn-warning edit-materi" data-toggle="modal" data-target="#EditBabModal-<?=$bab->bab_id?>"><i class="fa fa-pencil-alt"></i> Edit</button>
                                <a class="btn btn-sm btn-danger" href="<?= base_url('guru/deletebab/'.$bab->bab_id) ?>"><i class="fa fa-trash text-light"></i> Delete</a>
                            </div> 
                        </div>
                        <div id="topik-<?=$bab->bab_id?>" class="collapse" aria-labelledby="<?='heading-topik-'.$bab->bab_id?>" data-parent="#BabAccordion">
                            <div class="card-body">
                                <ul class="list-group ml-5">
                                    <div>
                                        <?php if ($bab->materi == 0) {?>
                                            <h3 class="text-center"> Belum Ada Materi</h3>
                                        <?php } else {?>
                                            <?php foreach($bab->materi as $materi) :
                                            if (gettype($materi) == 'string') {?>
                                                <li class="list-group-item">
                                                    <small class="card-link"> Bell</small>
                                                </li>
                                            <?php } else if ($materi->tipe=='video'|| $materi->tipe=='youtube') {?>
                                                <li class="list-group-item">
                                                    <div class="d-flex justify-content-between">
                                                        <a href="<?= base_url('guru/materi/').$materi->id ?>" class="card-link"> <i class=" text-dark fa fa-file-<?=$materi->tipe=='video'|| $materi->tipe=='youtube'?'video':($materi->tipe=='ppt'?'powerpoint':'pdf')?>-o mr-2"> </i> <?=$materi->judul?> </a>
                                                        <div>
                                                            <?php if ($materi->is_tampil == 0) { ?>
                                                                <span class="badge badge-secondary">disembunyikan</span>
                                                            <?php } ?>
                                                            <a class="btn btn-sm btn-primary" href="<?= base_url('guru/changeTampil/'.$materi->id) ?>"><i class="fa fa-<?=$materi->is_tampil == 1 ? 'eye-slash' : 'eye'?> text-light"></i></a>
                                                            <button class="btn btn-sm btn-warning edit-materi" data-toggle="modal" data-target="#EditBabModal-<?=$bab->bab_id?>"><i class="fa fa-pencil-alt"></i> Edit</button>
                                                            <a class="btn btn-sm btn-danger" href="<?= base_url('guru/deletebab/'.$bab->bab_id) ?>"><i class="fa fa-trash text-light"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php } elseif ($materi->tipe=='ppt'|| $materi->tipe=='pdf') { ?>
                                                <li class="list-group-item">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <a href="<?= base_url() . 'assets/materi_attachment/' . $materi->attachment; ?>" class="card-link"> <i class=" text-dark fa fa-file-<?=($materi->tipe=='ppt'?'powerpoint':'pdf')?>-o mr-2"> </i> <?=$materi->judul?> </a>
                                                        <p class="ml-5"><?=$materi->deskripsi?></p>
                                                    </div>
                                                    <div>
                                                    <?php if ($materi->is_tampil == 0) { ?>
                                                                <span class="badge badge-secondary">disembunyikan</span>
                                                            <?php } ?>
                                                        <a class="btn btn-sm btn-primary" href="<?= base_url('guru/changeTampil/'.$materi->id) ?>"><i class="fa fa-<?=$materi->is_tampil == 1 ? 'eye-slash' : 'eye'?> text-light"></i></a>
                                                        <button class="btn btn-sm btn-warning edit-materi" data-toggle="modal" data-target="#EditBabModal-<?=$bab->bab_id?>"><i class="fa fa-pencil-alt"></i> Edit</button>
                                                        <a class="btn btn-sm btn-danger" href="<?= base_url('guru/deletebab/'.$bab->bab_id) ?>"><i class="fa fa-trash text-light"></i> Delete</a>
                                                    </div>
                                                </div>
                                                    
                                                </li>
                                            <?php } else { ?>
                                                <li class="list-group-item">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <a href="<?= $materi->attachment; ?>" class="card-link"> <i class=" text-dark fa fa-file-text-o mr-2"> </i> <?=$materi->judul?> </a>
                                                        <p class="ml-5"><?=$materi->deskripsi?></p>
                                                    </div>
                                                    <div>
                                                    <?php if ($materi->is_tampil == 0) { ?>
                                                                <span class="badge badge-secondary">disembunyikan</span>
                                                            <?php } ?>
                                                        <a class="btn btn-sm btn-primary" href="<?= base_url('guru/changeTampil/'.$materi->id) ?>"><i class="fa fa-<?=$materi->is_tampil == 1 ? 'eye-slash' : 'eye'?> text-light"></i></a>
                                                        <button class="btn btn-sm btn-warning edit-materi" data-toggle="modal" data-target="#EditBabModal-<?=$bab->bab_id?>"><i class="fa fa-pencil-alt"></i> Edit</button>
                                                        <a class="btn btn-sm btn-danger" href="<?= base_url('guru/deletebab/'.$bab->bab_id) ?>"><i class="fa fa-trash text-light"></i> Delete</a>
                                                    </div>
                                                </div>
                                                    
                                                </li>
                                            <?php } endforeach;
                                        }?>
                                    </div>
                                    
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

    <!-- Tambah Bab Pop up -->
    <div class="modal fade" id="TambahBabModal" tabindex="-1" role="dialog" aria-labelledby="TambahBabModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TambahBabModalLabel">Tambah Bab</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th style="white-space:nowrap">
                                        Judul Bab
                                    </th>
                                    <td>
                                        <input class="w-100" type="text" name="judul_bab" value="<?=set_value('judul_bab')?>">
                                        <?= form_error('judul_bab', '<small class="text-danger">', '</small>'); ?>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th>
                                        Deskripsi
                                    </th>
                                    <td>
                                        <textarea rows="5" cols="50" name="deskripsi"><?=set_value('deskripsi')?></textarea>
                                        <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                                    </td>
                                </tr>
                                <input type="hidden" name="mapel_id" value="<?= $user['mapel_id']; ?>">
                                <input type="hidden" name="kelas_id" value="<?= $user['kelas_id']; ?>">
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                        <<input type="submit" name="submit_bab" value="Save changes" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Selesai Tambah Bab Pop up -->

    <!-- Edit Bab Pop up -->
    <?php foreach($topik as $bab) : 
        if(isset($bab->bab_id)) : ?>
            <div class="modal fade" id="EditBabModal-<?=$bab->bab_id?>" tabindex="-1" role="dialog" aria-labelledby="TambahBabModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="EditBabModalLabel-<?=$bab->bab_id?>">Edit Bab</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('guru/updatebab/'.$bab->bab_id)?>" method="post">
                            <div class="modal-body">
                                <table class="table table-hover">
                                    <tbody>
                                        <?php if (isset($_SESSION['form-error'])) {?>
                                            <div class="alert alert-danger" role="alert">
                                                <?= $_SESSION['form-error'] ?>
                                            </div>
                                        <?php } ?>
                                        <tr>
                                            <th style="white-space:nowrap">
                                                Judul Bab
                                            </th>
                                            <td>
                                                <input class="w-100" type="text" name="judul_bab" value="<?=$bab->judul_bab?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                Deskripsi
                                            </th>
                                            <td>
                                                <textarea rows="5" cols="50" name="deskripsi"><?=$bab->deskripsi?></textarea>
                                            </td>
                                        </tr>
                                        <input type="hidden" name="mapel_id" value="<?= $bab->mapel_id; ?>">
                                        <input type="hidden" name="kelas_id" value="<?= $bab->kelas_id; ?>">
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                <button type="submit" name= 'submit' class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endif?>
    <?php endforeach?>
    <!-- Selesai Edit Bab Pop up -->

    <!-- Tambah Materi Pop up -->
    <div class="modal fade" id="TambahMateriModal" tabindex="-1" role="dialog" aria-labelledby="TambahMateriModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TambahMateriModalLabel">Tambah Materi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="white-space:nowrap">
                                        Judul
                                    </th>
                                    <td>
                                        <input class="w-100" type="text" name="judul_materi" value="<?=set_value('judul_materi')?>">
                                        <?= form_error('judul_materi', '<small class="text-danger">', '</small>'); ?>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th>
                                        Deskripsi
                                    </th>
                                    <td>
                                        <textarea rows="5" cols="50" name="deskripsi_materi"><?=set_value('deskripsi_materi')?></textarea>
                                        <?= form_error('deskripsi_materi', '<small class="text-danger">', '</small>'); ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Tipe
                                    </th>
                                    <td>
                                    <select name = "tipe" class="w-100">
                                        <option selected>Pilih tipe materi</option></option>
                                        <option value="pdf">PDF</option>
                                        <option value="ppt">PPT</option>
                                        <option value="youtube">Youtube</option>
                                        <option value="video">Video</option>
                                        <option value="link lainnya">Lainnya</option>
                                    </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="attachment" class="custom-file-input" id="attachment">
                                                <label class="custom-file-label" for="inputGroupFile01">Pilih Berkas</label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend flex-fill">
                                                <div class="input-group-text">
                                                    <input type="checkbox" id="checkbox" aria-label="Checkbox for following text input" value=1 onclick='isTampilHandler(this);'>
                                                    <input type="hidden" id="is_tampil" name='is_tampil' aria-label="Checkbox for following text input" value=0 '>
                                                </div>
                                                <div class="form-control">
                                                    <label for="checkbox">Tampilkan Materi</label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <input type="hidden" name="guru_id" value="<?=$user['nip']?>">
                                <input type="hidden" name="mapel_id" value="<?= $user['mapel_id']; ?>">
                                <input type="hidden" name="kelas_id" value="<?= $user['kelas_id']; ?>">
                                <input type="hidden" id="materi-bab-id" name="bab_id">
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                        <input type="submit" name="submit_materi" value="Save changes" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Selesai Materi Pop up -->


    <script>
        $(".tambah-materi").on("click", function (){
            let value = $(this).data("babId");
            $("#materi-bab-id").val(value)
        })

        function isTampilHandler(cb) {
            $("#is_tampil").val(cb.checked ? 1 : 0);
            console.log($("#is_tampil").val());
        }
    </script>

    <!-- Start Animate On Scroll -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <!-- End Animate On Scroll -->