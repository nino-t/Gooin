<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  function user_data($user_id)
  {
    return $this->db->get_where('user',['user_id'=>$user_id])->result_array();
  }

  function user_post($user_id)
  {
    $this->db->where('user_id', $user_id);
    $this->db->where('post_sts >', 0);
    return $this->db->get('post')->num_rows();
  }

  function user_post_published($user_id)
  {
    $this->db->where('user_id', $user_id);
    $this->db->where('post_sts', 1);
    return $this->db->get('post')->num_rows();
  }

  function isNotUpdated($user_id)
  {
    $this->db->where('user_id', $user_id);
    $this->db->where('date_update', 0);
    $cek = $this->db->get('user')->num_rows();
    if ($cek == 1) {
      return false;
    } else {
      return true;
    }

  }

  function update($id,$data)
  {
    $this->db->where('user_id', $id);
    return $this->db->update('user', $data);
  }

  function get_post($user_id)
  {
    $sql = "SELECT
         a.post_id,
         a.post_sts,
         a.title,
         a.post_slug,
         COUNT(b.post_view_count_id) as hitung
        FROM post a

        LEFT JOIN post_view_count b ON a.post_id = b.post_id

        WHERE a.user_id = $user_id AND a.post_sts > 0

        GROUP BY a.post_id

        ORDER BY a.date_create DESC
        ";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  function get_post_published($user_id)
  {
    $this->db->order_by('date_create','DESC');
    $this->db->where('user_id', $user_id);
    $this->db->where('post_sts', 1);
    return $this->db->get('post')->result_array();
  }

  function publish($id)
  {
    $data = [
      'post_sts'=>1
    ];
    $this->db->where('post_id', $id);
    $this->db->update('post', $data);
  }

  function unpublish($id)
  {
    $data = [
      'post_sts'=>2
    ];
    $this->db->where('post_id', $id);
    $this->db->update('post', $data);
  }

  function get_comment($user_id)
  {
    $this->db->order_by('comment_time','DESC');
    return $this->db->get_where('v_comment',['user_id'=>$user_id])->result_array();
  }

  function check_password($username,$password)
  {
    $this->db->where('username', $username);
    $this->db->where('password', $password);
    $check = $this->db->get('user')->num_rows();
    if ($check == 1) {
      return true;
    } else {
      return false;
    }
  }

  function ubah_password($username,$password)
  {
    $ubh = ['password' => md5($password)];
    $this->db->where('username', $username);
    $this->db->update('user', $ubh);
  }
}
