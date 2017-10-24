<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  function get_user($limit,$start)
  {
    $this->db->select('user_id,username, name, user_sts,date_registered');
    $this->db->from('user');
    $this->db->limit($limit,$start);
    $this->db->where('user_sts >', 0);
    $this->db->where('user_lvl >', 1);
    $this->db->order_by('user_id', 'desc');
    return $this->db->get()->result_array();
  }

  function count_user()
  {
    $this->db->where('user_sts >', 0);
    return $this->db->get('user')->num_rows();
  }

  function soft_delete($id)
  {
    $this->db->where('user_id', $id);
    $data =[
      'user_sts'=>0
    ];
    return $this->db->update('user', $data);
  }
}
