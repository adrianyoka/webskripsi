<!-- Main Content -->
<div class="main-content">
<section class="section">
    <div class="">
        <div class="card" style="width:100%;">
            <div class="card-body">
                <h2 class="card-title" style="color: black;">Tambah Data Materi</h2>
                <hr>
                <!-- <a href="<?= base_url('admin/data_materi') ?>" class="btn btn-success">Data Materi ⭢</a> -->
            </div>
        </div>
        <div class="card card-success">
            <div class="col-md-12 text-center">
                <p class="registration-title font-weight-bold display-4 mt-4" style="color:black; font-size: 50px;">
                    Tambah Materi</p>
                <p style="line-height:-30px;margin-top:-20px;">Silahkan isi data data yang diperlukan
                    dibawah </p>
                <hr>
            </div>
            <div id="detail" class="card-body">
                <form method="POST" enctype="multipart/form-data" action="<?= base_url('admin/tambah_materi') ?>">
                    <div class="col-md-12 bg-white" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px">
                        <form method="post" enctype="multipart/form-data" action="<?= base_url('guru/add_materi') ?>">
                            <input type="hidden" name="id">
                            <div class="form-group">
                                <label>Kelas</label>
                                <select id="kelas" class="form-control align-items-center w-100" name="kelas_id" required></select>
                            </div>
                           <div class="row">
                                <div class="form-group col-12">
                                    <label>Mata Pelajaran</label>
                                    <select id="mapel" class="form-control align-items-center w-100" name="mapel_id" required></select>
                                </div>
                            </div>
                           <div class="row">
                                <div class="form-group col-12">
                                    <label>BAB</label>
                                    <select id="bab" class="form-control align-items-center w-100" name="bab_id" required></select>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label for="judul_materi">Judul Materi</label>
                                    <input id="judul_materi" type="text" class="form-control" name="judul_materi">
                                    <?= form_error('judul_materi', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>Tipe Materi</label>
                                    <select id="tipe" class="form-control align-items-center w-100" name="tipe" required>
                                    <option selected>Pilih tipe materi</option>
                                    <option value="pdf">PDF</option>
                                    <option value="youtube">Link Video</option>
                                    </select>
                                </div>
                            </div>
                            <div id="link" class="form-group">
                                    <label for="link_materi">Link Video Materi</label>
                                    <input id="link_materi" type="text" class="form-control" name="attachment">
                                    <?= form_error('link_materi', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            <div id="upload" class="form-group">
                            <label for="nama_mapel">Upload Materi</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input id="upload_materi" type="file" name="attachment" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01">upload materi disini Max 100mb</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Deskripsi Materi</label>
                                <textarea class="form-control" required name="deskripsi_materi" id="exampleFormControlTextarea1" rows="3"></textarea>
                                <?= form_error('deskripsi_materi', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <button type="submit" class="btn btn-block btn-success">Tambah
                                materi ⭢</button>
                    </div>
                </form>
            </div>
        </div>
        <br>
    </div>
</section>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
        <script src="<?= base_url('assets/') ?>js/jquery.selectric.min.js"></script>
        <!-- JS Libraies -->
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
        
        <script>
        $(document).ready(function() {

            $.get("<?=base_url('admin/get_kelas')?>",{
                multiple: 0
            },function(data){
                $('#kelas').append(data).selectric();
            });
            
            $("#upload").toggleClass("d-none",true)
            $("#link").toggleClass("d-none",true)

            $.get("<?=base_url('admin/get_bab')?>",{
                kelas: 0,
                mapel: 0
            },function(data){
                $('#bab').append(data).selectric();
                $("#bab").prop('disabled', true).selectric('refresh');
            });
            
            $.get("<?=base_url('admin/get_mapel')?>",function(data){
                $('#mapel').append(data).selectric();
                $("#mapel").prop('disabled', true).selectric('refresh');
            });

            $('#kelas').change(function(){
                $("#bab").prop('disabled', true).selectric('refresh');
                $("#mapel").prop('disabled', false).selectric('refresh');
                $("#mapel").empty();
                $.get("<?=base_url('admin/get_mapel')?>",function(data){
                    $('#mapel').append(data).selectric();
                });
            });
            
            $('#tipe').change(function(){
                if($('#tipe').val() == "pdf"){
                    $("#upload").toggleClass("d-none",false)
                    $("#link").toggleClass("d-none",true)
                }
                else if($('#tipe').val() == "youtube"){
                    $("#link").toggleClass("d-none",false)
                    $("#upload").toggleClass("d-none",true)
                    $("#upload_materi").prop('required', false);
                    $("#link_materi").prop('required', true);
                }
                else {
                    $("#upload").toggleClass("d-none",true)
                    $("#link").toggleClass("d-none",true)
                }
            });

            $('#mapel').change(function(){
                $("#bab").prop('disabled', false).selectric('refresh');
                $("#bab").empty();
                $.get("<?=base_url('admin/get_bab')?>",{
                    kelas: $('#kelas').val(),
                    mapel: $('#mapel').val()
                    },function(data){
                        $('#bab').append(data).selectric();
                        if($('#bab').val() == 0){
                            $("#bab").prop('disabled', true).selectric('refresh');
                        }
                });
            });
        });

        
    </script>
        <!-- Template JS File -->
        <script src="<?= base_url('assets/') ?>stisla-assets/js/scripts.js"></script>
        <script src="<?= base_url('assets/') ?>stisla-assets/js/custom.js"></script>
        <!-- Page Specific JS File -->
</body>

</html>