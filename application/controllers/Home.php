<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('post_model');
    $this->post_model->visitor_count();
  }

  function index()
  {
    $data['title']   = "Home";
    $data['inovasi'] = $this->post_model->get_post_for_home();
    $this->template->display('home',$data);
  }



   function logout()
   {
     $this->session->sess_destroy();
     redirect('home');
   }
}
