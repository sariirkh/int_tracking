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
		$data["id_riwayat"] = $id_riwayat;
		$this->load->view('map/mapdetailhistory',$data);
		$this->fn->getfooter();

	}
	
	public function ambilMarker($id_riwayat){
		
		$this->load->database();
		$this->load->model('Mmain');
		$retVal = "";
		
		$markerList = $this->Mmain->qRead("	tb_riwayat a 
											INNER JOIN tb_lokasi b ON a.id_lokasi = b.id_lokasi WHERE a.id_riwayat = '".$id_riwayat."' ",
											"b.nama_lokasi as nm,a.lat, a.lng, a.status ", "");
		if($markerList->num_rows() > 0 )
		{
			foreach($markerList->result() as $row)
			{
				$retVal .= $row->nm . "~" . $row->lat . "~" . $row->lng  . "~" . $row->status . "|" ;
			}
		}

		echo $retVal;	
	}
    
}
?>
