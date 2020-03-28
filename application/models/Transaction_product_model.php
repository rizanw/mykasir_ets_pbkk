<?php defined('BASEPATH') or exit('No direct script access allowed');

class Transaction_product_model extends CI_Model
{
    private $_table = "transaction_product";

    public $id;
    public $transaction_id;
    public $product_id; 
    public $quantity;

    public function rules()
    {
        return [ ];
    }

    public function save($transaction_id, $product_id, $quantity)
    { 
        $this->id = uniqid();
        $this->transaction_id = $transaction_id;
        $this->product_id = $product_id; 
        $this->quantity = $quantity; 
        return $this->db->insert($this->_table, $this);
    }
}
