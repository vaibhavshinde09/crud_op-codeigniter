<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//git 
class Main extends CI_Controller {

	public function __construct()
	{  
	 parent::__construct();
	 $this->load->library('form_validation');
	 $this->load->model('MyModel');
	}

	public function index()
	{
		$data['result']=$this->MyModel->FetchtblData();
		$this->load->view('reg',$data);
	}
	public function Reg()
	{
		$this->form_validation->set_rules('fname', 'Name', 'required');
		$this->form_validation->set_rules('gender','Gender','required|callback_gender_check');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
	//	$this->form_validation->set_rules('username', 'Username','required');
		$this->form_validation->set_rules('phone_no', 'Phone No', 'required');


		if($this->form_validation->run()==TRUE)
		{
			$data = array(  
				"fname"     =>$this->input->post("fname"),  
				"phone_no"    =>$this->input->post("phone_no"),
				"email"    =>$this->input->post("email"),
				"gender"    =>$this->input->post("gender"),



		   );  
		   if($this->input->post("update"))  
           {
			$this->MyModel->update_data($data,$this->input->post("hidden_id"));	
			redirect(base_url() . "Main/Updated");  

		   }
		   else if($this->input->post("save"))  
		   {
			$this->MyModel->insert_data($data);	
			redirect(base_url() . "Main/inserted");  

		   }

			
		}
		else
		{
			$this->index();

		}

	
	}
	public function inserted()
	{
		$this->index();
	}
	public function Updated()
	{
		$this->index();

	}
	public function delete_data(){  
		$id = $this->uri->segment(3);  
		$this->MyModel->delete_data($id);  
		redirect(base_url() . "Main/deleted");  
   }  
   public function deleted()  
   {  
		$this->index();  
   } 
   public function edit_data()
   {  
	$id = $this->uri->segment(3);  
	$data["user_data"] = $this->MyModel->fetch_single_data($id);  
	$data['result']=$this->MyModel->FetchtblData();

	$this->load->view("reg", $data);  
   }  
   public function UpdateReg()
   {

   }


	public function gender_check($strr)
	{
			 if ($strr=='none')  {
				 $this->form_validation->set_message('gender_check', 'Please choose your Gender.');
				 return FALSE;
			 }
			 else {
				 return TRUE;
			 }

	}  

}
