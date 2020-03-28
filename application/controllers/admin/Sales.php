<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sales extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));

        $this->load->model("product_model");
        $this->load->library('form_validation');

        $this->load->helper(array('form', 'url'));
    }
    
    public function index()
    {
        $data["products"] = $this->product_model->getAll();
        $this->load->view("admin/pointofsales", $data);
    }
}