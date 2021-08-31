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
                        <div class="card" id="div_peserta">
                            <div class="card-body">
                                <h4 class="box-title">DATA PESERTA </h4>
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
                                                <th data-field="nama" class="font-14">Nama</th>
                                                <th data-field="username" class="font-14">Username</th>
                                                <th data-field="email" class="font-14">Email</th>
                                                <th data-field="nik" class="font-14">Nik</th>
                                                <th data-field="pekerjaan" class="font-14">Pekerjaan</th>
                                                <th data-field="id_pekerjaan" data-visible="false" class="font-14"></th>
                                                <th data-field="password" data-visible="false" class="font-14"></th>
                                                <th data-field="status" data-visible="false" class="font-14"></th>
                                                <th data-field="id" data-visible="false" class="font-14"></th>
                                                <th data-field="aksi" data-formatter="aksiFormatter" data-events="window.aksiEvents" class="text-center">Aksi</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <?php 
                                                foreach ($data as $val) {
                                                    echo "<tr>
                                                            <td></td>
                                                            <td>$val[nama]</td>
                                                            <td>$val[username]</td>
                                                            <td>$val[email]</td>
                                                            <td>$val[nik]</td>
                                                            <td>$val[pekerjaan]</td>
                                                            <td>$val[id_pekerjaan]</td>
                                                            <td>$val[password]</td>
                                                            <td>$val[status]</td>
                                                            <td>$val[id]</td>
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
                  <h5 class="modal-title" id="myModalLabel">Form Tambah Peserta</h5>
                </div>
                <div class="modal-body">
                  <form id="formPeserta">
                    <input type="hidden" id="id">
                    <input type="hidden" id="default_username">
                    <input type="hidden" id="default_email">
                    <div class="form-group row">
                      <label  class="col-sm-3 col-form-label">Nama</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama" placeholder="Nama Peserta" data-bv-notempty="true" data-bv-notempty-message="Nama Peseta tidak boleh kosong">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label  class="col-sm-3 col-form-label">Username</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="username" placeholder="Username" data-bv-notempty="true" data-bv-notempty-message="Username tidak boleh kosong">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" name="email" placeholder="Email" data-bv-notempty="true" data-bv-notempty-message="Email tidak boleh kosong">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputNotelp" class="col-sm-3 col-form-label">Nik</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="nik" placeholder="Nik" maxlength="16" data-bv-notempty="true" data-bv-notempty-message="NIK tidak boleh kosong">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Pekerjaan</label>
                      <div class="col-sm-9">
                        <select class="selectpicker form-control" data-style="btn-outline-secondary" data-live-search="true" name="id_pekerjaan" data-bv-notempty="true" data-bv-notempty-message="Pekerjaan belum dipilih" multiple data-max-options="1" title=" - Pilih Pekerjaan -">
                          <?php 
                            foreach ($data_pekerjaan as $value) {
                                echo "<option value='$value[id]'>$value[nama]</option>'";
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputNotelp" class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" name="password" placeholder="Password" data-bv-notempty="true" data-bv-notempty-message="Password tidak boleh kosong">
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
        <script src="<?php echo base_url('assets/js/d3.min.js') ?>" charset="utf-8"></script>
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
          $('#formPeserta').bootstrapValidator({
                message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: '',
                validating: 'glyphicon glyphicon-refresh'
            },
            excluded: ':disabled',
            fields: {
                    nik: {
                      message: 'NIK tidak valid',
                        validators: {
                            notEmpty: {
                                message: 'NIK tidak boleh kosong'
                            },
                            regexp: {
                                regexp: /^[0-9]+$/,
                                message: 'NIK tidak valid'
                            },
                            callback: {
                              callback: function(value, validator, $fields){
                                if (value == '') {
                                    return true;
                                }

                                var regex = new RegExp(/^[0-9]+$/);

                                if (!regex.test(value)) {
                                  return true;
                                }else
                                if (value.length != 16) {
                                  return{
                                    return: false,
                                    message: 'NIK harus 16 karakter'
                                  }
                                }

                                return true;
                              }
                          }
                      }
                    },
                    email: {
                      message: 'Email telah digunakan',
                      validators: {
                        emailAddress: {
                          message: 'Masukkan email yang valid'
                        },
                        callback: {
                            callback: function(value, validator, $fields){
                              if (value == '') {
                                  return true;
                              }

                              if (value != $('input[id=default_email]').val()) {
                                  var send = [{'name':'email'},{'value':value}]
                                  jQuery.ajax({
                                        type: "POST",
                                        url: "<?php echo base_url() ?>"+"admin/cekData",
                                        dataType: 'json',
                                        data: {data:send},
                                        success: function(res) {
                                          if (res == true) {
                                            $('#formPeserta').bootstrapValidator('updateStatus', 'email', 'INVALID', 'callback')
                                                            .bootstrapValidator('validateField', 'email');
                                          }
                                        }
                                  })
                              }
                              return true;
                            }
                        }
                      }
                    },
                    username: {
                      message: 'Username telah digunakan',
                      validators: {
                        stringLength: {
                          min: 6,
                          message: 'Username harus lebih dari 6 karakter'
                        },
                        callback: {
                            callback: function(value, validator, $fields){
                              if (value == '') {
                                  return true;
                              }

                              if (value != $('input[id=default_username]').val()) {
                                  var send = [{'name':'username'},{'value':value}]
                                  jQuery.ajax({
                                        type: "POST",
                                        url: "<?php echo base_url() ?>"+"admin/cekData",
                                        dataType: 'json',
                                        data: {data:send},
                                        success: function(res) {
                                          if (res == true) {
                                            $('#formPeserta').bootstrapValidator('updateStatus', 'username', 'INVALID', 'callback')
                                                            .bootstrapValidator('validateField', 'username');
                                          }
                                        }
                                  })
                              }

                              return true;
                            }
                        }
                      }
                    },
                    password: {
                      message: 'Password tidak valid',
                      validators: {
                        stringLength: {
                          min: 6,
                          message: 'Password harus lebih dari 6 karakter'
                        }
                      }
                    }
                  }
          })
        })
</script>

<script type="text/javascript">
    function setModalTambah(){
        $('#formPeserta').bootstrapValidator('resetForm', true);
        $('#formPeserta').trigger("reset");

        $(".selectpicker").val('');
        $(".selectpicker").selectpicker("refresh");

        $('#myModal').modal();
        $('#myModalLabel').html("Form Tambah Peserta");

        $('#submitBtn').html('<span class="icon text-white"><i class="fa fa-save"></i></span><span class="text"> Simpan</span>');
    }

    function tambah(){
        $('#formPeserta').submit();

        var data = $('#formPeserta').serializeArray();

        var hasErr = $('#formPeserta').find(".has-error").length;

        if (hasErr == 0) {
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>"+"admin/manajemen",
                dataType: 'JSON',
                data: {manajemen:'tambah',form:'user',data:data},
                success: function(res) {
                        if(res){
                            Swal.fire(
                                  'Berhasil!',
                                  'Data peserta berhasil ditambahkan',
                                  'success'
                                )
                                setTimeout(function(){location.reload(); },500);
                        }
                    }
            });
        }
    }

    function update(){
        $('#formPeserta').submit();
        var data = $('#formPeserta').serializeArray();
        var id = $('input[id=id]').val();

        var hasErr = $('#formPeserta').find(".has-error").length;

        if (hasErr == 0) {
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>"+"admin/manajemen",
                dataType: 'JSON',
                data: {manajemen:'update',form:'user',id:id,data:data},
                success: function(res) {
                        if(res){
                            Swal.fire(
                                  'Berhasil!',
                                  'Data peserta berhasil diubah',
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

    function aksiFormatter(val){
        return ["<button data-toggle='tooltip' title='Lihat Hasil' class='lihat btn btn-primary btn-sm'>",
                "<i class='fa fa-eye'></i>",
                "</button>",
                "<button data-toggle='tooltip' title='Ubah' class='ubah btn btn-info btn-sm'>",
                "<i class='fa fa-pencil'></i>",
                "</button>",
                "<button data-toggle='tooltip' title='Hapus' class='hapus btn btn-danger btn-sm'>",
                "<i class='fa fa-trash'></i>",
                "</button>"].join(' ');
    }

    window.aksiEvents = {
        'click .lihat': function(e, value, row, index){
            if (row.status == 'Belum') {
                Swal.fire(
                  'Warning',
                  'Peserta belum melakukan tes',
                  'warning'
                )
            }else
            if (row.status == 'Gagal') {
                Swal.fire(
                  'Gagal!',
                  'Peserta gagal melakukan tes',
                  'error'
                )
            }else
            if (row.status == 'Berhasil') {
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>"+"admin/hasil_tes",
                    dataType: "HTML",
                    data: {username:row.username},
                    success: function(res){
                        $('#div_peserta').html(res);
                    }
                });
            }
        },
        'click .ubah': function (e, value, row, index) {
            $('#formPeserta').bootstrapValidator('resetForm', true);
            $('#formPeserta').trigger("reset");

            $('#myModal').modal();
            $('#myModalLabel').html("Form Ubah Peserta");

            $('input[id=id]').val(row.id);
            $('input[name=username]').val(row.username);
            $('input[id=default_username]').val(row.username);
            $('input[name=nama]').val(row.nama);
            $('input[name=email]').val(row.email);
            $('input[id=default_email]').val(row.email);
            $('input[name=nik]').val(row.nik);
            $('select[name=id_pekerjaan]').val(row.id_pekerjaan);
            $('input[name=password]').val(row.password);
            $(".selectpicker").selectpicker("refresh");

            $('#submitBtn').html('<span class="icon text-white"><i class="fa fa-edit"></i></span><span class="text"> Update</span>');
        },
        'click .hapus': function (e, value, row, index) {
            swal.fire({
                title: "Warning",
                text: "Anda yakin untuk menghapus "+row.nama+" ?",
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
                        data: {manajemen:"hapus",form:'user',id:row.id},
                        success: function(res){
                            if (res === true) {
                                Swal.fire(
                                  'Berhasil!',
                                  'Peserta berhasil dihapus',
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