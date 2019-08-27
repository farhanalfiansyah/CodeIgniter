<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderController extends CI_Controller {
        public function __construct(){
                parent::__construct();
                $this->load->model('Penjualan');
                $this->load->model('PenjualanDetail');
            }

        public function createOrder()
        {
                $DataPenjualan = json_decode($this->input->raw_input_stream,true);
                if($DataPenjualan){
                        $Detail = $DataPenjualan['DetilPenjualan'];
                        $TambahPenjualan = $this->Penjualan->insert([
                                'nama_pelanggan' => $DataPenjualan['NamaPelanggan'],
                                'tanggal' => $DataPenjualan['Tanggal'],
                                'jam' => $DataPenjualan['Jam'],
                                'total' => $DataPenjualan['Total'],
                                'bayar_tunai' => $DataPenjualan['BayarTunai'],
                                'kembali' => $DataPenjualan['Kembali']
                        ]);
                        if($TambahPenjualan){
                                $Penjualan = $this->Penjualan->get_one(['nama_pelanggan'=>$DataPenjualan['NamaPelanggan']]);
                                foreach ($Detail as $key) {
                                        $TambahDetail = $this->PenjualanDetail->insert([
                                                'penjualan_id'=>$Penjualan->id,
                                                'item' => $key['Item'],
                                                'qty' => $key['Qty'],
                                                'harga_satuan' => $key['HargaSatuan'],
                                                'sub_total' => $key['SubTotal']
                                        ]);        
                                }
                                echo "SUCCESS";
                        }
                }
        }
}