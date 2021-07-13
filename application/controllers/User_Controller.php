<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
    }
    
    public function check_auth()
    {
        if ($this->session->userdata('logged_in')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function redir($page)
    {
        $this->session->set_flashdata('msg', "You need to be logged in to access the $page page.");
        $this->load->view('login_view');
    }

    public function index()
    {
        //restrict users to go back to login if session has been set
        if ($this->session->userdata('user')) {
            redirect('home');
        } else {
            $this->load->view('login_view');
        }
    }

    public function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $data = $this->users_model->login($username, $password);

        if ($data) {
            $this->session->set_userdata('user', $data);
            $this->session->set_userdata('logged_in', TRUE);
            redirect('home');
        } else {
            header('location:' . base_url() . $this->index());
            $this->session->set_flashdata('error', 'Invalid login. User not found');
        }
    }

    public function home()
    {
        //restrict users to go to home if not logged in
        if ($this->session->userdata('user')) {
            $this->load->view('home');
        } else {
            redirect('/');
        }

    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('logged_in');
        redirect('/');
    }
}