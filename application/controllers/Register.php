<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('auth_model');
    $this->form_validation->set_error_delimiters('<i style="color:red">*','</i>');
  }

  function index()
  {
    $data['title'] = "Register";
    $this->template->display('register',$data);
  }

  function register()
  {
    $data['title'] = "Register";
    $this->form_validation->set_rules('name','Nama Lengkap','required');
    $this->form_validation->set_rules('email','Email','required|valid_email|callback_check_email_exist');
    $this->form_validation->set_rules('username','Username','required|alpha_numeric|callback_check_username_exist');
    $this->form_validation->set_rules('password','Password','required');
    if ($this->form_validation->run() == false) {
      $this->template->display('register',$data);
    } else {
      $name = $this->input->post('name');
      $email = $this->input->post('email');
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $input = [
        'email'=>$email,
        'name'=>$name,
        'username'=>$username,
        'password'=>md5($password)
      ];
      $save = $this->auth_model->register($input);
      redirect('home');
    }

  }

  function check_username_exist()
  {
    $username=$this->input->post('username');
		$check=$this->auth_model->check_username_exist($username);
		if ($check == TRUE) {
			$this->form_validation->set_message('check_username_exist','Username sudah terdaftar');
			return FALSE;
		}else{
			return TRUE;
		}
  }

  function check_email_exist()
  {
    $email=$this->input->post('email');
		$check=$this->auth_model->check_email_exist($email);
		if ($check == TRUE) {
			$this->form_validation->set_message('check_email_exist','Email sudah terdaftar');
			return FALSE;
		}else{
			return TRUE;
		}
  }

}
