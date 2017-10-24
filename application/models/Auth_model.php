<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  function register($data){
    return $this->db->insert('user', $data);
  }

  function check_username_exist($username)
  {
    $this->db->where('username', $username);
		$this->db->where('user_sts', 1);
		$query=$this->db->get('user');
		if ($query->num_rows()>0) {
			return TRUE;
		} else {
			return FALSE;
		}
  }

  function check_email_exist($email)
  {
    $this->db->where('email', $email);
		$this->db->where('user_sts', 1);
		$query=$this->db->get('user');
		if ($query->num_rows()>0) {
			return TRUE;
		} else {
			return FALSE;
		}
  }

  function login($username,$password)
  {
    $this->db->where('username', $username);
    $this->db->where('password', md5($password));
    $this->db->where('user_sts', 1);
    return $this->db->get('user');
  }
}
