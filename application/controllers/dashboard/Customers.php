<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('dashboard/login'));
        if($this->session->userdata('user_logged')->role != 'admin') redirect(site_url('dashboard'));

        $this->load->model("customer_model");
        $this->load->library('form_validation');

        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $data["customers"] = $this->customer_model->getAll();
        $this->load->view("dashboard/customer/list", $data);
    }

    public function add()
    {
        $customer = $this->customer_model;
        $validation = $this->form_validation;
        $validation->set_rules($customer->rules());

        if ($validation->run()) {
            $customer->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("dashboard/customer/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('dashboard/customers');

        $customer = $this->customer_model;
        $validation = $this->form_validation;
        $validation->set_rules($customer->rules());

        if ($validation->run()) {
            $customer->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["customer"] = $customer->getById($id);
        if (!$data["customer"]) show_404();

        $this->load->view("dashboard/customers/edit_form", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->customer_model->delete($id)) {
            redirect(site_url('dashboard/customers'));
        }
    }
}
