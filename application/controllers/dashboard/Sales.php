<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sales extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('dashboard/login'));

        $this->load->model("product_model"); 
        $this->load->model("wallet_model"); 
        $this->load->model("customer_model"); 

        $this->load->helper(array('form', 'url'));
    }
    
    public function index()
    {
        $data["products"] = $this->product_model->getAll();
        $data["wallets"] = $this->wallet_model->getAll();
        $data["customers"] = $this->customer_model->getAll();
        $this->load->view("dashboard/pointofsales", $data);
    }
}