<?php 
/**
* 
*/
class Home extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');


        if ($this->session->userdata('level') == 'admin') {
            redirect('admin/');
        }else
        if ($this->session->userdata('level') == 'user'){
        	redirect('user/');
        }
	}

	function index(){
		$data['pekerjaan'] = $this->Home_model->ambilData('tbl_pekerjaan');

		$this->load->view('public/index',$data);
	}

	function tata_cara(){
		$this->load->view('public/tata_cara');
	}

	function daftar(){
		$data = $this->input->post('data');

		$keys = array_column($this->input->post('data'),'name');
		$values = array_column($this->input->post('data'),'value');

		$tambah = $this->Home_model->setTambah('tbl_user',array_combine($keys, $values));

		echo json_encode($tambah);
	}

	function login(){
		$data = $this->input->post('data');

		$keys = array_column($this->input->post('data'),'name');
		$values = array_column($this->input->post('data'),'value');

		$where = array_combine($keys, $values);

		$cek = $this->Home_model->cekLogin($where);

		echo json_encode($cek);
	}

	function cekUsername(){
		$username = $this->input->post('username');

		$cek = $this->Home_model->cekData('tbl_user',array('username'=>$username));

		if ($cek > 0) {
			echo json_encode(true);
		}else{
			echo json_encode(false);
		}
	}

	function cekEmail(){
		$email = $this->input->post('email');

		$cek = $this->Home_model->cekData('tbl_user',array('email'=>$email));

		if ($cek > 0) {
			echo json_encode(true);
		}else{
			echo json_encode(false);
		}
	}
}
 ?>