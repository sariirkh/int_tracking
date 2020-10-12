<?php
class M_Dashboardtracking extends CI_Model{
    
    function getAll(){
        $this->db->select('*');
        $this->db->from('tb_kendaraan'); 
        //$this->db->select('*');
        //$this->db->from('login_admin');
        $query = $this->db->get();
        return $query;
    }

    function tampil_kendaraan(){
        $this->db->select('*');
        $this->db->from('tb_kendaraan');        
        $this->db->where('nomor_kendaraan');
        echo $this->db->count_all_results();
        //$this->db->select('COUNT(nomor_kendaraan) as total');
        //$this->db->group_by('nomor_kendaraan'); 
        //$this->db->order_by('total', 'desc'); 
        //$hasil = $this->db->get('kendaraan');
        //return $hasil;
    }
    public function jum_kendaraan(){   
        $query = $this->db->get('tb_kendaraan');
        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }
    }

    public function jum_request(){   
        $query = $this->db->get('tb_lokasi');
        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }
    }

    public function jum_update(){   
        $query = $this->db->get('tb_riwayat');
        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }
    }

    public function jum_pengguna(){   
        $query = $this->db->get('tb_kendaraan');
        $this->db->where('pengguna_kendaraan');
        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }
    }

    /*function tampil_request(){
        $this->db->select('*');
        $this->db->from('lokasi');
        $this->db->where('id_lokasi');
        echo $this->db->count_all_results();
        //$this->db->select('COUNT(id_lokasi) as total');
        //$this->db->group_by('lokasi'); 
        //$this->db->order_by('total', 'desc'); 
        //$hasil = $this->db->get('lokasi');
        //return $hasil;
    }

    function tampil_update(){        
        $this->db->select('*');
        $this->db->from('riwayat');
        $this->db->where('id_riwayat');
        echo $this->db->count_all_results();
        //$this->db->select('COUNT(id_riwayat) as total');
        //$this->db->group_by('id_riwayat'); 
        //$this->db->order_by('total', 'desc'); 
        //$hasil = $this->db->get('riwayat');
        //return $hasil;
    }

    function tampil_pengguna(){
        $this->db->select('*');
        $this->db->from('kendaraan');
        $this->db->where('pengguna');
        echo $this->db->count_all_results();
        //$this->db->select('COUNT(pengguna) as total');
        //$this->db->group_by('pengguna'); 
        //$this->db->order_by('total', 'desc'); 
        //$hasil = $this->db->get('kendaraan');
        //return $hasil;
    }*/
}
?>