<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  function get_category($limit,$start)
  {
    $this->db->select('category_id, category_name');
    $this->db->from('category');
    $this->db->limit($limit,$start);
    $this->db->where('category_sts', 1);
    $this->db->order_by('category_id', 'desc');
    return $this->db->get()->result_array();
  }

  function count_category()
  {
    return $this->db->get_where('category',array('category_sts' => 1))->num_rows();
  }

  function save($data)
  {
    return $this->db->insert('category', $data);
  }

  function soft_delete($id)
  {
    $this->db->where('category_id', $id);
    $data =[
      'category_sts'=>0
    ];
    return $this->db->update('category', $data);
  }

  function update($id,$data)
  {
    $this->db->where('category_id', $id);
    $this->db->update('category', $data);
  }

  function get_data($id)
  {
    $this->db->where('category_id',$id);
    $this->db->where('category_sts',1);
    return $this->db->get('category')->result_array();
  }
}
