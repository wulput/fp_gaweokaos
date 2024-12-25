<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Memuat model yang digunakan untuk autentikasi
        $this->load->model('User_model');
        $this->load->helper('url');
    }

    // Menampilkan halaman login
    public function index_login() {
        $this->load->view('login');
    }

    // Menampilkan halaman register
    public function index_register() {
        $this->load->view('register');
    }


    // Proses login
    public function login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        // Validasi input (misalnya jika email kosong)
        if (empty($email) || empty($password)) {
            $this->session->set_flashdata('error', 'Email dan password harus diisi.');
            redirect('authcontroller/index_login');
        }

        // Memanggil method untuk memeriksa kredensial pengguna
        $user = $this->User_model->check_login($email, $password);

        if ($user) {
            // Jika login berhasil, simpan data pengguna dalam sesi
            $this->session->set_userdata('user_id', $user['id_user']);
            $this->session->set_userdata('user_email', $user['email']);
            redirect('dashboard'); // Redirect ke halaman dashboard atau halaman yang diinginkan
        } else {
            // Jika gagal login, beri pesan error
            $this->session->set_flashdata('error', 'Email atau password salah.');
            redirect('authcontroller/index');
        }
    }

    // Proses registrasi
    public function register() {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $role = 'user';
        
        // Validasi input (misalnya jika salah satu kolom kosong atau password tidak cocok)
        if (empty($name) || empty($email) || empty($password)) {
            $this->session->set_flashdata('error', 'Semua kolom harus diisi.');
            redirect('authcontroller/index_register');
        }

        // if ($password !== $password_confirm) {
        //     $this->session->set_flashdata('error', 'Password dan konfirmasi password tidak cocok.');
        //     redirect('registercontroller/index');
        // }

        // Memanggil method untuk menyimpan data pengguna baru
        $result = $this->User_model->register_user($name, $email, $password);

        if ($result) {
            // Jika registrasi berhasil, redirect ke halaman login
            $this->session->set_flashdata('success', 'Akun berhasil dibuat. Silakan login.');
            redirect('authcontroller/index_login');
        } else {
            // Jika gagal registrasi (misalnya email sudah terdaftar)
            $this->session->set_flashdata('error', 'Email sudah terdaftar.');
            redirect('registercontroller/index');
        }
    }

    // Logout
    public function logout() {
        // Menghapus sesi login
        $this->session->sess_destroy();
        redirect('authcontroller/index'); // Redirect ke halaman login
    }
}
