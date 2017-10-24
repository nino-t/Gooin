<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }


  function get_post($limit,$start)
  {
    $this->db->select('post_id,username, category_name, post_title,post_sts,post_slug');
    $this->db->from('v_post');
    $this->db->limit($limit,$start);
    $this->db->where('post_sts >', 0);
    $this->db->order_by('post_id', 'desc');
    return $this->db->get()->result_array();
  }

  function count_post()
  {
    $this->db->where('post_sts >', 0);
    return $this->db->get('post')->num_rows();
  }

  function count_category()
  {
    $this->db->where('category_sts >', 0);
    return $this->db->get('category')->num_rows();
  }

  function soft_delete_post($id)
  {
    $this->db->where('post_id', $id);
    $data =[
      'post_sts'=>0
    ];
    return $this->db->update('post', $data);
  }

  function soft_delete_comment($id)
  {
    $this->db->where('comment_id', $id);
    $data =[
      'comment_sts'=>0
    ];
    return $this->db->update('comment', $data);
  }

  function get_comment($limit,$start)
  {
    $this->db->select('post_id,post_slug,comment_content,comment_id,title');
    $this->db->from('v_comment');
    $this->db->limit($limit,$start);
    $this->db->where('comment_sts >', 0);
    $this->db->order_by('comment_id', 'desc');
    return $this->db->get()->result_array();
  }

  function count_comment()
  {
    $this->db->where('comment_sts >', 0);
    return $this->db->get('comment')->num_rows();
  }

  function visitor()
  {
    return $this->db->get('visitor_counter')->num_rows();
  }

  function user_count()
  {
    $this->db->where('user_lvl', 2);
    $this->db->where('user_sts', 1);
    return $this->db->get('user')->num_rows();
  }

  function grafik_pengunjung(){
		$this->db->select('COUNT(visitor_counter_id) as Jumlah,DATE(time_visit) as Tanggal');
		$this->db->from('visitor_counter');
		$this->db->group_by('DATE(time_visit)');
		$this->db->order_by('time_visit','desc');
		$this->db->limit(7);
		$query=$this->db->get();
		return $query;
	}
}
