<?php

class Wallets extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		
		$this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('dashboard/login'));

        $this->load->library('form_validation');
		$this->load->model("wallet_model");
		
        $this->load->helper(array('form', 'url'));
	}

	public function index()
	{
        $data["wallets"] = $this->wallet_model->getAll();
        $this->load->view("dashboard/wallet", $data);
	}

    public function add()
    {
        $wallet = $this->wallet_model;
        $validation = $this->form_validation;
        $validation->set_rules($wallet->rules());

        if ($validation->run()) {
            $wallet->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

		redirect('/dashboard/wallets', 'refresh');
    }
}