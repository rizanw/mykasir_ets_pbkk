<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('dashboard/login'));
        
        if($this->session->userdata('user_logged')->role != 'admin') redirect(site_url('dashboard'));

        $this->load->model("product_model");
        $this->load->library('form_validation');

        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $data["products"] = $this->product_model->getAll();
        $this->load->view("dashboard/product/list", $data);
    }

    public function add()
    {
        $product = $this->product_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("dashboard/product/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('dashboard/products');

        $product = $this->product_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["product"] = $product->getById($id);
        if (!$data["product"]) show_404();

        $this->load->view("dashboard/product/edit_form", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->product_model->delete($id)) {
            redirect(site_url('dashboard/products'));
        }
    }
}
