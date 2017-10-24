<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('template');
    if ($this->session->userdata('user_lvl') == "2") {
      redirect('home');
    }
    $this->load->model('post_model');
  }

  function index()
  {
    $data['title']  = "Dashboard";
    $data['visitor'] = $this->post_model->visitor();
    $data['users'] = $this->post_model->user_count();
    $data['datagrafik'] = $this->grafik_pengunjung();
    $data['innovation'] = $this->post_model->count_post();
    $data['categories'] = $this->post_model->count_category();
    $this->template->display('dashboard',$data);
  }

  public function grafik_pengunjung(){
		$query=$this->post_model->grafik_pengunjung();
			$dataGrafik = array();
		if ($query->num_rows() != 0) {
			foreach ($query->result_array() as $row) {
				$dataGrafik[] = $row;
			}
		}

		return json_encode($dataGrafik);
	}

  function logout()
  {
    $this->session->sess_destroy();
    redirect('home');
  }

}
