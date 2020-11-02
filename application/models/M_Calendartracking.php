<?php
class M_Calendartracking extends CI_Model{
    
    function getAll(){
        $this->db->select('*');
        $this->db->from('tb_lokasi'); 
        $this->db->join('tb_kendaraan','tb_lokasi.id_lokasi=tb_kendaraan.id_kendaraan');
        $query = $this->db->get();
        return $query;
         // $this->db->query("SELECT * FROM tb_riwayat JOIN tb_lokasi JOIN tb_kendaraan ON tb_lokasi.id_lokasi = tb_riwayat.id_lokasi && tb_kendaraan.id_kendaraan=tb_lokasi.id_kendaraan");
        //  $query = $this->db->query("SELECT tanggal, nama_kendaraan, nomor_kendaraan, nama_lokasi FROM tb_lokasi JOIN tb_kendaraan USING(id_kendaraan) ORDER BY id_lokasi DESC");
        //  // $this->db->select('*');
        //  // $this->db->from('tb_riwayat');
        //  // $this->db->join('tb_lokasi', 'tb_riwayat.id_riwayat=tb_lokasi.id_lokasi');
        //  // $this->db->join('tb_kendaraan', 'tb_riwayat.id_riwayat=tb_kendaraan.id_kendaraan');
        //  // //$this->db->where("tb_riwayat", $id_riwayat );
        //  //$query = $this->db->get('tb_riwayat');
        //  return $query;
    }

    // public function get_list($table, $where = FALSE )
	// {
	// 	if ($where) {
	// 		$this->db->where($where);
	// 	}
	// 	return $this->db->get($table)->result();
	// }

    
   
}
?>