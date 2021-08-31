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
                        <div class="card" id="div_pekerjaan">
                            <div class="card-body">
                                <h4 class="box-title">DATA PEKERJAAN </h4>
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
                                                <th data-field="no" data-formatter="indexFormatter" class="font-14 text-center">No</th>
                                                <th data-field="id" class="font-14 text-center" data-visible="false"></th>
                                                <th data-field="nama" class="font-14">Nama</th>
                                                <th data-field="role" data-formatter="roleFormatter" class="font-14">Role</th>
                                                <th data-field="aksi" data-formatter="aksiFormatter" data-events="window.aksiEvents" class="text-center">Aksi</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <?php 
                                                foreach ($data as $val) {
                                                    echo "<tr>
                                                            <td></td>
                                                            <td>$val[id]</td>
                                                            <td>$val[nama]</td>
                                                            <td>$val[role]</td>
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
                  <h5 class="modal-title" id="myModalLabel">Form Tambah Pekerjaan</h5>
                </div>
                <div class="modal-body">
                  <form id="formPekerjaan">
                    <input type="hidden" id="id">
                    <div class="form-group row">
                      <label  class="col-sm-3 col-form-label">Nama</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama" placeholder="Nama Pekerjaan" data-bv-notempty="true" data-bv-notempty-message="Nama pekerjaan tidak boleh kosong">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label  class="col-sm-3 col-form-label">Role</label>
                      <div class="col-sm-9">
                        <select class="selectpicker form-control" data-style="btn-outline-secondary" data-live-search="true" name="role" data-bv-notempty="true" data-bv-notempty-message="Role belum dipilih" multiple title=" - Pilih Role -">
                          <?php 
                            $cek='';
                            foreach ($data_roles as $value) {
                              if ($value['ket_aspek'] !== $cek) {
                                if ($cek != '') {
                                  echo "</optgroup>";
                                }
                                echo "<optgroup label='$value[ket_aspek]'>";
                              }
                                echo "<option value='$value[kode]' data-subtext='$value[keterangan]'>$value[kode]</option>'";

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
          $('#formPekerjaan').bootstrapValidator({
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
        $('#formPekerjaan').bootstrapValidator('resetForm', true);
        $('#formPekerjaan').trigger("reset");

        $(".selectpicker").val('');
        $(".selectpicker").selectpicker("refresh");

        $('#myModal').modal();
        $('#myModalLabel').html("Form Tambah Pekerjaan");

        $('#submitBtn').html('<span class="icon text-white"><i class="fa fa-save"></i></span><span class="text"> Simpan</span>');
    }

    function tambah(){
        $('#formPekerjaan').submit();
        var data = $('#formPekerjaan').serializeArray();

        var role = [];
        $.each(data, function(k, v){
          if (v.name == 'role') {
            role.push(v.value);
          }
        })

        data = jQuery.grep(data, function(value) {
          return value['name'] != 'role';
        });

        data.push({'name':'role', 'value':JSON.stringify(role)});

        var hasErr = $('#formPekerjaan').find(".has-error").length;

        if (hasErr == 0) {
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>"+"admin/manajemen",
                dataType: 'JSON',
                data: {manajemen:'tambah',form:'pekerjaan',data:data},
                success: function(res) {
                        if(res){
                            Swal.fire(
                                  'Berhasil!',
                                  'Data pekerjaan berhasil ditambahkan',
                                  'success'
                                )
                                setTimeout(function(){location.reload(); },500);
                        }
                    }
            });
        }
    }

    function update(){
        $('#formPekerjaan').submit();
        var data = $('#formPekerjaan').serializeArray();
        var id = $('input[id=id]').val();
        
        var role = [];
        $.each(data, function(k, v){
          if (v.name == 'role') {
            role.push(v.value);
          }
        })

        data = jQuery.grep(data, function(value) {
          return value['name'] != 'role';
        });

        data.push({'name':'role', 'value':JSON.stringify(role)});

        var hasErr = $('#formPekerjaan').find(".has-error").length;

        if (hasErr == 0) {
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>"+"admin/manajemen",
                dataType: 'JSON',
                data: {manajemen:'update',form:'pekerjaan',id:id,data:data},
                success: function(res) {
                        if(res){
                            Swal.fire(
                                  'Berhasil!',
                                  'Data pekerjaan berhasil diubah',
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

    function indexFormatter(val,row,index){
        return index+1;
    }

    function roleFormatter(val,row,index){
        return JSON.parse(val).join(', ');
    }

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
            $('#formPekerjaan').bootstrapValidator('resetForm', true);
            $('#formPekerjaan').trigger("reset");

            $('#myModal').modal();
            $('#myModalLabel').html("Form Ubah Pekerjaan");

            $('input[id=id]').val(row.id);
            $('input[name=nama]').val(row.nama);
            $('select[name=role]').val(JSON.parse(row.role));
            $(".selectpicker").selectpicker("refresh");

            $('#submitBtn').html('<span class="icon text-white"><i class="fa fa-edit"></i></span><span class="text"> Update</span>');
        },
        'click .hapus': function (e, value, row, index) {
            swal.fire({
                title: "Warning",
                text: "Anda yakin untuk menghapus " + row.nama +"?",
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
                        data: {manajemen:"hapus",form:'pekerjaan',id:row.id},
                        success: function(res){
                            if (res === true) {
                                Swal.fire(
                                  'Berhasil!',
                                  'Pekerjaan berhasil dihapus',
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