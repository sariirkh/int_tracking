<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detailhistory extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('Commonfunction','','fn');
        $this->load->model('M_Detailhistory');
				
		//if(!isset($this->session->userdata['name']))		
		//	redirect("login","refresh");
	}
	/*	
		====================================================== Variable Declaration =========================================================
	*/
	// public function mapDetail(){
    //     $id_lokasi = $this->input->post('id_lokasi');
    //     $data['map'] = $this->db->get_where('lokasi JOIN tower USING(id_tower) JOIN tipe_tower USING(id_tipe) JOIN combiner USING(id_combiner) JOIN convensional USING(id_convensional)', ['id_lokasi' => $id_lokasi])->row_array();
    //     $this->load->view('ajax/form_detail', $data);
	// }  
	
	public function show($id_riwayat="")
	{
		//init modal
		$this->fn->getheader();	
		//$this->load->database();
		//$this->load->model('Mmain');
		$where = $id_riwayat;//array('id_riwayat' => $id_riwayat);
		$data['marker'] = $this->M_Detailhistory->getDetail($where)->result_array();
		
        foreach ($data['marker'] as $key =>  $value) { 
		//echo $value['lat']."<br>";
		}
		$this->load->view('map/mapdetailhistory',$data);
		$this->fn->getfooter();

	
		
    }
    
}
?>
