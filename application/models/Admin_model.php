<?php 
/**
* 
*/
class Admin_model extends CI_Model
{
	function ambilData($tbl){
        $res = $this->db->get($tbl)->result_array();
        return $res;
    }

    function ambilData_where($tbl,$where){
        $res = $this->db->get_where($tbl,$where);
        return $res->result_array();
    }

    function ambilField($tbl,$field){
        $this->db->select($field);
        $res = $this->db->get($tbl);
        return $res->result_array();
    }

    function query($query){
    	$res = $this->db->query($query)->result_array();
    	return $res;
    }

	function cekTotalData($tbl){
        $res = $this->db->get($tbl);
        return $res->num_rows();
    }

    function cekData($tbl,$where){
        $res = $this->db->get_where($tbl,$where);
        return $res->num_rows();
    }

    function setTambah($table,$data){
        return $this->db->insert($table,$data);
    }

    function setUpdate($data,$where,$table){
        $this->db->set($data);
        $this->db->where($where);
        return $this->db->update($table);
    }

    function setHapus($table,$data){
        return $this->db->delete($table,$data);
    }

    function radarSet($data_papi, $hasil){
    	$radar_set = ["G","A","L","P","I","T","V","X","S","B","O","R","D","C","Z","E","K","F","W","N"];
    	for ($i=0; $i < count($radar_set); $i++) { 
			foreach ($data_papi as $key => $value) {
                $kode = $value['kode'];
				if($kode === $radar_set[$i]){
                    $nilai = 0;
                    if (isset($hasil->$kode)) {
                        $nilai = $hasil->$kode;
                    }

                    $res[] = array('axis'=>$kode.' ('.explode(' (', $value['ket_role'])[1], 'value'=>$nilai);
				}
			}
		}

		return $res;
    }

    function table_set($data_papi, $hasil, $pekerjaan){
    	$data = json_decode($this->query("SELECT role FROM tbl_pekerjaan WHERE nama = '$pekerjaan'")[0]['role']);

    	$data_rules = $this->query("SELECT * FROM tbl_rules");

    	foreach ($data_rules as $key => $value) {
    		$rules[$value['kode_role']][] = array('nilai'=>json_decode($value['nilai']), 'ket'=>$value['keterangan']);
    	}

    	for ($i=0; $i < count($data); $i++) { 
			foreach ($data_papi as $key => $value) {
                $kode = $value['kode'];
				if($kode === $data[$i]){
                    $nilai = 0;
                    if (isset($hasil->$kode)) {
                        $nilai = intval($hasil->$kode);
                    }

					foreach ($rules[$kode] as $val) {
						if($nilai >= $val['nilai'][0] && $nilai <= $val['nilai'][1]){
							$ket_nilai = $val['ket'];

						}
					}

					$res[$value['ket_aspek']][] = array('kode'=>$kode,
														'ket_role'=>$value['ket_role'],
														'nilai'=>$nilai,
														'ket_nilai'=>$ket_nilai);
				}
			}
		}
    	return $res;
    }

    function percent_set($hasil){
        $data = $this->query("SELECT nama, role FROM tbl_pekerjaan");

        foreach ($data as $key => $value) {
            $rules[$value['nama']][] = json_decode($value['role']);
        }

        foreach ($rules as $rule => $value) {
            $totalPoint = 0;
            $maxPoint = 9 * count($value[0]);
            $res[$rule] = array('point'=>0, 'maxpoint'=>$maxPoint);
            foreach ($value as $val) {
                foreach ($val as $v) {
                    if (isset($hasil->$v)) {
                        $res[$rule]['point'] += $hasil->$v;
                    }
                }
            }
        }

        foreach ($res as $key => $value) {
            $percent[$key]['point'] = number_format($value['point'] / $value['maxpoint'] * 100, 2);
        }

        return $percent;
    }

    function kecocokan_pekerjaan($data){
        $percent = max($data);

        if (intval($percent['point']) < 65) {
            return 'Peserta belum memenuhi syarat kecocokan pekerjaan';
        }else{
            return 'Kecocokan Pekerjaan : '.array_search($percent, $data);
        }
    }

    function tgl_indo($tanggal){
		$bulan = array (
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$pecah = explode(' ', $tanggal);
		$pecahkan = explode('-', $pecah[0]);
	 
		return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0] . ' ' . $pecah[1];
	}
}
 ?>