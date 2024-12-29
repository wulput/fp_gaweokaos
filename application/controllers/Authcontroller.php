<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(['session', 'form_validation']);
        $this->load->model('User_model');
        $this->load->helper(['url', 'form']);
    }

    // Menampilkan halaman login
    public function index_login() {
        $this->load->view('login');
    }

    // Menampilkan halaman register
    public function index_register() {
        $this->load->view('register');
    }

    // Login User
    public function login() {
        // Redirect jika user sudah login
        if ($this->session->userdata('user_id')) {
            $role = $this->session->userdata('user_role');
            if ($role === 'admin') {
                redirect('admin/dashboard'); // Ganti dengan rute admin
            } else {
                redirect(base_url());
            }
            return;
        }
    
        // Jika ada form POST
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $email = trim($this->input->post('email'));
            $password = trim($this->input->post('password'));
    
            // Validasi input
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');
    
            if ($this->form_validation->run() === FALSE) {
                $this->session->set_flashdata('error', validation_errors('<p>', '</p>'));
            } else {
                $user = $this->User_model->check_login($email, $password);
    
                if ($user) {
                    // Periksa apakah password benar
                    if (password_verify($password, $user['password'])) {
                        // Set session data
                        $this->session->set_userdata([
                            'user_id' => $user['id_user'],
                            'user_email' => $user['email'],
                            'user_role' => $user['role']
                        ]);
    
                        // Logging atau menampilkan role user
                        log_message('debug', 'Login berhasil. Role user: ' . $user['role']);
    
                        // Redirect sesuai role
                        if ($user['role'] === 'admin') {
                            redirect('admin/dashboard'); // Ganti dengan rute admin
                        } else {
                            redirect(base_url());
                        }
                    } else {
                        // Jika password salah
                        $this->session->set_flashdata('error', 'Password salah.');
                        log_message('error', 'Password salah untuk email: ' . $email);
                    }
                } else {
                    // Jika user tidak ditemukan
                    $this->session->set_flashdata('error', 'Akun tidak ditemukan.');
                    log_message('error', 'Akun tidak ditemukan dengan email: ' . $email);
                }
            }
        }
    
        // Load tampilan login
        $this->load->view('login');
    }
    

    // Register User
    public function register() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

            if ($this->form_validation->run() === FALSE) {
                $this->session->set_flashdata('error', validation_errors('<p>', '</p>'));
            } else {
                $name = $this->input->post('nama');
                $email = $this->input->post('email');
                // $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                $password = $this->input->post('password');
                $role = 'user';

                $result = $this->User_model->register_user($name, $email, $password, $role);

                if ($result) {
                    $this->session->set_flashdata('success', 'Akun berhasil dibuat. Silakan login.');
                    redirect('authcontroller/index_login');
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
        $this->session->sess_destroy();
        redirect('authcontroller/index_login');
    }
}
