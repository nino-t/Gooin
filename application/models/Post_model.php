<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  function get_category()
  {
    $this->db->where('category_sts', 1);
    return $this->db->get('category')->result_array();
  }

  function save($data)
  {
    return $this->db->insert('post', $data);
  }

  function update($id,$data)
  {
    $this->db->where('post_id', $id);
    $this->db->update('post', $data);
  }

  function get_post_for_home(){
    $this->db->order_by('date_create', "DESC");
    $this->db->where('post_sts', 1);
    return $this->db->get('v_post', 6);
  }

  function get_list_post($limit,$start){
    $this->db->select('*');
    $this->db->from('v_post');
    $this->db->limit($limit,$start);
    $this->db->order_by('date_create', "DESC");
    $this->db->where('post_sts', 1);
    return $this->db->get()->result_array();
  }
  function count_list_post(){
    $this->db->where('post_sts', 1);
    return $this->db->get('v_post')->num_rows();
  }
  function get_list_post_category($slug,$limit,$start){
    $this->db->select('*');
    $this->db->from('v_post');
    $this->db->limit($limit,$start);
    $this->db->order_by('date_create', "DESC");
    $this->db->where('post_sts', 1);
    $this->db->where('category_slug', $slug);
    return $this->db->get()->result_array();
  }
  function count_list_post_category($slug){
    $this->db->where('post_sts', 1);
    $this->db->where('category_slug', $slug);
    return $this->db->get('v_post')->num_rows();
  }

  function get_data_by_slug($slug)
  {
    return $this->db->get_where('v_post', array('post_slug' => $slug))->result_array();
  }

  function get_data_post($id)
  {
    return $this->db->get_where('v_post', array('post_id' => $id))->result_array();
  }

  function get_comment($post_id)
  {
    $this->db->order_by('comment_time','ASC');
    return $this->db->get_where('v_comment',['quote_id'=>0,'post_id'=>$post_id]);
  }

  function get_comment_by_id($id)
  {
      return $this->db->get_where('v_comment',['comment_id'=>$id])->result_array();
  }

  function get_comment_reply($id)
  {
      $this->db->order_by('comment_time','ASC');
      return $this->db->get_where('v_comment',['quote_id'=>$id])->result_array();
  }

  function save_comment($data)
  {
    return $this->db->insert('comment', $data);
  }


  function delete_post($id)
  {
    $this->db->where('post_id', $id);
    $data =[
      'post_sts'=>0
    ];
    return $this->db->update('post', $data);
  }


  function visit_count($post_id)
  {
    $ip = $_SERVER['REMOTE_ADDR'];
    $sql = "SELECT * FROM post_view_count
      WHERE ip_addr = '$ip' AND DATE(time_visit) = CURDATE() AND post_id = '$post_id'";
    $check = $this->db->query($sql)->num_rows();
    if ($check == 0) {
      $input = [
        'post_id' => $post_id,
        'ip_addr' => $ip
      ];
      $this->db->insert('post_view_count', $input);
      return true;
    }else{
      return false;
    }
  }

  function visitor_count()
  {
    $ip = $_SERVER['REMOTE_ADDR'];
    $sql = "SELECT * FROM visitor_counter
      WHERE ip_addr = '$ip' AND DATE(time_visit) = CURDATE()";
    $check = $this->db->query($sql)->num_rows();
    if ($check == 0) {
      $input = [
        'ip_addr' => $ip
      ];
      $this->db->insert('visitor_counter', $input);
      return true;
    }else{
      return false;
    }
  }


  function recent_post()
  {
      $this->db->where('post_sts', 1);
      $this->db->order_by('post_id', "DESC");
      return $this->db->get('v_post', 5)->result_array();
  }

  function top_post()
  {
    $sql = "SELECT
         a.title,
         a.post_slug,
         COUNT(b.post_view_count_id) as hitung
        FROM post a

        LEFT JOIN post_view_count b ON a.post_id = b.post_id

        WHERE a.post_sts = 1

        GROUP BY a.post_id

        ORDER BY hitung DESC

        LIMIT 5
        ";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  function viewers($post_id)
  {
    $this->db->where('post_id', $post_id);
    return $this->db->get('post_view_count')->num_rows();
  }

  function search($keyword)
  {
    $this->db->like('title',$keyword);
    $this->db->where('post_sts', 1);
    return $this->db->get('v_post');
  }

  
}
