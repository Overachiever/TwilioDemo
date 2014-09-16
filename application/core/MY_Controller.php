<?php
/**
 * Created by PhpStorm.
 * User: sjohnson
 * Date: 9/14/2014
 * Time: 3:25 PM
 */

class MY_Controller extends CI_Controller
{
    protected $header = array();
    protected $body = array();
    protected $footer = array();
    protected $unsecured_controllers = array('login', 'twilio');

    function __construct()
    {
        parent::__construct();

        //check to see if user is allowed to see the page otherwise send to login page
        if(!in_array($this->router->fetch_class(), $this->unsecured_controllers) && !$this->session->userdata('username'))
        {
            $this->session->set_flashdata('error', 'Access Denied - Please login.');
            redirect('login');
        }

        /*configure some default values for template variables*/
        $this->header = array(
            'messages' => array(
                'danger' => array(),
                'success' => array(),
                'info' => array()
            ),
            'username' => $this->session->userdata('username')
        );

        $this->footer['scripts'] = array();

        /*convert flashdata to messages*/
        if($this->session->flashdata('success'))
        {
            $this->add_message($this->session->flashdata('success'), 'success');
        }

        if($this->session->flashdata('error'))
        {
            $this->add_message($this->session->flashdata('error'));
        }
    }

    /*build template variables*/
    protected function data()
    {
        return array('header' => $this->header, 'body' => $this->body, 'footer' => $this->footer);
    }

    /*add danger, warning, info, success messages*/
    protected function add_message($message, $type = 'danger')
    {
        array_push($this->header['messages'][$type], $message);
    }

    /*add javascript includes to footer*/
    protected function add_script($script)
    {
        array_push($this->footer['scripts'], $script);
    }
}