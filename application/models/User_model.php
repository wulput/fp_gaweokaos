<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Cek kredensial login
    public function check_login($email, $password) {
        $this->db->where('email', $email);
        $query = $this->db->get('user');
        $user = $query->row_array();
        
        if ($user && password_verify($password, $user['user_password'])) {
            return $user;
        }
        
        return false;
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
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role' => $role
        );
        
        $this->db->insert('user', $data);
        return true;
    }
}
