<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transactions extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('dashboard/login'));

        $this->load->model("transaction_model");
        $this->load->model("transaction_product_model");
        $this->load->model("user_model");
        $this->load->model("customer_model");
        $this->load->model("payment_model");
        $this->load->model("wallet_model");
        $this->load->model("product_model");
        $this->load->library('form_validation');

        $this->load->helper(array('form', 'url'));
    }

    public function index()
    { 
        $data["transactions"] = $this->transaction_model->getAll();
        $data["cashiers"] = $this->user_model->getAll();
        $data["customers"] = $this->customer_model->getAll();
        $this->load->view("dashboard/transaction", $data);
    }

    public function add()
    {
        
        $post = $this->input->post();
        $transaction_id = uniqid();

        $transaction = $this->transaction_model; 
        $transaction->save($transaction_id, $post);
        
        foreach ($post["products"] as $product) {
            $product = explode(" ", $product);
            $transaction_product = $this->transaction_product_model;
            $transaction_product->save($transaction_id, $product[0], $product[1]);
        }

        $payment = $this->payment_model;
        $payment->save($transaction_id, $post);
        
        if($post['status'] == 1){
            $wallet = $this->wallet_modal;
            $wallet->update($post['wallet'], $post['amount']);
        }

        $this->session->set_flashdata('success', 'Berhasil disimpan');
		redirect('/dashboard/wallets', 'refresh');
    }

    public function invoice($id = null)
    {
        if (!isset($id)) redirect('dashboard/transactions');

        $transaction = $this->transaction_model; 
        $data["transaction"] = $transaction->getById($id); 
        $customer = $this->customer_model; 
        $data['customer'] = $customer->getById($data["transaction"]->customer_id);
        $payment = $this->payment_model; 
        $data['payment'] = $payment->getByTransaction($id);        
        $wallet = $this->wallet_model; 
        $data['wallets'] = $wallet->getAll();
        $transaction_product = $this->transaction_product_model;
        $data['transaction_product'] = $transaction_product->getByTransaction($id);
        $product = $this->product_model; 
        $data['products'] = $product->getAll();
 
        $this->load->view("dashboard/invoice", $data);
    }
}
