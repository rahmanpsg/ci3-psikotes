<link rel="stylesheet" href="<?php echo base_url('assets/css/print.min.css') ?>">
<script src="<?php echo base_url('assets/js/print.min.js') ?>"></script>
<script src="<?php echo base_url('asset/vendor/radar/radarChart.js')?>"></script>
<script src="<?php echo base_url('asset/vendor/bootstrap-table/bootstrap-table.min.js'); ?>"></script>

<div class="card-body">
    <h4 class="box-title">HASIL PSIKOTES PAPI KOSTICK </h4>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card-body">
            <div id="printJS-form">
            <table border="0">
                <tr>
                    <td style="width: 250px"><h5 class="pb-2 display-5">NAMA</h5></td>
                    <td style="width: 20px"><h5 class="pb-2 display-5">:</h5></td>
                    <td><h5 class="pb-2 display-5"><?= strtoupper($nama); ?></h5></td>
                </tr>
                <tr>
                    <td><h5 class="pb-2 display-5">NIK</h5></td>
                    <td><h5 class="pb-2 display-5">:</h5></td>
                    <td><h5 class="pb-2 display-5"><?= strtoupper($nik); ?></h5></td>
                </tr>
                <tr>
                    <td><h5 class="pb-2 display-5">PEKERJAAN YANG DIPILIH</h5></td>
                    <td><h5 class="pb-2 display-5">:</h5></td>
                    <td><h5 class="pb-2 display-5"><?= strtoupper($pekerjaan); ?></h5></td>
                    </tr>
                <tr>
                    <td><h5 class="pb-2 display-5">WAKTU MULAI</h5></td>
                    <td><h5 class="pb-2 display-5">:</h5></td>
                    <td><h5 class="pb-2 display-5"><?= strtoupper($waktu_mulai); ?></h5></td>
                </tr>
                <tr>
                    <td><h5 class="pb-2 display-5">WAKTU SELESAI</h5></td>
                    <td><h5 class="pb-2 display-5">:</h5></td>
                    <td><h5 class="pb-2 display-5"><?= strtoupper($waktu_selesai); ?></h5></td>
                </tr>
            </table>                                        
            <div class="radarPapi text-center"></div>

            <div class="card-body"></div>
            <div class="text-center">
                <ul class="list-group col-md-6 mx-auto justify-content-center">
                    <?php 
                        foreach ($percent as $key => $value) {
                            ?>
                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?php echo $key; ?>
                                <span class="badge badge-primary badge-pill"><?= $value['point']; ?>%</span>
                              </li>
                            <?php
                        }
                    ?>
                </ul>
            </div>
    
            <div class="card-body"></div>
            <div class="text-center">
                <p><h1><?= $kecocokan_pekerjaan; ?></h1></p>
            </div>

            <div class="card-body"></div>
            <?php 
                foreach ($table_set as $key => $value) {
            ?>
                <table class="table table-responsive-lg" width="100%">
                    <thead class="text-center bg-primary text-white">
                        <th colspan="3"><?= $key; ?></th>
                    </thead>
                    <tbody class="text-left">
                    <?php
                        foreach ($value as $val) {
                    ?>
                        <tr>
                            <td><h3><?= $val['kode'] ?></h3></td>
                            <td><?= $val['ket_role'] ?></td>
                            <td><?= $val['ket_nilai'] ?></td>
                        </tr>
                    <?php
                        }
                     ?>
                    </tbody>
                </table>
            <?php
                }
             ?>
             </div>

             <div class="text-right">
                <button type="button" class="btn btn-success col-lg-2" data-toggle="modal" data-target="#myModal"><i class="fa fa-book"></i> Lihat Jawaban</button>
                <button type="button" onclick="printJS({ printable: 'printJS-form', type: 'html', header: 'HASIL PSIKOTES PAPI KOSTICK' })" class="btn btn-info col-lg-2"><i class="fa fa-print"></i> Cetak</button>
            </div>
        </div>
    </div>

</div> <!-- /.row -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="exampleModalScrollableTitle">History Jawaban Peserta</h4>
      </div>
      <div class="modal-body">
        <div class="table-responsive" style="height: 335px">
        <table class="table table-sm" id="table" data-toggle="table">
            <thead class="text-center bg-primary text-white">
                <th class="text-center">No</th>
                <th>Jawaban</th>
            </thead>
            <tbody>
            <?php
                foreach ($jawaban as $k => $val) {
            ?>
                <tr>
                    <td><?= $k ?></td>
                    <td><?= $val ?></td>
                </tr>
            <?php
                }
             ?>
            </tbody>
        </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    (function(){
    var originalRemoveClassMethod = jQuery.fn.removeClass;

    jQuery.fn.removeClass = function(){
        if (arguments[0] === 'modal-open' && jQuery('.modal.in').length > 1) {
            return this;
        }
        var result = originalRemoveClassMethod.apply( this, arguments );
        return result;
    }
})();
</script>

<script>
    var margin = {top: 100, right: 100, bottom: 150, left: 150},
        width = Math.min(850, window.innerWidth - 10) - margin.left - margin.right,
        height = Math.min(width, window.innerHeight - margin.top - margin.bottom);
            

    var data = [<?php echo json_encode($radar_set); ?>];

    var color = d3.scale.ordinal()
        .range(["#2878fa"]);
        
    var radarChartOptions = {
      w: width,
      h: height,
      margin: margin,
      maxValue: 9,
      levels: 9,
      roundStrokes: true,
      color: color
    };
    //Call function to draw the Radar chart
    RadarChart(".radarPapi", data, radarChartOptions);
</script>