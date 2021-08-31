<?php 
/**
* 
*/
class Home_model extends CI_Model
{	

	function ambilData($tbl){
        $res = $this->db->get($tbl)->result_array();
        return $res;
    }

	function setTambah($table,$data){
        return $this->db->insert($table,$data);
    }

    
    function cekData($tbl,$where){
        $res = $this->db->get_where($tbl,$where);
        return $res->num_rows();
    }

    function cekLogin($where){
    	$cek = array($this->db->get_where('tbl_admin', $where),
						 $this->db->get_where('tbl_user', $where));

			foreach ($cek as $key) {
				$level[] = $key->row();
			}

			
			if ($level[0] !== NULL) {
				$res = array("cek"=>1,"level"=>"admin");
				$data = array("username"=>$level[0]->username,"level"=>"admin");
				$this->session->set_userdata($data);
			}else
			if ($level[1] !== NULL) {
				$res = array("cek"=>1,"level"=>"user");
				$data = array("username"=>$level[1]->username,"level"=>"user");
				$this->session->set_userdata($data);
			}else{
				$res = array("cek"=>0);
			}
			
			return $res;
    }
}
 ?>