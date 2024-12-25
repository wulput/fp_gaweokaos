<?php
class Main extends CI_Controller{

    public function index(){
        $this->load->view('main_produk');
    }

    public function produk(){
        $this->load->view('produk');
    }

    public function login() {
        $this->load->view('login');
    }

    public function register() {
        $this->load->view('register');
    }
}