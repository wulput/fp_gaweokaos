<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Cek kredensial login
    public function check_login($email, $password) {
        // Cari user berdasarkan email
        $this->db->where('email', $email);
        $query = $this->db->get('user');
        $user = $query->row_array();
    
        // Jika user tidak ditemukan
        if (!$user) {
            log_message('debug', 'User with email ' . $email . ' not found.');
            return false;  // Email tidak ditemukan
        }
    
        // Verifikasi password
        if (password_verify($password, $user['pass'])) {
            log_message('debug', 'Password verification successful.');
            return $user;  // Login berhasil
        } else {
            log_message('debug', 'Password verification failed.');
            return false;  // Password salah
        }
    }
    
    

    // Menyimpan data pengguna baru untuk registrasi
    public function register_user($name, $email, $password, $role) {
        // Mengecek apakah email sudah terdaftar
        $this->db->where('email', $email);
        $query = $this->db->get('user');
        
        if ($query->num_rows() > 0) {
            return false; // Email sudah terdaftar
        }
        
        // Menyimpan data pengguna baru
        $data = array(
            'nama' => $name,
            'email' => $email,
            'pass' => password_hash($password, PASSWORD_DEFAULT),
            // 'pass' => $password,
            'role' => $role
        );
        
        $this->db->insert('user', $data);
        return true;
    }
}
