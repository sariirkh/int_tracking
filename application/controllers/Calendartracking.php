<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendartracking extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
        $this->load->library('Commonfunction','','fn');
				
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
		$this->load->view('Admcalendartracking');
        $this->fn->getfooter();
     	
    }
    
	public function getKegiatan()
	{
		//init modal
		$this->load->database();
		$this->load->model('Mmain');
		
		$kalenderQuery = " tb_lokasi a
							INNER JOIN tb_kendaraan b ON a.id_kendaraan = b.id_kendaraan ";
		$kalenderField = "  a.nama_lokasi as nm,a.tanggal as tgl, CONCAT(nama_kendaraan,' ',nomor_kendaraan) as ken";
		
		$returnValue="";
		$renderTemp=$this->Mmain->qRead($kalenderQuery,$kalenderField,"");	
		foreach($renderTemp->result() as $row)
		{
			$returnValue .= $row->nm . "||" .$row->tgl . "||" . $row->ken . "++";
		}
		
		echo $returnValue;
	}


    
}
?>

	