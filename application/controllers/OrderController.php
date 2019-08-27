<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderController extends CI_Controller {
        public function __construct(){
                parent::__construct();
                $this->load->model('Penjualan');
                $this->load->model('DetailPenjualan');
            }

        public function createOrder()
        {
                $DataPenjualan = json_decode($this->input->raw_input_stream,true);
                if($DataPenjualan){
                        
                }
        }
}