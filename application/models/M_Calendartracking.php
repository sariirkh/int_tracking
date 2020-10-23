<?php
class M_Calendartracking extends CI_Model{
    
    function getAll(){
        $this->db->select('*');
        $this->db->from('tb_riwayat'); 
        $query = $this->db->get();
        return $query;
    }

    
   
}
?>