<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MX_Controller{

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
    $this->load->model('category_model');
    $this->form_validation->set_error_delimiters('<i style="color:red">*','</i>');
    if ($this->session->userdata('user_lvl') == "2") {
      redirect('home');
    }
  }

  function index()
  {
    redirect('admin/category/show');
  }

  function show()
  {
    $data['title']  = "Kategori";
    $data['subtitle']  = "List Kategori";
    $config['base_url']= site_url('admin/category/show');
    $config['total_rows']=$this->category_model->count_category();
    $config['per_page'] = $per_page = 5;
    $config['uri_segment']=4;
    $this->pagination->initialize($config);
    $data['paging'] = $this->pagination->create_links();
    $page = ($this->uri->segment(4))?$this->uri->segment(4):0;
    $data['count_category'] = $this->category_model->count_category();
    $data['data_category'] = $this->category_model->get_category($per_page,$page);
    $this->template->display('list_category',$data);
  }

  function add()
  {
    $data['title']  = "Kategori";
    $data['subtitle']  = "Tambah Kategori";
    $this->template->display('add_category',$data);
  }

  function save()
  {
    $data['title']  = "Kategori";
    $data['subtitle']  = "Tambah Kategori";
    $this->form_validation->set_rules('category_name','Nama Kategori','required');
    $this->form_validation->set_rules('category_desc','Deskripsi Kategori','required');
    if ($this->form_validation->run() == false) {
      $this->template->display('add_category',$data);
    } else {
      $category_name = $this->input->post('category_name');
      $category_desc = $this->input->post('category_desc');
      $pecah = explode(" ",trim($category_name));
      $slug = strtolower(implode("-",$pecah));
      $input = [
        'category_slug'=>$slug,
        'category_name'=>$category_name,
        'category_desc'=>$category_desc
      ];
      $save = $this->category_model->save($input);
      redirect('admin/category');
    }

  }

  function delete($id)
  {
    $this->category_model->soft_delete($id);
    redirect('admin/category/show');
  }

  function edit($id)
  {
    $data['title']  = "Kategori";
    $data['subtitle']  = "Edit Kategori";
    foreach ($this->category_model->get_data($id) as $row) {
      $data['category_name'] = $row['category_name'];
      $data['category_desc'] = $row['category_desc'];
    }
    $this->template->display('edit_category',$data);
  }

  function update()
  {
      $data['title']  = "Kategori";
      $data['subtitle']  = "Edit Kategori";
      $category_id = $this->input->post('id');
      foreach ($this->category_model->get_data($category_id) as $row) {
        $data['category_name'] = $row['category_name'];
        $data['category_desc'] = $row['category_desc'];
      }
      $this->form_validation->set_rules('category_name','Nama Kategori','required');
      $this->form_validation->set_rules('category_desc','Deskripsi Kategori','required');
      if ($this->form_validation->run() == false) {
        $this->template->display('edit_category',$data);
      } else {
        $category_name = $this->input->post('category_name');
        $category_desc = $this->input->post('category_desc');
        $input = [
          'category_name'=>$category_name,
          'category_desc'=>$category_desc
        ];
        $save = $this->category_model->update($category_id,$input);
        redirect('admin/category');

    }
  }

}
