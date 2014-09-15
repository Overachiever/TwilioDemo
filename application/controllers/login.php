<?php
/**
 * Created by PhpStorm.
 * User: sjohnson
 * Date: 9/14/2014
 * Time: 4:40 PM
 */

class Login extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        if($this->session->userdata('username'))
        {
            redirect('messages');
        }

        $this->load->model('user_model');
    }

    function index()
    {
        if($this->input->post())
        {
            $user = $this->user_model->login($this->input->post('username'), $this->input->post('password'));

            if($user)
            {
                redirect('/');
            }

            $this->add_message('Invalid username or password.');
        }

        $this->load->template('login', $this->data());
    }

    public function logout()
    {
        $this->user_model->logout();
        $this->session->set_flashdata('success', 'You have been successfully logged out!');
        redirect('login');
    }
}