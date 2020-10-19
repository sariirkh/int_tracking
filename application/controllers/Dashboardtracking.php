<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboardtracking extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
        $this->load->library('Commonfunction','','fn');
        $this->load->model('M_Dashboardtracking');
				
		//if(!isset($this->session->userdata['name']))		
		//	redirect("login","refresh");
	}
	/*	
		====================================================== Variable Declaration =========================================================
	*/
	public function index()
	{
		//init modal
		
        $data['kendaraan'] = $this->M_Dashboardtracking->jum_kendaraan();
        $data['lokasi'] = $this->M_Dashboardtracking->jum_request();
        $data['riwayat'] = $this->M_Dashboardtracking->jum_update();
        $data['pengguna_kendaraan'] = $this->M_Dashboardtracking->jum_pengguna();
        $this->fn->getheader();	
		$this->load->view('Admdashboardtracking', $data);
        $this->fn->getfooter();
        
        

	
		
    }
    public function map(){
		$data['latlng'] = $this->M_Dashboardtracking->tampil_marker();
        //$data['lng'] = $this->M_Dashboardtracking->tampil_marker();
        $this->load->view('Admdashboardtracking', $data);
    }
    
   
    
}
?>

