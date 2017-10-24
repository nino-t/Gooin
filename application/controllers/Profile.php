<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $config['upload_path']          = './uploads/user_photo';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['encrypt_name']         = true;
    $config['max_size']             = 1024;
    $config['max_width']            = 1500;
    $config['max_height']           = 1200;
    $this->load->library('upload', $config);
    $this->load->model('profile_model');
    $this->form_validation->set_error_delimiters('<i style="color:red">*','</i>');
  }

  function index()
  {
    if ($this->session->has_userdata('user_id')) {
      redirect('profile/me');
    }else {
      redirect('profile/u/'.$this->uri->segment(3));
    }
  }

  function u()
  {
    $data['title'] = "Profile";
    $data['user_id']= $this->uri->segment(3);
    $user_id= $this->uri->segment(3);
    $page = $this->uri->segment(4);
    foreach ($this->profile_model->user_data($user_id) as $row) {
        $data['name'] = $row['name'];
        $data['username'] = $row['username'];
        $data['email'] = $row['email'];
        $data['phone'] = $row['phone'];
        $data['gender'] = $row['gender'];
        $data['photo'] = $row['user_photo']==''?'assets/img/user_icon.png':'uploads/user_photo/'.$row['user_photo'];
    }
    if ($page == null) {
      $data['user_post'] = $this->profile_model->user_post_published($user_id);
      $this->template->display('uprofile',$data);
    } else if ($page == 'inovasi') {
      $data['user_post'] = $this->profile_model->user_post_published($user_id);
      $data['post'] = $this->profile_model->get_post_published($user_id);
      $this->template->display('uinovasi',$data);
    }

  }

  function me()
  {
      if ($this->session->has_userdata('user_id')) {
        $data['title'] = $this->session->userdata('name');
        $user_id = $this->session->userdata('user_id');
        foreach ($this->profile_model->user_data($user_id) as $row) {
            $data['name'] = $row['name'];
            $data['username'] = $row['username'];
            $data['email'] = $row['email'];
            $data['phone'] = $row['phone'];
            $data['gender'] = $row['gender'];
            $data['photo'] = $row['user_photo']==''?'assets/img/user_icon.png':'uploads/user_photo/'.$row['user_photo'];
        }
        $data['user_post'] = $this->profile_model->user_post($user_id);
        $data['have_updated'] = $this->profile_model->isNotUpdated($user_id);
        $this->template->display('myprofile',$data);
      }else{
        redirect('home');
      }
  }

  function lengkapi_profile()
  {
    if ($this->session->has_userdata('user_id')) {
      $this->form_validation->set_rules('phone','Phone','required|trim|numeric');
      $this->form_validation->set_rules('gender','Jenis Kelamin','required');
      $this->form_validation->set_rules('user_desc','Tentang Saya','required');
      $this->form_validation->set_rules('photo','Photo','callback_validasi_photo');
      $data['title'] = $this->session->userdata('name');
      $user_id = $this->session->userdata('user_id');
      foreach ($this->profile_model->user_data($user_id) as $row) {
          $data['name'] = $row['name'];
          $data['username'] = $row['username'];
          $data['email'] = $row['email'];
          $data['phone'] = $row['phone'];
          $data['gender'] = $row['gender'];
          $data['photo'] = $row['user_photo']==''?'assets/img/user_icon.png':'uploads/user_photo/'.$row['user_photo'];
      }
      $data['user_post'] = $this->profile_model->user_post($user_id);
      $data['have_updated'] = $this->profile_model->isNotUpdated($user_id);
      if ($this->form_validation->run() == false) {
        $this->template->display('myprofile',$data);
      } else {
        redirect('profile/me');
      }

    }else{
      redirect('home');
    }
  }

  function validasi_photo()
  {
    $phone = $this->input->post('phone');
    $gender = $this->input->post('gender');
    $user_desc = $this->input->post('user_desc');
    if (!empty($_FILES['photo']['name'])) {
      if ( ! $this->upload->do_upload('photo'))
      {
            $this->form_validation->set_message('validasi_photo',$this->upload->display_errors('',''));
            return false;
      }
      else
      {
        $user_id = $this->input->post('user_id');
        $input = [
          'phone'         => $phone,
          'gender'        => $gender,
          'user_desc'     => $user_desc,
          'user_photo'    => $this->upload->data()['file_name'],
          'date_update'   => date("Y-m-d h:i:s"),
        ];
        $this->profile_model->update($user_id,$input);
        return true;
      }
    } else {
      $user_id = $this->input->post('user_id');
      $input = [
        'phone'         => $phone,
        'gender'        => $gender,
        'user_desc'     => $user_desc,
        'date_update'   => date("Y-m-d h:i:s"),
      ];
      $this->profile_model->update($user_id,$input);
      return true;
    }
  }

  function inovasi()
  {
    if ($this->session->has_userdata('user_id')) {
      $data['title'] = $this->session->userdata('name');
      $user_id = $this->session->userdata('user_id');
      foreach ($this->profile_model->user_data($user_id) as $row) {
          $data['name'] = $row['name'];
          $data['username'] = $row['username'];
          $data['email'] = $row['email'];
          $data['phone'] = $row['phone'];
          $data['gender'] = $row['gender'];
          $data['photo'] = $row['user_photo']==''?'assets/img/user_icon.png':'uploads/user_photo/'.$row['user_photo'];
      }
      $data['user_post'] = $this->profile_model->user_post($user_id);
      $data['post'] = $this->profile_model->get_post($user_id);
      $this->template->display('myinovasi',$data);
    }else{
      redirect('home');
    }
  }

  function publish($id)
  {
    $this->profile_model->publish($id);
    redirect('profile/inovasi');
  }

  function unpublish($id)
  {
    $this->profile_model->unpublish($id);
    redirect('profile/inovasi');
  }

  function aktivitas()
  {
    if ($this->session->has_userdata('user_id')) {
      $data['title'] = $this->session->userdata('name');
      $user_id = $this->session->userdata('user_id');
      $data['title'] = $this->session->userdata('name');
      $user_id = $this->session->userdata('user_id');
      foreach ($this->profile_model->user_data($user_id) as $row) {
          $data['name'] = $row['name'];
          $data['username'] = $row['username'];
          $data['email'] = $row['email'];
          $data['phone'] = $row['phone'];
          $data['gender'] = $row['gender'];
          $data['photo'] = $row['user_photo']==''?'assets/img/user_icon.png':'uploads/user_photo/'.$row['user_photo'];
      }
      $data['user_post'] = $this->profile_model->user_post($user_id);
      $data['comment'] = $this->profile_model->get_comment($user_id);
      $this->template->display('myaktivitas',$data);
    }else{
      redirect('home');
    }
  }

  function edit()
  {
    if ($this->session->has_userdata('user_id')) {
      $data['title'] = $this->session->userdata('name');
      $user_id = $this->session->userdata('user_id');
      foreach ($this->profile_model->user_data($user_id) as $row) {
          $data['name'] = $row['name'];
          $data['username'] = $row['username'];
          $data['user_desc'] = $row['user_desc'];
          $data['email'] = $row['email'];
          $data['phone'] = $row['phone'];
          $data['gender'] = $row['gender'];
          $data['photo'] = $row['user_photo']==''?'assets/img/user_icon.png':'uploads/user_photo/'.$row['user_photo'];
      }
      $data['user_post'] = $this->profile_model->user_post($user_id);
      $this->template->display('edit_profile',$data);
    }else{
      redirect('home');
    }
  }

  function do_edit()
  {
    if ($this->session->has_userdata('user_id')) {
      $this->form_validation->set_rules('phone','Phone','required|trim|numeric');
      $this->form_validation->set_rules('gender','Jenis Kelamin','required');
      $this->form_validation->set_rules('user_desc','Tentang Saya','required');
      $this->form_validation->set_rules('photo','Photo','callback_validasi_photo');
      $data['title'] = $this->session->userdata('name');
      $user_id = $this->session->userdata('user_id');
      foreach ($this->profile_model->user_data($user_id) as $row) {
          $data['name'] = $row['name'];
          $data['username'] = $row['username'];
          $data['user_desc'] = $row['user_desc'];
          $data['email'] = $row['email'];
          $data['phone'] = $row['phone'];
          $data['gender'] = $row['gender'];
          $data['photo'] = $row['user_photo']==''?'assets/img/user_icon.png':'uploads/user_photo/'.$row['user_photo'];
      }
      $data['user_post'] = $this->profile_model->user_post($user_id);
      $data['have_updated'] = $this->profile_model->isNotUpdated($user_id);
      if ($this->form_validation->run() == false) {
        $this->template->display('edit_profile',$data);
      } else {
        redirect('profile/me');
      }

    }else{
      redirect('home');
    }
  }

  function ubah_password()
  {
    $data['title'] = $this->session->userdata('name');
    $user_id = $this->session->userdata('user_id');
    foreach ($this->profile_model->user_data($user_id) as $row) {
        $data['name'] = $row['name'];
        $data['username'] = $row['username'];
        $data['email'] = $row['email'];
        $data['phone'] = $row['phone'];
        $data['gender'] = $row['gender'];
        $data['photo'] = $row['user_photo']==''?'assets/img/user_icon.png':'uploads/user_photo/'.$row['user_photo'];
    }
    $data['user_post'] = $this->profile_model->user_post($user_id);
    $this->form_validation->set_rules('old_password','Password Lama','required|callback_check_password');
    $this->form_validation->set_rules('password','Password Baru','required');
    $this->form_validation->set_rules('re_password','Ulangi Password Baru','required|matches[password]');
    $this->template->display('ubah_password',$data);


  }

  function ubah()
  {
    $data['title'] = $this->session->userdata('name');
    $user_id = $this->session->userdata('user_id');
    foreach ($this->profile_model->user_data($user_id) as $row) {
        $data['name'] = $row['name'];
        $data['username'] = $row['username'];
        $data['email'] = $row['email'];
        $data['phone'] = $row['phone'];
        $data['gender'] = $row['gender'];
        $data['photo'] = $row['user_photo']==''?'assets/img/user_icon.png':'uploads/user_photo/'.$row['user_photo'];
    }
    $data['user_post'] = $this->profile_model->user_post($user_id);
    $this->form_validation->set_rules('old_password','Password Lama','required|callback_check_password');
    $this->form_validation->set_rules('password','Password Baru','required');
    $this->form_validation->set_rules('re_password','Ulangi Password Baru','required|matches[password]');
    if ($this->form_validation->run() == false) {
      $this->template->display('ubah_password',$data);
    } else {
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $this->profile_model->ubah_password($username,$password);
      redirect('home/logout');
    }

  }

  function check_password()
  {
    $username = $this->input->post('username');
    $password = md5($this->input->post('old_password'));
    $check = $this->profile_model->check_password($username,$password);
    if ($check) {
      return true;
    } else {
      $this->form_validation->set_message('check_password','Password Salah');
      return false;
    }

  }
}
