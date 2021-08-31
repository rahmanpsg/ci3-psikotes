<?php $this->load->view('admin/header'); ?>
<div class="loading"></div>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">               
                <!--  Traffic  -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card" id="div_soal">
                            <div class="card-body">
                                <h4 class="box-title">DATA SOAL </h4>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card-body">
                                        <button class="btn btn-info btn-icon-split" onclick="setModalTambah();">
                                            <span class="icon text-white">
                                              <i class="fa fa-plus"></i>
                                            </span>
                                            <span class="text"> Tambah Data</span>
                                          </button>
                                        <table class="table align-items-center table-flush" id="table" data-toggle="table" data-pagination="true" data-search="true">
                                            <thead class="bg-info text-white text-center">
                                              <tr>
                                                <th data-field="id" rowspan="2" class="font-14 text-center">No</th>
                                                <th data-field="pernyataan" colspan="2" class="font-14">Pernyataan</th>
                                                <th data-field="value" colspan="2" class="font-14">Nilai</th>
                                                <th data-field="aksi" data-formatter="aksiFormatter" data-events="window.aksiEvents" rowspan="2" class="text-center">Aksi</th>
                                              </tr>
                                              <tr>
                                                <th data-field="pernyataan_a" data-width="370">a</th>
                                                <th data-field="pernyataan_b" data-width="370">b</th>
                                                <th data-field="value_a">a</th>
                                                <th data-field="value_b">b</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <?php 
                                                foreach ($data as $val) {
                                                  $pernyataan = json_decode($val['pernyataan']);
                                                  $value = json_decode($val['value']);
                                                    echo "<tr>
                                                            <td>$val[id]</td>
                                                            <td>$pernyataan->a</td>
                                                            <td>$pernyataan->b</td>
                                                            <td>$value->a</td>
                                                            <td>$value->b</td>
                                                          </tr>";
                                                }                                                
                                              ?>
                                            </tbody>
                                          </table>
                                    </div>
                                </div>

                            </div> <!-- /.row -->

                            <div class="card-body"></div>
                            <div class="card-body"></div>
                        </div>

                    </div><!-- /# column -->
                </div>
            <!-- /#add-category -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->

        <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <h5 class="modal-title" id="myModalLabel">Form Tambah Soal</h5>
                </div>
                <div class="modal-body">
                  <form id="formSoal">
                    <input type="hidden" id="id">
                    <div class="form-group row">
                      <label  class="col-sm-3 col-form-label">Pernyataan</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" name="pernyataan_a" placeholder="Pernyataan a" data-bv-notempty="true" data-bv-notempty-message="Pernyataan tidak boleh kosong"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label  class="col-sm-3 col-form-label">Nilai</label>
                      <div class="col-sm-9">
                        <select class="selectpicker form-control" data-style="btn-outline-secondary" data-live-search="true" name="value_a" data-bv-notempty="true" data-bv-notempty-message="Role belum dipilih" multiple data-max-options="1" title=" - Pilih Role -">
                          <?php 
                            $cek='';
                            foreach ($data_roles as $value) {
                              if ($value['ket_aspek'] !== $cek) {
                                if ($cek != '') {
                                  echo "</optgroup>";
                                }
                                echo "<optgroup label='$value[ket_aspek]'>";
                              }
                                echo "<option value='$value[kode]' data-subtext='$value[keterangan]' title='($value[kode]) $value[keterangan]'>$value[kode]</option>'";

                                $cek = $value['ket_aspek'];
                            }
                            echo "</optgroup>";
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label  class="col-sm-3 col-form-label">Pernyataan</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" name="pernyataan_b" placeholder="Pernyataan b" data-bv-notempty="true" data-bv-notempty-message="Pernyataan tidak boleh kosong"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label  class="col-sm-3 col-form-label">Nilai</label>
                      <div class="col-sm-9">
                        <select class="selectpicker form-control" data-style="btn-outline-secondary" data-live-search="true" name="value_b" data-bv-notempty="true" data-bv-notempty-message="Role belum dipilih" multiple data-max-options="1" title=" - Pilih Role -">
                          <?php 
                            $cek='';
                            foreach ($data_roles as $value) {
                              if ($value['ket_aspek'] !== $cek) {
                                if ($cek != '') {
                                  echo "</optgroup>";
                                }
                                echo "<optgroup label='$value[ket_aspek]'>";
                              }
                                echo "<option value='$value[kode]' data-subtext='$value[keterangan]' title='($value[kode]) $value[keterangan]'>$value[kode]</option>'";

                                $cek = $value['ket_aspek'];
                            }
                            echo "</optgroup>";
                          ?>
                        </select>
                      </div>
                    </div>
                    
                  </form>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-info btn-icon-split" id="submitBtn">
                    <span class="icon text-white">
                      <i class="fa fa-save"></i>
                    </span>
                    <span class="text">Simpan</span>
                  </button>
                </div>
              </div>
            </div>
          </div>

        <?php $this->load->view('admin/footer'); ?>

<script>
  $(document)
 .ajaxStart(function () {
    //ajax request went so show the loading image
     $('.loading').fadeIn();
 })
.ajaxStop(function () {
   //got response so hide the loading image
    $('.loading').fadeOut();
});
</script>
<script type="text/javascript">
    $(document).ready(function(){
      $('.loading').fadeOut();
          $('#formSoal').bootstrapValidator({
                message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: '',
                validating: 'glyphicon glyphicon-refresh'
            },
            excluded: ':disabled'
          })
        })
</script>

<script type="text/javascript">
    function setModalTambah(){
        $('#formSoal').bootstrapValidator('resetForm', true);
        $('#formSoal').trigger("reset");

        $(".selectpicker").val('');
        $(".selectpicker").selectpicker("refresh");

        $('#myModal').modal();
        $('#myModalLabel').html("Form Tambah Soal");

        $('#submitBtn').html('<span class="icon text-white"><i class="fa fa-save"></i></span><span class="text"> Simpan</span>');
    }

    function tambah(){
        $('#formSoal').submit();
        var data = $('#formSoal').serializeArray();

        var pernyataan = {};
        var nilai = {};
        var send = [];
        $.each(data, function(k, v){
          var kode = v.name.substring(v.name.length - 1, v.name.length);
          var key = v.name.substring(0, v.name.length - 2);
          if (key == 'pernyataan') {
            pernyataan[kode] = v.value;
          }else
          if (key == 'value') {
            nilai[kode] = v.value;
          }

        })
        send.push({'name':'pernyataan','value':JSON.stringify(pernyataan)});
        send.push({'name':'value','value':JSON.stringify(nilai)});

        var hasErr = $('#formSoal').find(".has-error").length;

        if (hasErr == 0) {
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>"+"admin/manajemen",
                dataType: 'JSON',
                data: {manajemen:'tambah',form:'soal',data:send},
                success: function(res) {
                        if(res){
                            Swal.fire(
                                  'Berhasil!',
                                  'Data soal berhasil ditambahkan',
                                  'success'
                                )
                                setTimeout(function(){location.reload(); },500);
                        }
                    }
            });
        }
    }

    function update(){
        $('#formSoal').submit();
        var data = $('#formSoal').serializeArray();
        var id = $('input[id=id]').val();
        
        var pernyataan = {};
        var nilai = {};
        var send = [];
        $.each(data, function(k, v){
          var kode = v.name.substring(v.name.length - 1, v.name.length);
          var key = v.name.substring(0, v.name.length - 2);
          if (key == 'pernyataan') {
            pernyataan[kode] = v.value;
          }else
          if (key == 'value') {
            nilai[kode] = v.value;
          }

        })
        send.push({'name':'pernyataan','value':JSON.stringify(pernyataan)});
        send.push({'name':'value','value':JSON.stringify(nilai)});

        var hasErr = $('#formSoal').find(".has-error").length;

        if (hasErr == 0) {
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>"+"admin/manajemen",
                dataType: 'JSON',
                data: {manajemen:'update',form:'soal',id:id,data:send},
                success: function(res) {
                        if(res){
                            Swal.fire(
                                  'Berhasil!',
                                  'Data soal berhasil diubah',
                                  'success'
                                )
                                setTimeout(function(){location.reload(); },500);
                        }
                    }
            });
        }
    }

    $("#submitBtn").click(function (){
          var ButtonText = $.trim($(this).text());
          if (ButtonText == "Simpan") {
            tambah();
          }else 
          if(ButtonText == "Update"){
            update();
          }
     })

    function aksiFormatter(val){
        return ["<button data-toggle='tooltip' title='Ubah' class='ubah btn btn-info btn-sm'>",
                "<i class='fa fa-pencil'></i>",
                "</button>",
                "<button data-toggle='tooltip' title='Hapus' class='hapus btn btn-danger btn-sm'>",
                "<i class='fa fa-trash'></i>",
                "</button>"].join(' ');
    }

    window.aksiEvents = {
        'click .ubah': function (e, value, row, index) {
            $('#formSoal').bootstrapValidator('resetForm', true);
            $('#formSoal').trigger("reset");

            $('#myModal').modal();
            $('#myModalLabel').html("Form Ubah Soal");

            $('input[id=id]').val(row.id);
            $('textarea[name=pernyataan_a]').val(row.pernyataan_a);
            $('textarea[name=pernyataan_b]').val(row.pernyataan_b);
            $('select[name=value_a]').val(row.value_a);
            $('select[name=value_b]').val(row.value_b);
            $(".selectpicker").selectpicker("refresh");

            $('#submitBtn').html('<span class="icon text-white"><i class="fa fa-edit"></i></span><span class="text"> Update</span>');
        },
        'click .hapus': function (e, value, row, index) {
            swal.fire({
                title: "Warning",
                text: "Anda yakin untuk menghapus soal ini?",
                type: 'warning',
                showCancelButton: true,
                showCloseButton: false,
                cancelButtonColor: '#001473',
                confirmButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal'
            }).then(function(res){
                if(res.value){
                    jQuery.ajax({
                        type: "POST",
                        url: "<?php echo base_url() ?>"+"admin/manajemen",
                        dataType: "JSON",
                        data: {manajemen:"hapus",form:'soal',id:row.id},
                        success: function(res){
                            if (res === true) {
                                Swal.fire(
                                  'Berhasil!',
                                  'soal berhasil dihapus',
                                  'success'
                                )
                                setTimeout(function(){location.reload(); },500);
                            }
                        }
                    });
                }
            });
        }
    }
</script>

</body>
</html>