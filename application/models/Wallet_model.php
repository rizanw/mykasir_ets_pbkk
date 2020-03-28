<?php defined('BASEPATH') or exit('No direct script access allowed');

class Wallet_model extends CI_Model
{
    private $_table = "wallets";

    public $wallet_id;
    public $name;
    public $amount; 
    public $description;

    public function rules()
    {
        return [
            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
            ],

            [
                'field' => 'amount',
                'label' => 'Amount',
                'rules' => 'numeric'
            ], 

            [
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required'
            ]
        ];
    } 

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["wallet_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->wallet_id = uniqid();
        $this->name = $post["name"];
        $this->amount = $post["amount"]; 
        $this->description = $post["description"]; 
        return $this->db->insert($this->_table, $this);
    }

    public function update($post)
    {
        $wallet = $this->getById($post['wallet']);
        $this->wallet_id = $wallet->wallet_id;
        $this->name = $wallet->name;
        $this->description = $wallet->description; 
        $this->amount = (int)$wallet->amount + (int)$post['amount'];   
        return $this->db->update($this->_table, $this, array('wallet_id' => $post['wallet']));
    }

    public function delete($id)
    { 
        return $this->db->delete($this->_table, array("wallet_id" => $id));
    }
 
}
