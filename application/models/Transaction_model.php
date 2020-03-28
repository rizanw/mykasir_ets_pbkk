<?php defined('BASEPATH') or exit('No direct script access allowed');

class Transaction_model extends CI_Model
{
    private $_table = "transactions";

    public $transaction_id;
    public $kasir_id;
    public $customer_id; 
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
        return $this->db->get_where($this->_table, ["product_id" => $id])->row();
    }

    public function save($transaction_id, $post)
    {
        $this->transaction_id = $transaction_id;
        $this->kasir_id = $post["kasirId"];
        $this->customer_id = $post["customerId"];
        $this->datetime = date("Y-m-d H:i:s"); 
        return $this->db->insert($this->_table, $this);
    }
 
}
