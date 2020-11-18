<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request_rute extends CI_Controller 
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
	
	var $mainTable="tb_lokasi";
	var $mainPk="id_lokasi";
	var $viewLink="Request_rute";
	// var $viewLink2="Users";
	//sub menu atau header
	var $breadcrumbTitle="Data Request";
	//var $breadcrumbTitle2="User Access";
	// buat tampilan view data
	var $viewPage="Admviewpage";
	//buat view tambah data
	var $addPage="Admaddpagerute";
	//var $detPage="Formdetpage";
	
	//query
	var $ordQuery=" ORDER BY id_lokasi DESC";
	var $tableQuery="tb_lokasi AS a INNER JOIN tb_kendaraan AS b ON a.id_kendaraan = b.id_kendaraan";
	//var $fieldQuery=" a.code_frm as code,a.id_frm as id,a.desc_frm as nm,b.nm_frmgroup as grp, a.is_shortcut as sc, a.stat_frm as st, a.sort_order"; //leave blank to show all field
	var $fieldQuery="
						a.id_lokasi,
						concat(b.nama_kendaraan,' (',b.nomor_kendaraan,') ','- ',b.pengguna_kendaraan),
						a.nama_lokasi,
						a.tanggal,
						a.waktu
						";
	var $primaryKey="id_lokasi";
	//var $detKey="nik";
	var $updateKey="a.id_lokasi";
	
	//auto generate id
	//sesuaikan panjangnya length di database
	var $defaultId="LKS0001";
	var $prefix="LKS";
	var $suffix="0001";	
	
	//view
	var $viewFormTitle="Daftar Request";
	var $viewFormTableHeader=array(
									"Id Lokasi",
									"Kendaraan",
									"Tempat Tujuan",
									"Tanggal",
									"Waktu"
									);
	
	//save
	var $saveFormTitle="Tambah Lokasi";
	var $saveFormTableHeader=array(
									"Id Lokasi",
									"Kendaraan",
									"Tempat Tujuan",
									"Tanggal",
									"Waktu"
								
									);
	
	//update
	var $editFormTitle="Ubah Lokasi";
	var $editFormTableHeader=array(
		"Id Lokasi",
		"Kendaraan",
		"Tempat Tujuan",
		"Tanggal",
		"Waktu"
		);
	
	/*	
		========================================================== General Function =========================================================
	*/
	
	public function index()
	{
		//init modal
		$this->load->database();
		$this->load->model('Mmain');
		
		//check user access	
		$isAll = $this->Mmain->qRead(
										"tb_accfrm AS a INNER JOIN tb_frm AS b ON a.code_frm = b.code_frm 
										WHERE a.id_acc ='".$this->session->userdata['accUser']."' AND b.id_frm='".$this->viewLink."'",
										"a.is_add as isadd,a.is_edt as isedt,a.is_del as isdel,a.is_spec1 as acc1,a.is_spec2 as acc2","");
		foreach($isAll ->result() as $row)
		{
			$access=$row;
		}
		//$selfDept=$this->Mmain->qRead("tb_emp WHERE id_emp='".$this->session->userdata('idEmp')."'","id_div,id_loc","")->row();
		
		//$output['isall']=$access->isadd;
		$accessQuery="";
		/*
		if($access->acc2<>1)
		{
			
		$this->viewFormTableHeader=array(
									"Avatar",
									"Name",
									"Workplace",
									"NIK",
									"Division",
									"Departement",
									"Sex",
									"Phone",
									"Address",
									"E-Mail");
									$this->tableQuery.=" WHERE a.show_emp=1 ";
		}
		*/
			//$accessQuery="WHERE b.code_user ='".$this->session->userdata['codeUser']."'";
			
			
		
		//init view
		$output['formAccess']=$access;
		
		$renderTemp=$this->Mmain->qRead($this->tableQuery.$this->ordQuery,$this->fieldQuery,"");
		foreach($renderTemp->result() as $row)
		{

		}
		$output['render']=$renderTemp;
		//init view
		$output['pageTitle']=$this->viewFormTitle;
		$output['breadcrumbTitle']=$this->breadcrumbTitle;
		$output['breadcrumbLink']=$this->viewLink;
		$output['saveLink']=$this->viewLink."/add";
		$output['deleteLink']=$this->viewLink."/delete";
		$output['primaryKey']=$this->primaryKey;
		//$output['detKey']=$this->detKey;
		$output['tableHeader']=$this->viewFormTableHeader;
		//$output['dtcustom']="datatableemp";
		
		//render view
		$this->fn->getheader();
		$this->load->view($this->viewPage,$output);
		$this->fn->getfooter();
	}
	

	public function add($isEdit="")
	{
		//init modal
		$this->load->database();
		$this->load->model('Mmain');
		
		
		//init view
		$output['pageTitle']=$this->saveFormTitle;
		$output['breadcrumbTitle']=$this->breadcrumbTitle;
		$output['breadcrumbLink']=$this->viewLink;
		$output['saveLink']=$this->viewLink."/save";
		$output['tableHeader']=$this->saveFormTableHeader;
		$output['formLabel']=$this->saveFormTableHeader;
		
		$imgTemp="";
		$codeTemp="";
		$isRo="";
		if(!empty($isEdit))
		{
			
			$output['pageTitle']=$this->editFormTitle;
			$output['saveLink']=$this->viewLink."/update";
			$pid=$isEdit;
			
			$render=$this->Mmain->qRead($this->tableQuery,$this->fieldQuery,$this->mainPk."  = '".$isEdit."'");
			foreach($render->result() as $row)
			{
				foreach($row as $col)
				{
					$txtVal[]= $col;
				}
			}
			
		}
		else
		{	
				for($i=0;$i<count($this->saveFormTableHeader);$i++)
				{
					$txtVal[]="";//$this->saveFormTableHeader[$i];
				}	
				
				//generate id
				$txtVal[0]=$this->Mmain->autoId($this->mainTable,$this->mainPk,$this->prefix,$this->defaultId,$this->suffix);	
				$txtVal[3]=date("Y-m-d");
				date_default_timezone_set('Asia/Jakarta');
				$txtVal[4]=date("H:i:s a");

	
		}
		// BUAT COMBO BOX
		 $cboKendaraan=$this->fn->createCbofromDb("tb_kendaraan","id_kendaraan as id, concat(nama_kendaraan,' (',nomor_kendaraan,') ','- ',pengguna_kendaraan) as nm","",$txtVal[1],"","txt[]");
		
		 // $cboBlood=$this->fn->createCbo(array('A','B','O','AB','-'),array('A','B','O','AB','-'),$txtVal[29]);
		
		
		$output['formTxt']=array(
								"<input type='text' class='form-control' id='txtIdLokasi' name=txt[] value='".$txtVal[0]."' required readonly placeholder='Max. 7 karakter' maxlength='7'>",
								$cboKendaraan,
								"<input type='text' class='form-control' id='txtNamaLokasi' name=txt[] value='".$txtVal[2]."' required placeholder='Max. 70 karakter' maxlength='70'>",

								"<input type='text' class='form-control   dtp' data-date-format='yyyy-mm-dd' name=txt[]  value='".$txtVal[3]."' autocomplate=off readonly>",
								"<input type='text' class='form-control   tp'' name=txt[] value='".$txtVal[4]."' autocomplate=off readonly>"
								
								);
		
		
		//load view
		$this->fn->getheader();
		$this->load->view($this->addPage,$output);
		//$this->load->view('map/index');
		$this->fn->getfooter();
	}	
	
	public function save()
	{
		//retrieve values
		$savValTemp=$this->input->post('txt');
		
		//save to database
		$this->load->database();
		$this->load->model('Mmain');
		
		$this->Mmain->qIns($this->mainTable,$savValTemp);
		
		$this->session->set_flashdata('successNotification', '1');
		//redirect to form
		redirect($this->viewLink,'refresh');		
	}
	
	//delete record
	public function delete($valId)
	{		
		//save to database
		$this->load->database();
		$this->load->model('Mmain');
		$this->Mmain->qDel($this->mainTable,$this->mainPk,$valId);
		
		$this->session->set_flashdata('successNotification', '3');
		//redirect to form
		redirect($this->viewLink,'refresh');		
	}
	
	//update record
	public function update()
	{
		//retrieve values
		$savValTemp=$this->input->post('txt','id');
		
		//save to database
		$this->load->database();
		$this->load->model('Mmain');
		// $avauser="";
		// if(!empty($_FILES['txtfl']['name']))
		// {
		// 	$flName=$_FILES['txtfl']['name'];
		// 	$flTmp=$_FILES['txtfl']['tmp_name'];
		// 	$fltype=$_FILES['txtfl']['type'];
		// 	move_uploaded_file($flTmp,"assets/admin/img/avatar/thumb/".$flName);
		// 	$avauser=$flName;
		// }
		// else
		// {
		// 	$avauser=$this->input->post('txtimg');
		// }
		
		
		
		
		// $savValTemp[] = $savValUserTemp[0];
		
		
		// //foreach($savValTemp as $i => $row) echo ($i+1)." ".$row."<br>";
		// //foreach($savValUserTemp as $i => $row) echo ($i+1)." ".$row."<br>";
		
		$this->Mmain->qUpd($this->mainTable,$this->mainPk,$savValTemp[0],$savValTemp);
		
		$this->session->set_flashdata('successNotification', '2');
		//redirect to form
		redirect($this->viewLink,'refresh');		
	}
	
	
}

?>