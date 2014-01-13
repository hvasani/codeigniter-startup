<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends Bootstrap {

  public function __construct(){
    parent::__construct();
  }

	public function index()
	{
    $this->layout->view('index', $this->render_settings);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */