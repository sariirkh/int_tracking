<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboardtracking extends CI_Controller 
{
	function __construct()
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

	public function ambilMarker(){
		
		$this->load->database();
		$this->load->model('Mmain');
		$retVal = "";
		
		$markerList = $this->Mmain->qRead("	tb_riwayat a 
											INNER JOIN tb_lokasi b ON a.id_lokasi = b.id_lokasi ",
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

	public function index()
	{
		//init modal
		
        $this->fn->getheader();	
        $data['kendaraan'] = $this->M_Dashboardtracking->jum_kendaraan();
        $data['lokasi'] = $this->M_Dashboardtracking->jum_request();
        $data['riwayat'] = $this->M_Dashboardtracking->jum_update();
		$data['pengguna_kendaraan'] = $this->M_Dashboardtracking->jum_pengguna();
		$data['tempat'] = $this->M_Dashboardtracking->getHistoryLokasi()->result();
		$data['marker'] = $this->M_Dashboardtracking->getHistoryKendaraan()->result_array();
		$this->load->view('Admdashboardtracking', $data);
        $this->fn->getfooter();
        
    }
    // public function map(){
    //     $this->load->view('Admdashboardtracking');
    // }
	
	public function getJenisKendaraan()
	{

		
		$this->load->database();
		$this->load->model('Mmain');
		//$tgl=date("Y-m-d") WHERE r_tanggal='$tgl';
		$retVal= "";
		$tgl = date("Y-m-d");
		$render = $this->Mmain->qRead("
								tb_lokasi a 
								INNER JOIN tb_kendaraan b ON a.id_kendaraan = b.id_kendaraan 
								WHERE tanggal = '$tgl'
								GROUP BY b.nama_kendaraan
								ORDER BY a.tanggal DESC
								",
							"b.nama_kendaraan as nama,COUNT(b.nama_kendaraan) as jum");

		if($render->num_rows() > 0 )
		{
			foreach($render->result() as $row)
			$retVal .= $row->nama . "++" . $row->jum . "||";
		}

			echo $retVal;
	}

	public function getJumlahperBulan()
	{
		
		
		//init modal
		$this->load->database();		
		$this->load->model('Mmain');
	
		//echo $id;
		//echo $year;
		$dataTemp=$this->Mmain->qRead(	"
											tb_lokasi a
												
												WHERE YEAR(tanggal)= YEAR(CURDATE())
												GROUP BY substr(tanggal,1,7) 
												ORDER BY MONTH(tanggal)
										",
										"
											CASE 
												WHEN MONTH(tanggal) ='01' THEN 'Januari'
												WHEN MONTH(tanggal) ='02' THEN 'Februari'
												WHEN MONTH(tanggal) ='03' THEN 'Maret'
												WHEN MONTH(tanggal) ='04' THEN 'April'
												WHEN MONTH(tanggal) ='05' THEN 'Mei'
												WHEN MONTH(tanggal) ='06' THEN 'Juni'
												WHEN MONTH(tanggal) ='07' THEN 'Juli'
												WHEN MONTH(tanggal) ='08' THEN 'Agustus'
												WHEN MONTH(tanggal) ='09' THEN 'September'
												WHEN MONTH(tanggal) ='10' THEN 'Oktober'
												WHEN MONTH(tanggal) ='11' THEN 'November'
												WHEN MONTH(tanggal) ='12' THEN 'Desember'
											END as bln,
											COUNT(substr(tanggal,1,7) ) as tot
										","");
		$val="";
		$f1="";
		$dt=null;
		$tot=null;
		$bulan=Array(
					"Januari",
					"Februari",
					"Maret",
					"April",
					"Mei",
					"Juni",
					"Juli",
					"Agustus",
					"September",
					"Oktober",
					"November",
					"Desember"
					);
					
		$retVal1="";
		foreach($dataTemp->result() as $row)
		{
			$dt[]=$row->bln;
			$tot[]=$row->tot;
		}
		
		$j=0;
		for($i=0;$i<12;$i++)
		{
			$totbln=0;
			if(count($dt)>$j)
			{
				if($dt[$j]==$bulan[$i])
				{
					$totbln=$tot[$j];
					$j++;
					
				}
			}
			$retVal1.=$bulan[$i]."++".$totbln."||";
		}
		
		$retVal1=substr($retVal1,0,strlen($retVal1)-2);
		
		//echo implode("<br>",$dt);
		//echo $retVal2;
		$retVal=$retVal1;
		echo $retVal;
		
		
	}
   
	// public function history(){
    //     // if($this->session->userdata('status') != "login"){
    //     //     redirect(base_url('admin/login_admin'));
    //     // }
    //     $data['tempat'] = $this->M_Dashboardtracking->getHistory()->result();
    //      $this->load->view('Admdashboardtracking', $data);
    // }
	
	// public function getHistory()
	// {
	// 	$this->load->database();
	// 	$this->load->model('Mmain');
	// 	$retVal= "";
		
	// 	$render = $this->Mmain->qRead("
	// 	tb_riwayat  a INNER JOIN tb_lokasi  b INNER JOIN tb_kendaraan  c ON a.id_lokasi = b.id_lokasi && b.id_kendaraan = c.id_kendaraan
	// 	ORDER BY id_riwayat
	// 							");

	// }
	
}
?>

