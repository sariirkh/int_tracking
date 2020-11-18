<?php
class M_Calendartracking extends CI_Model{
    
    function getAll(){
        $this->db->select('*');
        $this->db->from('tb_lokasi'); 
        $this->db->join('tb_kendaraan','tb_lokasi.id_lokasi=tb_kendaraan.id_kendaraan');
        $query = $this->db->get();
        return $query;
    }

    
   
}
?>