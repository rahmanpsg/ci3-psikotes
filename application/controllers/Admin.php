<?php 
/**
* 
*/
class Admin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');

		if (!$this->session->has_userdata('username')) {
	            redirect(base_url());
        }
        if ($this->session->userdata('level') == 'user') {
            redirect('user/');
        }
	}

	function index(){
		$data['t_user'] = $this->Admin_model->cekTotalData('tbl_user');
		$data['t_jawab'] = $this->Admin_model->cekTotalData('tbl_uji');
		$data['t_pekerjaan'] = $this->Admin_model->cekTotalData('tbl_pekerjaan');
		$this->load->view('admin/index',$data);
	}

	function peserta(){
		$data['data'] = $this->Admin_model->query("SELECT a.*, b.nama as pekerjaan, (CASE WHEN c.status IS NULL THEN 'Belum' ELSE c.status END) as status FROM tbl_user a LEFT JOIN tbl_pekerjaan b ON a.id_pekerjaan = b.id LEFT JOIN tbl_uji c ON a.username = c.username");
		$data['data_pekerjaan'] = $this->Admin_model->ambilData('tbl_pekerjaan');
		$this->load->view('admin/peserta',$data);
	}

	function cekData(){
		$data = $this->input->post('data');

		$keys = array_column($this->input->post('data'),'name');
		$values = array_column($this->input->post('data'),'value');

		$where = array_combine($keys, $values);

		$cek = $this->Admin_model->cekData('tbl_user',$where);

		if ($cek > 0) {
			echo json_encode(true);
		}else{
			echo json_encode(false);
		}
	}

	function hasil_tes(){
		$username = $this->input->post('username');

		$cek = $this->Admin_model->cekData('tbl_uji', array('username'=>$username));

		if ($cek > 0) {		
			$res = $this->Admin_model->query("SELECT a.nama, a.nik, b.nama as pekerjaan, c.jawaban, c.hasil, c.waktu, c.status FROM tbl_user a LEFT JOIN tbl_pekerjaan b ON a.id_pekerjaan = b.id LEFT JOIN tbl_uji c ON a.username = c.username WHERE a.username = '$username'")[0];

			$waktu = json_decode($res['waktu']);
			$hasil = json_decode($res['hasil']);

			$data_papi = $this->Admin_model->query("SELECT a.keterangan as ket_aspek, b.kode, b.keterangan as ket_role FROM tbl_aspek a LEFT JOIN tbl_roles b ON a.id = b.id_aspek");

			$radar_set = $this->Admin_model->radarSet($data_papi, $hasil);

			$table_set = $this->Admin_model->table_set($data_papi, $hasil, $res['pekerjaan']);

			$percent_set = $this->Admin_model->percent_set($hasil);

			$kecocokan_pekerjaan = $this->Admin_model->kecocokan_pekerjaan($percent_set);

			$data_soal = $this->Admin_model->ambilField('tbl_soal', 'pernyataan');

			$i = 1;
			foreach ($data_soal as $key => $value) {
				$pernyataan[] = json_decode($value['pernyataan']);
			}


			foreach (json_decode($res['jawaban']) as $key => $value) {
				$res_jawaban[$key] = '<b>('.$value.')</b> '.$pernyataan[$key - 1]->$value;
			}

			$data['nama'] = $res['nama'];
			$data['nik'] = $res['nik'];
			$data['pekerjaan'] = $res['pekerjaan'];
			$data['waktu_mulai'] = $this->Admin_model->tgl_indo(date('Y-m-d H:i:s',strtotime($waktu[0])));
			$data['waktu_selesai'] = $this->Admin_model->tgl_indo(date('Y-m-d H:i:s',strtotime($waktu[1])));
			$data['radar_set'] = $radar_set;
			$data['table_set'] = $table_set;
			$data['jawaban'] = $res_jawaban;
			$data['percent'] = $percent_set;
			$data['kecocokan_pekerjaan'] = $kecocokan_pekerjaan;

			$this->load->view('admin/hasil_tes',$data);
		}else{
			redirect(base_url());
		}
	}

	function soal(){
		$data['data'] = $this->Admin_model->ambilData('tbl_soal');
		$data['data_roles'] = $this->Admin_model->query("SELECT a.*, b.keterangan as ket_aspek FROM tbl_roles a LEFT JOIN tbl_aspek b ON a.id_aspek = b.id ORDER BY a.id_aspek");
		$this->load->view('admin/soal',$data);
	}

	function pekerjaan(){
		$data['data'] = $this->Admin_model->ambilData('tbl_pekerjaan');
		$data['data_roles'] = $this->Admin_model->query("SELECT a.*, b.keterangan as ket_aspek FROM tbl_roles a LEFT JOIN tbl_aspek b ON a.id_aspek = b.id ORDER BY a.id_aspek");
		$this->load->view('admin/pekerjaan',$data);
	}

	function manajemen(){
		if ($this->input->post('manajemen') !== NULL) {
			$form = $this->input->post('form');
			if($this->input->post('manajemen') == 'tambah'){
				$data = $this->input->post('data');

				$keys = array_column($this->input->post('data'),'name');
				$values = array_column($this->input->post('data'),'value');

				$tambah = $this->Admin_model->setTambah('tbl_'.$form,array_combine($keys, $values));

				echo json_encode($tambah);
			}else
			if($this->input->post('manajemen') == 'update'){
				$id = $this->input->post('id');
				$data = $this->input->post('data');

				$keys = array_column($this->input->post('data'),'name');
				$values = array_column($this->input->post('data'),'value');

				$where = array('id'=>$id);
		        $update = $this->Admin_model->setUpdate(array_combine($keys, $values),$where,'tbl_'.$form);

				echo json_encode($update);
			}else
			if ($this->input->post('manajemen') == "hapus") {
				$id = $this->input->post('id');

				$where = array('id'=>$id);
                $hapus = $this->Admin_model->setHapus('tbl_'.$form,$where);

                echo json_encode($hapus);
			}
		}else{
			redirect('admin');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
 ?>