<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PenjualanDetail extends CI_Model{

    private $table = "detail_penjualan";

    public function insert($data){
        return $this->db->insert($this->table, $data);
    }
    
    public function get_one($where){
        return $this->db->get_where($this->table, $where)->row();
    }
    
    public function get_many($where, $select = "*"){
        $this->db->select($select);
        return $this->db->get_where($this->table, $where)->result();
    }
}