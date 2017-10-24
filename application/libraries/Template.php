<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template{
  protected $ci;

	public function __construct(){
        $this->ci =& get_instance();
	}

	public function display($template,$data=null){
		$data['content']=$this->ci->load->view('content/'.$template, $data, TRUE);
		$data['topmenu']=$this->ci->load->view('template/topmenu',$data,TRUE);
		$data['sidebar']=$this->ci->load->view('template/sidebar',$data,TRUE);
		$data['footer']=$this->ci->load->view('template/footer',$data,TRUE);
		$this->ci->load->view('/template.php',$data);
	}
}

/* End of file Template.php */
/* Location: ./application/libraries/Template.php */
