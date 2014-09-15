<?php
/**
 * Created by PhpStorm.
 * User: sjohnson
 * Date: 9/14/2014
 * Time: 4:43 PM
 */

class Twilio extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('message_model');
    }

    public function index()
    {
        if($this->input->post('Body'))
        {
            $result = $this->message_model->get_by('keyword', $this->input->post('Body'));
            if($result)
            {
                $this->output->set_content_type('application/xml')->set_output($this->load->view('twilio', array('response' => $result->response), true));
            }
        }
    }
} 