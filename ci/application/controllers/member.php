<?php

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $this->login();
    }

    public function login()
    {
        $data['title'] = 'ログイン';
        $this->load->view('members/login');
    }

    public function logout()
    {
        $data['title'] = 'ログアウト';
        $this->session->sess_destroy();
        $this->load->view('members/logout');
        $this->load->view('members/login');
    }

    public function checkLogin()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required|trim|');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->MemberModel->login() === true) {
            $this->load->view('members/success_login');
        } else {
            $this->load->view('members/login');
        }
    }

    public function register()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|is_unique[members.email]|valid_email'
        );
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[12]');

        if ($this->form_validation->run() === false) {
            $this->load->view('members/register');
        } else {
            $this->MemberModel->insertMember();
            $this->load->view('members/success_register');
        }
    }
}
