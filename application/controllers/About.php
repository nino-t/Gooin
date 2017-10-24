<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('post_model');
    $this->post_model->visitor_count();
  }

  function index()
  {
    $data['title'] = "About";
    $this->template->display('about',$data);
  }

}
