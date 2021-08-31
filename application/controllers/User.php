<?php 
/**
* 
*/
class User extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');

		if (!$this->session->has_userdata('username')) {
	            redirect(base_url());
        }
        if ($this->session->userdata('level') == 'admin') {
            redirect('admin/');
        }
	}

	function index(){
		$username = $this->session->userdata('username');
		$data['data'] = $this->User_model->query("SELECT a.nama, a.nik, b.nama as pekerjaan FROM tbl_user a LEFT JOIN tbl_pekerjaan b ON a.id_pekerjaan = b.id WHERE a.username = '$username'")[0];
		$this->load->view('user/index',$data);
	}

	function cek_tes(){
		$username = $this->session->userdata('username');

		$cek = $this->User_model->cekData('tbl_uji',array('username'=>$username));

		echo json_encode($cek);
	}

	function mulai_tes(){
		$username = $this->session->userdata('username');
		$cek = $this->User_model->cekData('tbl_uji', array('username'=>$username));

		if ($cek == 0) {		
			if ($this->session->userdata('waktu_selesai') === NULL) {
				date_default_timezone_set('Asia/Makassar');
				$waktu_mulai = date("M d, Y h:i:s");
		    	$waktu_selesai = date("M d, Y H:i:s", strtotime("+1 hours"));

		    	$this->session->set_userdata(array('waktu_mulai'=>$waktu_mulai, 'waktu_selesai'=>$waktu_selesai));

			}

			$soal = $this->User_model->ambilData('tbl_soal');

			$data['username'] = $username = $this->session->userdata('username');
			$data['soal'] = $soal;
			$this->load->view('user/tes_papi',$data);
		}else{
			redirect(base_url('user/hasil_tes'));
		}
	}

	function jawab(){
		$username = $this->session->userdata('username');
		$jawaban = $this->input->post('jawaban');
		$status = $this->input->post('status');

		date_default_timezone_set('Asia/Makassar');
		$waktu_mulai = $this->session->userdata('waktu_mulai');
		$waktu_selesai = date("M d, Y h:i:s");

		$waktu = array($waktu_mulai, $waktu_selesai);

		//== Proses perhitungan PAPI KOSTICK ==//

		$data = $this->User_model->ambilData('tbl_soal');

		foreach ($data as $value) {
			$rule[] = json_decode($value['value']);
		}

		for ($i=0; $i < count($rule); $i++) { 
			$jwbn = $jawaban[$i+1];
			$role[] = $rule[$i]->$jwbn;
		}

		$hasil = array_count_values($role);

		ksort($hasil);

		//==================================//

		$tambah = array('username'=>$username,
						'jawaban'=>json_encode($jawaban),
						'hasil'=>json_encode($hasil),
						'waktu'=>json_encode($waktu),
						'status'=>$status);

		$res = $this->User_model->setTambah('tbl_uji',$tambah);

		echo json_encode($res);
	}

	function cek_hasil_tes(){
		$username = $this->session->userdata('username');

		$cek = $this->User_model->cekData('tbl_uji', array('username'=>$username));

		echo json_encode($cek);
	}

	function hasil_tes(){
		$username = $this->session->userdata('username');

		$cek = $this->User_model->cekData('tbl_uji', array('username'=>$username));

		if ($cek > 0) {		
			$res = $this->User_model->query("SELECT a.nama, a.nik, b.nama as pekerjaan, c.hasil, c.waktu, c.status FROM tbl_user a LEFT JOIN tbl_pekerjaan b ON a.id_pekerjaan = b.id LEFT JOIN tbl_uji c ON a.username = c.username WHERE a.username = '$username'")[0];

			$waktu = json_decode($res['waktu']);
			$hasil = json_decode($res['hasil']);

			$data_papi = $this->User_model->query("SELECT a.keterangan as ket_aspek, b.kode, b.keterangan as ket_role FROM tbl_aspek a LEFT JOIN tbl_roles b ON a.id = b.id_aspek");

			$radar_set = $this->User_model->radarSet($data_papi, $hasil);

			$table_set = $this->User_model->table_set($data_papi, $hasil, $res['pekerjaan']);

			$percent_set = $this->User_model->percent_set($hasil);

			$kecocokan_pekerjaan = $this->User_model->kecocokan_pekerjaan($percent_set);

			$data['nama'] = $res['nama'];
			$data['nik'] = $res['nik'];
			$data['pekerjaan'] = $res['pekerjaan'];
			$data['waktu_mulai'] = $this->User_model->tgl_indo(date('Y-m-d H:i:s',strtotime($waktu[0])));
			$data['waktu_selesai'] = $this->User_model->tgl_indo(date('Y-m-d H:i:s',strtotime($waktu[1])));
			$data['radar_set'] = $radar_set;
			$data['table_set'] = $table_set;
			$data['percent'] = $percent_set;
			$data['kecocokan_pekerjaan'] = $kecocokan_pekerjaan;
			$this->load->view('user/hasil_tes',$data);
		}else{
			redirect(base_url());
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
 ?>