<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot extends CI_Model {


    public function forgot_password()
	{
		$language = $this->db->get('language')->result_array();
		$data['language'] = array();
		foreach ($language as $lang) {
			$data['language'][$lang['word']] = $lang['display_text'];
		}
		$email = $this->input->post('email');      
		$findemail = $this->Forgot->forgot_password($email);  
		if($findemail){
		 $this->Forgot->sendpassword($findemail);        
		  }else{
		 $this->session->set_flashdata('msg',' Email not found!');
		 redirect(base_url().'welcome/Login','refresh');
	   }
	}
}