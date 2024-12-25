<?php
class Admin extends CI_Controller{

    public function index(){
        $this->load->view('home_admin');
    }

    public function produk(){
        $this->load->view('tabel_produk');
    }

    public function dashboard(){
        $this->load->view('dashboard_admin');
    }

}