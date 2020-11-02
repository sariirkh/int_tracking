<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendartracking extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
        $this->load->library('Commonfunction','','fn');
        $this->load->model('M_Calendartracking');
				
		//if(!isset($this->session->userdata['name']))		
		//	redirect("login","refresh");
	}
	/*	
		====================================================== Variable Declaration =========================================================
	*/
	public function index()
	{
		//init modal
		
		$this->fn->getheader();	
		
		
		// $data_calendar = $this->M_Calendartracking->getAll();
		// $calendar = array();
		// foreach ($data_calendar as $key => $val) 
		// {
		// 	$calendar[] = array(
		// 		'id_lokasi' 	=> intval($val->id_lokasi), 
		// 		'id_kendaraan' => $val->id_kendaraan,
		// 		// 'nama_kendaraan' => $val->nama_kendaraan, 
		// 		// 'nomor_kendaraan' => $val->nomor_kendaraan, 
		// 		'nama_lokasi' => trim($val->nama_lokasi), 
		// 		// 'start' => date_format( date_create($val->start_date) ,"Y-m-d H:i:s"),
		// 		// 'end' 	=> date_format( date_create($val->end_date) ,"Y-m-d H:i:s"),
		// 		// 'color' => $val->color,
		// 	);
		// }

		// $data = array();
		// $data['get_data']			= json_encode($calendar);
		//, $data);
	


		$this->load->view('Admcalendartracking');
        $this->fn->getfooter();
     	
    }
    
   
    
}
?>

