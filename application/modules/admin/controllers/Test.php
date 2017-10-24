<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MX_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index($id)
  {
    echo $id;
  }

}
