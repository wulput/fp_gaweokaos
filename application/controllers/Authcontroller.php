<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_model');
        $this->load->helper(['url', 'form']);
        $this->load->library(['session', 'form_validation']);
    }

    // Menampilkan halaman login
    public function index_login() {
        $this->load->view('login');
    }

    // Menampilkan halaman register
    public function index_register() {
        $this->load->view('register');
    }

    public function login() {
        // Jika user sudah login, redirect sesuai role
        if ($this->session->userdata('user_id')) {
            $role = $this->session->userdata('user_role');
            redirect($role === 'admin' ? 'home_admin' : 'main_produk');
        }
    
        // Jika ada form POST
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Ambil data dari form
            $email = trim($this->input->post('email'));
            $password = trim($this->input->post('password'));
            // var_dump($email);exit();
            // // Debug untuk memastikan data diterima
            log_message('debug', 'Email: ' . $email);
            log_message('debug', 'Password: ' . ($password ? '[HIDDEN]' : 'EMPTY'));
    
            // Validasi input kosong
            if (empty($email) || empty($password)) {
                $this->session->set_flashdata('error', 'Email dan password harus diisi.');
            } else {
                // Periksa login dengan model
                $user = $this->User_model->check_login($email, $password);
                
    
                if ($user) {
                    // Set session data
                    $this->session->set_userdata([
                        'user_id' => $user['id_user'],
                        'user_email' => $user['email'],
                        'user_role' => $user['role']
                    ]);
                
                    // Redirect sesuai role
                    redirect($user['role'] === 'admin' ? 'home_admin' : 'main_produk');
                } else {
                    // Jika login gagal
                    $this->session->set_flashdata('error', 'Email atau password salah.');
                }
            }
        }
    
        // Load tampilan login
        $this->load->view('login');
    }
    

    public function register() {
        // Jika ada form POST
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

            if ($this->form_validation->run() === FALSE) {
                $this->session->set_flashdata('error', validation_errors('<p>', '</p>'));
            } else {
                $name = $this->input->post('nama');
                $email = $this->input->post('email');
                $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                $role = 'user';

                // Daftarkan user
                $result = $this->User_model->register_user($name, $email, $password, $role);
                if ($result) {
                    $this->session->set_flashdata('success', 'Akun berhasil dibuat. Silakan login.');
                    redirect('index.php/authcontroller/index_login');
                } else {
                    $this->session->set_flashdata('error', 'Email sudah terdaftar.');
                }
            }
        }

        // Load tampilan register
        $this->load->view('register');
    }

    // Logout
    public function logout() {
        // Menghapus sesi login
        $this->session->sess_destroy();
        redirect('authcontroller/index_login'); // Redirect ke halaman login
    }
}
