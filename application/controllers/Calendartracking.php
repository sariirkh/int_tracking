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
		$this->load->view('Admcalendartracking');
        $this->fn->getfooter();
     	
    }
    
   
    
}
?>

