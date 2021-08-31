<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V8</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login_v8/vendor/bootstrap/css/bootstrap.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login_v8/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login_v8/vendor/animate/animate.css') ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login_v8/vendor/css-hamburgers/hamburgers.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login_v8/vendor/animsition/css/animsition.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login_v8/vendor/select2/select2.min.css') ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login_v8/vendor/daterangepicker/daterangepicker.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login_v8/css/util.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login_v8/css/main.css') ?>">
	<link href="<?php echo base_url('asset/vendor/bootstrap-table/bootstrap-table.min.css'); ?>" rel="stylesheet">
<!--===============================================================================================-->
	<style type="text/css">
		table {
		    border-collapse: collapse;
		    width: 100%;
		    table-layout: fixed;
		}

		th, td {
		    text-align: center;
		    padding: 8px;
		}

		tr:nth-child(even){background-color: transparent;}

		th {
		    background-color: #2878fa;
		    color: white;
		}

		/* The container */
		.container {
		    display: block;
		    position: relative;
		    padding-left: 40px;
		    margin-bottom: 12px;
		    cursor: pointer;
		    font-size: 16px;
		    -webkit-user-select: none;
		    -moz-user-select: none;
		    -ms-user-select: none;
		    user-select: none;
		}
		/* Hide the browser's default radio button */
		.container input {
		    position: absolute;
		    opacity: 0;
		    cursor: pointer;
		}
		.checkmark {
		    position: absolute;
		    top: 0;
		    left: 0;
		    height: 20px;
		    width: 20px;
		    background-color: #eee;
		    border-radius: 50%;
		}
		/* On mouse-over, add a grey background color */
		.container:hover input ~ .checkmark {
		  background-color: #ccc;
		}

		/* When the radio button is checked, add a blue background */
		.container input:checked ~ .checkmark {
		  background-color: #2878fa;
		}

		/* Create the indicator (the dot/circle - hidden when not checked) */
		.checkmark:after {
		  content: "";
		  position: absolute;
		  display: none;
		}

		/* Show the indicator (dot/circle) when checked */
		.container input:checked ~ .checkmark:after {
		  display: block;
		}

		/* Style the indicator (dot/circle) */
		.container .checkmark:after {
		  top: 7px;
		  left: 7px;
		  width: 6px;
		  height: 6px;
		  border-radius: 50%;
		  background: white;
		}

				.funkyradio div {
		  clear: both;
		  overflow: hidden;
		}

		.funkyradio label {
		  width: 90%;
		  border-radius: 3px;
		  border: 1px solid #D1D3D4;
		  font-weight: normal;
		}

		.funkyradio input[type="radio"]:empty,
		.funkyradio input[type="checkbox"]:empty {
		  display: none;
		}

		.funkyradio input[type="radio"]:empty ~ label,
		.funkyradio input[type="checkbox"]:empty ~ label {
		  position: relative;
		  line-height: 2em;
		  text-indent: 3em;
		  margin-top: 0em;
		  cursor: pointer;
		  -webkit-user-select: none;
		     -moz-user-select: none;
		      -ms-user-select: none;
		          user-select: none;
		}


		.funkyradio input[type="radio"]:empty ~ label:before,
		.funkyradio input[type="checkbox"]:empty ~ label:before {
		  position: absolute;
		  display: block;
		  top: 0;
		  bottom: 0;
		  left: 0;
		  content: '';
		  width: 2.5em;
		  background: #D1D3D4;
		  border-radius: 3px 0 0 3px;
		}

		.funkyradio input[type="radio"]:hover:not(:checked) ~ label,
		.funkyradio input[type="checkbox"]:hover:not(:checked) ~ label {
		  color: #888;
		}

		.funkyradio input[type="radio"]:hover:not(:checked) ~ label:before,
		.funkyradio input[type="checkbox"]:hover:not(:checked) ~ label:before {
		  content: '\2714';
		  text-indent: .9em;
		  color: #C2C2C2;
		}

		.funkyradio input[type="radio"]:checked ~ label,
		.funkyradio input[type="checkbox"]:checked ~ label {
		  color: #777;
		}

		.funkyradio input[type="radio"]:checked ~ label:before,
		.funkyradio input[type="checkbox"]:checked ~ label:before {
		  content: '\2714';
		  text-indent: .9em;
		  color: #333;
		  background-color: #ccc;
		}

		.funkyradio input[type="radio"]:focus ~ label:before,
		.funkyradio input[type="checkbox"]:focus ~ label:before {
		  box-shadow: 0 0 0 3px #999;
		}

		.funkyradio-success input[type="radio"]:checked ~ label:before,
		.funkyradio-success input[type="checkbox"]:checked ~ label:before {
		  color: #fff;
		  background-color: #5cb85c;
		}
	</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form validate-form p-l-10 p-r-10 p-t-178">
					<span class="login100-form-title">
						PSIKOTES PAPI KOSTICK
						<br><h5>Waktu anda <div id="waktu"></div></h5>
					</span>

					<!-- <div class="model-jawaban2 m-b-15" data-validate="Jawaban belum dipilih"> -->
						<table class="table table-responsive-lg" id="table" data-pagination="true" data-page-size="3" data-page-list="[3,5]" data-pagination-pre-text="Kembali" data-pagination-next-text="Selanjutnya" data-pagination-detail-h-align="right" data-pagination-loop="false">
							<thead>
								<th data-field="no" data-width="50">NO</th>
								<th data-field="pernyataan" data-formatter="pernyataanFormatter">PERNYATAAN</th>
							</thead>
							<tbody>
								<?php 
									foreach ($soal as $key => $value) {
										echo "<tr>
												<td>$value[id]</td>
												<td>$value[pernyataan]</td>
											  </tr>";
									}
								?>								
							</tbody>
						</table>
						<div class="m-b-15 p-r-10 text-right" id="div_submit">
							<button class="btn btn-primary btn-icon-split" id="btn_submit">
			                    <span class="icon text-white-50">
			                      <i class="fa fa-send"></i>
			                    </span>
			                    <span class="text">Submit</span>
			                 </button>
						</div>					
				</div>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login_v8/vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login_v8/vendor/animsition/js/animsition.min.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login_v8/vendor/bootstrap/js/popper.js') ?>"></script>
	<script src="<?php echo base_url('assets/login_v8/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login_v8/vendor/select2/select2.min.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login_v8/vendor/daterangepicker/moment.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/login_v8/vendor/daterangepicker/daterangepicker.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login_v8/vendor/countdowntime/countdowntime.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login_v8/js/main.js') ?>"></script>
	<script src="<?php echo base_url('asset/vendor/bootstrap-table/bootstrap-table.min.js'); ?>"></script>
    <script src="<?php echo base_url('asset/vendor/jquery-session/jquery-session.js'); ?>"></script>
    <script src="<?php echo base_url('asset/js/sweetalert2.all.min.js')?>"></script>


	<script type="text/javascript">
		var waktu_selesai = new Date("<?php echo $this->session->userdata('waktu_selesai'); ?>").getTime();

		// Update the count down every 1 second
		var x = setInterval(function() {

		  // Get today's date and time
		  var now = new Date().getTime();
		    
		  // Find the distance between now and the count down date
		  var distance = waktu_selesai - now;
		    
		  // Time calculations for days, hours, minutes and seconds
		  // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		  // var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
		    
		  // If the count down is over, write some text 
		  if (distance < 0) {
		    clearInterval(x);
		    // document.getElementById("demo").innerHTML = "EXPIRED";

		    var allJawaban = JSON.parse($.session.get("jawaban"));
		    jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>"+"user/jawab",
                dataType: 'JSON',
                data: {jawaban:allJawaban, status:'Gagal'},
                success: function(res) {
                    if(res){
                        Swal.fire(
                              'Gagal!',
                              'Waktu anda telah habis',
                              'warning'
                            )
                        $.session.clear();
                    }
                }
            });

		  }else{
		  	$('#waktu').text(minutes + " menit : " + seconds + " detik");
		  }
		}, 1000);
	</script>

	<script type="text/javascript">
		$(function () {
			$('#table').bootstrapTable({
		  	formatRecordsPerPage: function () {
		    	return ''
		    },
			  formatShowingRows: function () {
			    return ''
		    }
		  })
		})

		$('#table').on('page-change.bs.table', function (e, number, size) {
			if ($.session.get("jawaban") !== undefined) {
				var allJawaban = JSON.parse($.session.get("jawaban"));

				$.each(allJawaban, function(key, val) {
					$('input:radio[name="'+key+'"][value="'+val+'"]').prop('checked', true);
				})
			}

			$.session.set("page", number);

			if (number == 30) {
				$('#div_submit').show();
			}
		})

		$('#table').on('post-body.bs.table', function (data) {
			if ($.session.get("jawaban") !== undefined) {
				var allJawaban = JSON.parse($.session.get("jawaban"));

				$.each(allJawaban, function(key, val) {
					$('input:radio[name="'+key+'"][value="'+val+'"]').prop('checked', true);
				})
			}
		})

		$(document).ready(function(){
			// $.session.clear();

			$.session._init("<?php echo $username; ?>");

			// console.log($.session._generatePrefix());

			$('#div_submit').hide();

			if ($.session.get("page") !== undefined) {
				$('#table').bootstrapTable('selectPage', $.session.get("page"));
			}
		})
	</script>

	<script type="text/javascript">
		function pernyataanFormatter(val,index){
			var soal = JSON.parse(val);
			var html = [];

			$.each(soal, function(key, val){
				html.push("<label class='container text-left'>" + val +"<input type='radio' name='" + index.no +"' id='ya' value='" + key + "' onchange='updateJawaban(this)'><span class='checkmark'></span></label>");
			})

			return html.join('');
		}

		function updateJawaban(data) {
			if ($.session.get("jawaban") == undefined) {
				var key = data.name;
				var val = data.value;
				var array = {};

				array[key] = val;

				var jawaban = JSON.stringify(array);

				$.session.set("jawaban", jawaban);			
			}else{
				var allJawaban = JSON.parse($.session.get("jawaban"));
				var key = data.name;
				var val = data.value;
				var array = {};

				allJawaban[key] = val;

				var jawaban = JSON.stringify(allJawaban);

				$.session.set("jawaban", jawaban);
			}
		}

		$('#btn_submit').on('click', function(e){
			if ($.session.get("jawaban") !== undefined) {
				var total;
				var belum = [];
				var allJawaban = JSON.parse($.session.get("jawaban"));

				for (var i = 1; i <= 90; i++) {
					if(allJawaban[i] == undefined || allJawaban[i] == ''){
						belum.push(i);
					}
				}

				if (belum.length > 0) {
					Swal.fire(
	                  'Anda Belum Menjawab',
	                  belum.join(', '),
	                  'error'
	                )
				}else{
					jQuery.ajax({
	                    type: "POST",
	                    url: "<?php echo base_url() ?>"+"user/jawab",
	                    dataType: 'JSON',
	                    data: {jawaban:allJawaban, status: 'Berhasil'},
	                    success: function(res) {
	                        if(res){
	                            Swal.fire(
	                                  'Berhasil!',
	                                  'Semua pernyataan berhasil di jawab',
	                                  'success'
	                                )
	                            $.session.clear();
	                            setTimeout(function(){window.location = "<?php echo base_url() ?>" + "user/hasil_tes"; },500);
	                        }
	                    }
	                });
				}
			}else{
				Swal.fire(
	                  'Error!',
	                  'Jawab semua jawaban terlebih dahulu',
	                  'error'
	                )
			}
		})
	</script>
</body>
</html>