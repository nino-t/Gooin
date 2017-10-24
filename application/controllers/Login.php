<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('auth_model');
    $this->form_validation->set_error_delimiters('<i style="color:red">*','</i>');
  }

  function index()
  {
    $data['title'] = "Login";
    $this->load->model('auth_model');
    $this->template->display('login',$data);
  }

  function login()
  {
    $data['title'] = "Login";
    $this->form_validation->set_rules('username','Username','required');
    $this->form_validation->set_rules('password','Password','required');
    $this->form_validation->set_rules('login','Login','callback_check_account');
    if ($this->form_validation->run() == false) {
      $this->template->display('login',$data);
    } else {
      if ($this->session->userdata('user_lvl') == 2) {
        redirect('home');
      } else {
        redirect('admin/dashboard');
      }

    }

  }

  function check_account()
  {
   $username=$this->input->post('username');
   $password=$this->input->post('password');
   $result=$this->auth_model->login($username,$password);
   if ($result->num_rows()==1) {
     foreach ($result->result_array() as $row) {
       $sess_data['user_id']=$row['user_id'];
       $sess_data['name']=$row['name'];
       $sess_data['user_lvl']=$row['user_lvl'];
       $this->session->set_userdata( $sess_data );
     }
     return TRUE;
   } else {
     $this->form_validation->set_message('check_account','Username dan Password Salah');
     return FALSE;
   }

 }

}
