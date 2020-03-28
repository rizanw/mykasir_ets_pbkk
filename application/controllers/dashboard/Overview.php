<?php

class Overview extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		
		$this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('dashboard/login'));
	}

	public function index()
	{
        // load view dashboard/overview.php
        $this->load->view("dashboard/overview");
	}
}