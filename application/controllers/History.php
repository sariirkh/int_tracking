<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller 
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
	
	var $mainTable="id_riwayat";
	var $mainPk="id_riwayat";
	var $viewLink="History";
	// var $viewLink2="Users";
	//sub menu atau header
	var $breadcrumbTitle="Data History";
	//var $breadcrumbTitle2="User Access";
	// buat tampilan view data
	var $viewPage="Admviewpage";
	//buat view tambah data
	var $addPage="Admaddpage";
	//var $detPage="Formdetpage";
	
	//query
	var $ordQuery=" ORDER BY id_riwayat DESC ";
	var $tableQuery="tb_riwayat AS a INNER JOIN tb_lokasi AS b INNER JOIN tb_kendaraan AS c ON a.id_riwayat = b.id_lokasi = c.id_kendaraan";
	//var $fieldQuery=" a.code_frm as code,a.id_frm as id,a.desc_frm as nm,b.nm_frmgroup as grp, a.is_shortcut as sc, a.stat_frm as st, a.sort_order"; //leave blank to show all field
	var $fieldQuery="
						a.id_riwayat,
						a.waktu,
						c.merk_kendaraan,
						c.pengguna_kendaraan,
						b.nama_lokasi,
						a.jarak_now,
						a.status
						";
	var $primaryKey="id_riwayat";
	//var $detKey="nik";
	var $updateKey="id_riwayat";
	
	//auto generate id
	//sesuaikan panjangnya length di database
	var $defaultId="RWT0001";
	var $prefix="RWT";
	var $suffix="0001";	
	
	//view
	var $viewFormTitle="Daftar Riwayat Lokasi";
	var $viewFormTableHeader=array(
									"Id Riwayat",
									"Waktu",
									"Kendaraan",
									"Pengguna",
                                    "Lokasi Awal",
                                    "Jarak dari Lokasi Awal",
                                    "Status"
									);
	
	//save
	// var $saveFormTitle="Tambah Kendaraan";
	// var $saveFormTableHeader=array(
	// 								"Id Kendaraan",
	// 								"Jenis Kendaraan",
	// 								"Merk Kendaraan",
	// 								"Nomor Kendaraan",
	// 								"Nama Pengguna"
	// 								);
	
	//update
	// var $editFormTitle="Ubah Data Kendaraan";
	
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
	

	
	// public function add($isEdit="")
	// {
	// 	//init modal
	// 	$this->load->database();
	// 	$this->load->model('Mmain');
		
		
	// 	//init view
	// 	$output['pageTitle']=$this->saveFormTitle;
	// 	$output['breadcrumbTitle']=$this->breadcrumbTitle;
	// 	$output['breadcrumbLink']=$this->viewLink;
	// 	$output['saveLink']=$this->viewLink."/save";
	// 	$output['tableHeader']=$this->saveFormTableHeader;
	// 	$output['formLabel']=$this->saveFormTableHeader;
		
	// 	$imgTemp="";
	// 	$codeTemp="";
	// 	$isRo="";
	// 	if(!empty($isEdit))
	// 	{
			
	// 		$output['pageTitle']=$this->editFormTitle;
	// 		$output['saveLink']=$this->viewLink."/update";
	// 		$pid=$isEdit;
			
	// 		$render=$this->Mmain->qRead($this->tableQuery,$this->fieldQuery,$this->mainPk."  = '".$isEdit."'");
	// 		foreach($render->result() as $row)
	// 		{
	// 			foreach($row as $col)
	// 			{
	// 				$txtVal[]= $col;
	// 			}
	// 		}
			
	// 	}
	// 	else
	// 	{	
	// 			for($i=0;$i<count($this->saveFormTableHeader);$i++)
	// 			{
	// 				$txtVal[]="";//$this->saveFormTableHeader[$i];
	// 			}	
				
	// 			//generate id
	// 			$txtVal[0]=$this->Mmain->autoId($this->mainTable,$this->mainPk,$this->prefix,$this->defaultId,$this->suffix);	
				
	
	// 	}
		
	// 	// $cboacc=$this->fn->createCbofromDb("tb_acc","id_acc as id,nm_acc as nm","",$txtVal[58],"","txtUser[]");
	// 	// $cboBlood=$this->fn->createCbo(array('A','B','O','AB','-'),array('A','B','O','AB','-'),$txtVal[29]);
		
		
	// 	$output['formTxt']=array(
	// 							"<input type='text' class='form-control' id='txtIdKendaraan' name=txt[] value='".$txtVal[0]."' required readonly placeholder='Max. 70 karakter' maxlength='70'>",
	// 							"<input type='text' class='form-control' id='txtJenisKendaraan' name=txt[] value='".$txtVal[1]."' required placeholder='Max. 70 karakter' maxlength='70'>",
	// 							"<input type='text' class='form-control' id='txtMerkKendaraan' name=txt[] value='".$txtVal[2]."' required placeholder='Max. 70 karakter' maxlength='70'>",
	// 							"<input type='text' class='form-control' id='txtNomorKendaraan' name=txt[] value='".$txtVal[3]."' required placeholder='Max. 70 karakter' maxlength='70'>",
	// 							"<input type='text' class='form-control' id='txtPengguna' name=txt[] value='".$txtVal[4]."' required placeholder='Max. 70 karakter' maxlength='70'>"
								
	// 							);
		
		
	// 	//load view
	// 	$this->fn->getheader();
	// 	$this->load->view($this->addPage,$output);
	// 	$this->fn->getfooter();
	// }	
	
	// public function save()
	// {
	// 	//retrieve values
	// 	$savValTemp=$this->input->post('txt');
		
	// 	//save to database
	// 	$this->load->database();
	// 	$this->load->model('Mmain');
		
	// 	$this->Mmain->qIns($this->mainTable,$savValTemp);
		
	// 	$this->session->set_flashdata('successNotification', '1');
	// 	//redirect to form
	// 	redirect($this->viewLink,'refresh');		
	// }
	
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
	// public function update()
	// {
	// 	//retrieve values
	// 	$savValTemp=$this->input->post('txt');
		
	// 	//save to database
	// 	$this->load->database();
	// 	$this->load->model('Mmain');
	// 	// $avauser="";
	// 	// if(!empty($_FILES['txtfl']['name']))
	// 	// {
	// 	// 	$flName=$_FILES['txtfl']['name'];
	// 	// 	$flTmp=$_FILES['txtfl']['tmp_name'];
	// 	// 	$fltype=$_FILES['txtfl']['type'];
	// 	// 	move_uploaded_file($flTmp,"assets/admin/img/avatar/thumb/".$flName);
	// 	// 	$avauser=$flName;
	// 	// }
	// 	// else
	// 	// {
	// 	// 	$avauser=$this->input->post('txtimg');
	// 	// }
		
		
		
		
	// 	// $savValTemp[] = $savValUserTemp[0];
		
		
	// 	// //foreach($savValTemp as $i => $row) echo ($i+1)." ".$row."<br>";
	// 	// //foreach($savValUserTemp as $i => $row) echo ($i+1)." ".$row."<br>";
		
	// 	$this->Mmain->qUpd($this->mainTable,$this->mainPk,$savValTemp[0],$savValTemp);
		
	// 	$this->session->set_flashdata('successNotification', '2');
	// 	//redirect to form
	// 	redirect($this->viewLink,'refresh');		
	// }
	
	
}

?>