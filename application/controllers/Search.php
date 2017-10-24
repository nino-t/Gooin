<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('post_model');
  }

  function index()
  {

  }

  function search()
  {
    $keyword = $this->input->post('keyword');
    redirect('search/keyword/'.$keyword);
  }

  function keyword()
  {
    $data['title'] = "Search";
    $keyword = $this->uri->segment(3);
    $data['count'] = $this->post_model->search($keyword)->num_rows();
    $data['post'] = $this->post_model->search($keyword)->result_array();
    $this->template->display('search_innovation',$data);
  }

}
