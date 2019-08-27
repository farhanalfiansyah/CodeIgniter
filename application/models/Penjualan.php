<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Model{

    private $table = "penjualan";

    public function insert($data){
        $query = $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function get_one($where){
        return $this->db->get_where($this->table, $where)->row();
    }
    
    public function get_many($where, $select = "*"){
        $this->db->select($select);
        return $this->db->get_where($this->table, $where)->result();
    }
}