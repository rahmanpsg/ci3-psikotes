<?php 
/**
* 
*/
class Tes extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}

	function index(){
		$data = $this->User_model->query("SELECT * FROM tes");

		foreach ($data as $key => $value) {
			$pernyataan = json_encode(array('a'=>$value['opsi_a'], 'b'=>$value['opsi_b']));

			$values = json_encode(array('a'=>$value['value_a'], 'b'=>$value['value_b']));
			
			// print_r($pernyataan);
			$this->db->query("INSERT INTO tbl_soal VALUES ('$value[id]', '$pernyataan', '$values')");
		}
	}
}
 ?>