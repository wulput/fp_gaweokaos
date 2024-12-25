<?php
class Main extends CI_Controller{

    public function index(){
        $this->load->view('main_produk');
    }

    public function produk(){
        $this->load->view('produk');
    }
}