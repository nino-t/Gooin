<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MX_Controller{

  public function __construct()
  {
    parent::__construct();
    $config['full_tag_open']="<nav><ul class='pagination pagination-sm'>";
		$config['full_tag_close']="</ul></nav>";
		$config['first_link']='First';
		$config['first_tag_open']="<li>";
		$config['first_tag_close']='</li>';
		$config['last_link']='Last';
		$config['last_tag_open']="<li>";
		$config['last_tag_close']='</li>';
		$config['next_link']='>>';
		$config['next_tag_open']="<li>";
		$config['next_tag_close']='</li>';
		$config['prev_link']='<<';
		$config['prev_tag_open']="<li>";
		$config['prev_tag_close']='</li>';
		$config['num_tag_open']="<li>";
		$config['num_tag_close']="</li>";
		$config['cur_tag_open']="<li class='active disable'><a href='#'>";
		$config['cur_tag_close']="</a></li>";
		$this->load->library("pagination",$config);
    $this->form_validation->set_error_delimiters('<i style="color:red">*','</i>');
    $this->load->model('user_model');
    if ($this->session->userdata('user_lvl') == "2") {
      redirect('home');
    }
  }

  function index()
  {
    redirect('admin/user/show');
  }

  function show()
  {
    $data['title']  = "User";
    $data['subtitle']  = "List user";
    $config['base_url']= site_url('admin/user/show');
    $config['total_rows']=$this->user_model->count_user();
    $config['per_page'] = $per_page = 50;
    $config['uri_segment']=4;
    $this->pagination->initialize($config);
    $data['paging'] = $this->pagination->create_links();
    $page = ($this->uri->segment(4))?$this->uri->segment(4):0;
    $data['count_user'] = $this->user_model->count_user();
    $data['data_user'] = $this->user_model->get_user($per_page,$page);
    $this->template->display('list_user',$data);
  }

  function delete($id)
  {
    $this->user_model->soft_delete($id);
    redirect('admin/user/show');
  }

}
