<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelamar extends CI_Controller 
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
	
	var $mainTable="id_pelamar";
	var $mainPk="nama_pelamar";
	var $viewLink="Pelamar";
	var $breadcrumbTitle="Employees";
	var $viewPage="Admviewpage";
	var $addPage="Admaddpage";
	
	
	//query
	var $ordQuery=" ORDER BY id_pelamar DESC ";
	var $tableQuery="
						tb_pelamar
						";
	var $fieldQuery="
						id_pelamar
						tb_pelamar
						"; //leave blank to show all field
						
	var $primaryKey="id_pelamar";
	var $updateKey="nama_pelamar";
	
	//auto generate id
	var $defaultId="BRG0001";
	var $prefix="BRG";
	var $suffix="0001";	
	
	//view
	var $viewFormTitle="Pelamar";
	var $viewFormTableHeader=array(
									"id_pelamar",
									"nama_pelamar",
									"TanggalLahir_pelamar",
									"    "
									"    "
									"    "
									);
	
	//save
	var $saveFormTitle="Tambah Pelamar";
	var $saveFormTableHeader=array(
									"     "
									"     "
									);
	
	//update
	var $editFormTitle="Edit User Data";
	
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
		$output['tableHeader']=$this->viewFormTableHeader;
		
		
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
			
						";
			$render=$this->Mmain->qRead($this->tableQuery,$this->fieldQuery,$This->mainPK."  = '".$isEdit."'");
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
				$txtVal[0]=$this->Mmain->autoId($this->mainTable,$This->mainPK,$this->prefix,$this->defaultId,$this->suffix);	
				
	
		}
		
		//$cboacc=$this->fn->createCbofromDb("tb_acc","id_acc as id,nm_acc as nm","",$txtVal[58],"","txtUser[]");
			//$cboBlood=$this->fn->createCbo(array('A','B','O','AB','-'),array('A','B','O','AB','-'),$txtVal[29]);
		
		
		
		$output['formTxt']=array(
								"<input type='text' class='form-control' id='txtIdPelamar' name=txt[] value='".$txtVal[0]."' required readonly placeholder ",
								"<input type='text' class='form-control' id='txtNamaPelamar' name=txt[] value='".$txtVal[1]."' required",
								"<input type='text' class='form-control' id='txtTanggalLahirPelamar' name=txt[] value='".$txtVal[2]."' required",
								);
		
		
		//load view
		$this->fn->getheader();
		$this->load->view($this->addPage,$output);
		$this->fn->getfooter();
	}	
	
	public function save()
	{
		//retrieve values
		$savValTemp=$this->input->post('txt');
		$savValUserTemp=$this->input->post('txtUser');
		
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
		$savValTemp=$this->input->post('txt');
		
		
		//save to database
		$this->load->database();
		$this->load->model('Mmain');
		$avauser="";
		if(!empty($_FILES['txtfl']['name']))
		{
			$flName=$_FILES['txtfl']['name'];
			$flTmp=$_FILES['txtfl']['tmp_name'];
			$fltype=$_FILES['txtfl']['type'];
			move_uploaded_file($flTmp,"assets/admin/img/avatar/thumb/".$flName);
			$avauser=$flName;
		}
		else
		{
			
		
		$this->Mmain->qUpd("$This->maintable $This->mainPk",$savValTemp[0],$savValTemp);
		
		
		$this->Mmain->qUpdpart("tb_user","code_user",$savValUserTemp[0],Array("ava_user","id_acc","nm_user"),Array($avauser,$savValUserTemp[3],$savValUserTemp[1]));
		
		$this->session->set_flashdata('successNotification', '2');
		//redirect to form
		redirect($this->viewLink,'refresh');		
	}
	
	
	//update record
	public function Pin($id,$stat)
	{
		//retrieve values
		
		
		//save to database
		$this->load->database();
		$this->load->model('Mmain');
		$this->Mmain->qUpdpart($this->mainTable,"id_emp",$id,Array("show_emp"),Array($stat));
		
		//redirect to form
		redirect($this->viewLink,'refresh');		
		
	}
}

?>