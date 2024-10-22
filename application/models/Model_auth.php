<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_auth extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_akun($username)
    {
        return $this->db->get_where('users', ['username' => $username])->row_array();
    }

    function validation($username, $password)
    {
        $akun = $this->get_akun($username);

        if (!empty($akun)) {
            return password_verify($password, $akun['password']);
        } else {
            return false;
        }
    }
}
