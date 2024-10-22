<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Model_auth');
    }

    function index()
    {
        if ($this->session->userdata('logged') !== true) {
            $this->parser->parse('_layouts/login', [
                'head' => $this->parser->parse('_partials/head', [], true),
                'contents' => $this->parser->parse('auth/login', [], true)
            ]);
        } else {
            redirect($this->session->level);
        }
    }

    function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($this->Model_auth->validation($username, $password)) {
            $akun = $this->Model_auth->get_akun($username);

            if ($akun['status'] === 'Nonaktif') {
                $this->session->set_flashdata('error', 'Akun anda nonaktif');
                redirect(base_url());
            }

            $this->session->set_userdata('logged', true);
            $this->session->set_userdata('level', strtolower($akun['level']));
            $this->session->set_userdata('username', $akun['username']);
            redirect($this->session->level);
        } else {
            $this->session->set_flashdata('error', 'Username atau password salah');
            redirect(base_url());
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
