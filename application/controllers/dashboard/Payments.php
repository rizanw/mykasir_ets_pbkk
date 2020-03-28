<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payments extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('dashboard/login'));

        $this->load->model("payment_model");
        $this->load->model("wallet_model"); 

        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $data["payments"] = $this->payment_model->getAll();
        $data["wallets"] = $this->wallet_model->getAll();
        $this->load->view("dashboard/payments", $data);
    }

    public function edit()
    {
        $post = $this->input->post();
        $payment = $this->payment_model;        
        $wallet = $this->wallet_model; 
 
        if (($post['wallet']) == 0){
            $this->session->set_flashdata('fails', 'Masukkan metode pembayaran(wallet)');
        }else{
            $payment->update($post);
            $wallet->update($post);
        }
        redirect('dashboard/payments');
    }
 
}
