<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends MX_Controller{

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
    $this->load->model('post_model');
    if ($this->session->userdata('user_lvl') == "2") {
      redirect('home');
    }
  }

  function index()
  {
    redirect('admin/post/show');
  }

  function show()
  {
    $data['title']  = "Post";
    $data['subtitle']  = "List Post";
    $config['base_url']= site_url('admin/post/show');
    $config['total_rows']=$this->post_model->count_post();
    $config['per_page'] = $per_page = 5;
    $config['uri_segment']=4;
    $this->pagination->initialize($config);
    $data['paging'] = $this->pagination->create_links();
    $page = ($this->uri->segment(4))?$this->uri->segment(4):0;
    $data['count_post'] = $this->post_model->count_post();
    $data['data_post'] = $this->post_model->get_post($per_page,$page);
    $this->template->display('list_post',$data);
  }

  function delete($id)
  {
    $this->post_model->soft_delete_post($id);
    redirect('admin/post/show');
  }

}
