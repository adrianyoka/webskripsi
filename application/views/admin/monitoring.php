<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="card" style="width:100%;">
            <div class="card-body">
                <h2 class="card-title" style="color: black;">Monitoring Nilai Peserta Didik</h2>
                <hr>
                <form id="filter">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Pilih Kelas</label>
                                <select class="form-control" name="tingkat" id="FormTingkat">
                                    <?php foreach($tingkat as $t): ?>
                                    <option value="<?=$t->tingkat?>">Kelas <?=$t->tingkat?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Pilih Bulan</label>
                                <select class="form-control" name="bulan" id="FormBulan">
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="01">April</option>
                                    <option value="01">Mei</option>
                                    <option value="01">Juni</option>
                                    <option value="01">Juli</option>
                                    <option value="01">Agustus</option>
                                    <option value="01">September</option>
                                    <option value="01">Oktober</option>
                                    <option value="01">November</option>
                                    <option value="01">Desember</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Filter</label>
                                <button type="submit" class="btn btn-primary form-control">Filter</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="container">
                    <div class="row my-3">
                        <div class="col-md-12">
                            <h4 class="text-center">Rata Rata nilai peserta didik kelas <span id="tingkat">4</span> per Mata Pelajaran</h4>
                            <h6 class="text-center">Bulan <span id="bulan">Januari</span></h6>
                        </div>
                    </div>

                    <div class="row">
                        <?php
                            foreach ($mapel as $m) :
                        ?>
                            <div class="col-md-6">
                                <canvas id="barChart-<?=$m->nama_mapel?>"></canvas>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Start Footer -->
                    <footer class="main-footer">
                        <div class="text-center">Copyright &copy; 2023 <div class="bullet"></div><a href="">Ilmu Komputer Universitas Lampung</a></div>
                    </footer>
                    <!-- End Footer -->

                </div>
            </div>
        </div>
    </section>
</div>
<!-- End Main Content -->


<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
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

<script>
    function getMultipleRandom(arr, num) {
        const shuffled = [...arr].sort(() => 0.5 - Math.random());
        
        return shuffled.slice(0, num);
    }

    const colors = ['#b2abf2','#89043d','#2fe6de','#1c3041','#18f2b2'];
    var nilai = {};
    var nama_kelas = <?=json_encode($nama_kelas);?>;

    var warna = getMultipleRandom(colors, nama_kelas.length);
    var kelas_warna = [nama_kelas,warna];
</script>

<script>
    $("#filter").submit(function (event){
        var formData = {
            tingkat: $("#FormTingkat").val(),
            bulan: $("#FormBulan").val(),
        };
        $.ajax(
            {
                url: "<?=base_url('ajax/getNilaiBulan')?>",
                method:'post',
                data: formData,
                success: function(result){
                var data = JSON.parse(result)['avg'];
                var newKelas = JSON.parse(result)['kelas'];
                $('#tingkat').text(formData['tingkat']);
                $('#bulan').text($("#FormBulan option:selected" ).text());
                $.each( data, function( mapel, value ) {
                    nilai[mapel] = Object.keys(value).map(function (key) { return value[key]; });
                });
                nama_kelas = newKelas;
                warna = getMultipleRandom(colors, nama_kelas.length);
                kelas_warna = [nama_kelas,warna];
                generateChart();
        }});
        event.preventDefault();
    });
</script>

<script>
    function generateChart(){
        <?php
            foreach ($mapel as $m) :
        ?>
            var chartStatus = Chart.getChart("barChart-<?=$m->nama_mapel?>"); 
            if (chartStatus != undefined) {
                chartStatus.destroy();
            }
            var ctx = document.getElementById("barChart-<?=$m->nama_mapel?>").getContext('2d');
            var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: kelas_warna[0],
                datasets: [{
                    label: '<?=$m->nama_mapel?>',
                    data: nilai['<?=$m->nama_mapel?>'],
                    borderWidth: 2,
                    backgroundColor: kelas_warna[1],
                    borderColor: kelas_warna[1],
                    borderWidth: 2.5,
                    pointBackgroundColor: '#ffffff',
                    pointRadius: 4
                }]
            },
            options: {
                legend: {
                display: false
                },
                scales: {
                yAxes: [{
                    gridLines: {
                    drawBorder: false,
                    color: '#f2f2f2',
                    },
                    ticks: {
                    beginAtZero: true,
                    stepSize: 150
                    }
                }],
                xAxes: [{
                    ticks: {
                    display: false
                    },
                    gridLines: {
                    display: false
                    }
                }]
                },
            }
            });
            
        <?php endforeach; ?>
    }
$( document ).ready(function() {
    console.log( "ready!" );
    var formData = {
            tingkat: 4,
        };
    $.ajax(
        {
            url: "<?=base_url('ajax/getNilaiBulan')?>",
            method:'post',
            data: formData,
            success: function(result){
            var data = JSON.parse(result)['avg'];
            $('#bulan').text($("#FormBulan option:selected" ).text());
            $('#tingkat').text(formData['tingkat']);
            $.each( data, function( mapel, value ) {
                nilai[mapel] = Object.keys(value).map(function (key) { return value[key]; });
            });
            
            generateChart();
        }});
});
</script>
</body>
</html>