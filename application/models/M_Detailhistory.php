<?php
class M_Detailhistory extends CI_Model{
    
    // function getAll(){
    //     $this->db->select('*');
    //     $this->db->from('tb_riwayat'); 
    //     //$this->db->select('*');
    //     //$this->db->from('login_admin');
    //     $query = $this->db->get();
    //     return $query;
    // }


    public function getDetail($id_riwayat = null)
	{
        // $this->db->query("SELECT * FROM tb_riwayat JOIN tb_lokasi JOIN tb_kendaraan ON tb_lokasi.id_lokasi = tb_riwayat.id_lokasi && tb_kendaraan.id_kendaraan=tb_lokasi.id_kendaraan");
        $query = $this->db->query("SELECT status, jenis_kendaraan, nama_kendaraan, nomor_kendaraan, nama_lokasi, r_waktu, lat, lng FROM tb_riwayat JOIN tb_lokasi USING(id_lokasi) JOIN tb_kendaraan USING(id_kendaraan) WHERE id_riwayat = '".$id_riwayat."' ORDER BY id_riwayat DESC");
        
        if($id_riwayat != null){
            $this->db->where($id_riwayat);
        }
        
        // $this->db->select('*');
        // $this->db->from('tb_riwayat');
        // $this->db->join('tb_lokasi', 'tb_riwayat.id_riwayat=tb_lokasi.id_lokasi');
        // $this->db->join('tb_kendaraan', 'tb_riwayat.id_riwayat=tb_kendaraan.id_kendaraan');
        // //$this->db->where("tb_riwayat", $id_riwayat );
        //$query = $this->db->get('tb_riwayat');
        return $query;
    }
    
    


  
}
?>