<?php defined('BASEPATH') or exit('No direct script access allowed');

class Payment_model extends CI_Model
{
    private $_table = "payments";

    public $payment_id;
    public $transaction_id;
    public $wallet_id; 
    public $amount; 
    public $status; 
    public $datetime;

    public function rules()
    {
        return [ ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["payment_id" => $id])->row();
    }

    public function getByTransaction($id)
    {
        return $this->db->get_where($this->_table, ["transaction_id" => $id])->row();
    }

    public function save($transaction_id, $post)
    {
        $this->payment_id = uniqid();
        $this->transaction_id = $transaction_id;
        $this->wallet_id = $post['wallet'];
        $this->amount = $post['amount'];
        $this->status = $post['status'];
        $this->datetime = date("Y-m-d H:i:s"); 
        return $this->db->insert($this->_table, $this);
    } 
    
    public function update($post)
    {
        $payment = $this->getById($post['payment']);
        $this->payment_id = $post['payment']; 
        $this->transaction_id = $payment->transaction_id;
        $this->wallet_id = $post['wallet'];
        $this->amount = $post['amount'];
        $this->status = $post['status'];
        $this->datetime = date("Y-m-d H:i:s"); 
        return $this->db->update($this->_table, $this, array('payment_id' => $post['payment']));
    }
}
