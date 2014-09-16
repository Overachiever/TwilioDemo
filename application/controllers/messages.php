<?php
/**
 * Created by PhpStorm.
 * User: sjohnson
 * Date: 9/14/2014
 * Time: 4:43 PM
 */

class Messages extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('message_model');
        $this->add_script(base_url('assets/js/messages.js'));
    }

    public function index($messageId = 0)
    {
        /*handle delete message*/
        if($this->input->post('delete'))
        {
            $this->message_model->delete($messageId);
            $this->session->set_flashdata('success', 'The keyword was successfully deleted.');
            redirect('/');
        }
        /* handle edit / add message */
        else if($this->input->post())
        {
            $payload = array('keyword' => $this->input->post('keyword'), 'response' => $this->input->post('response'));

            if($messageId)
            {
                $result = $this->message_model->update($messageId, $payload);
            }
            else
            {
                $result = $this->message_model->insert($payload);
            }

            if($result)
            {
                $this->session->set_flashdata('success', 'The keyword was successfully ' . ($messageId ? 'updated' : 'added') .  '.');
                redirect('/');
            }

        }

        /*build template data*/
        $message = array();

        if($messageId)
        {
            $message = $this->message_model->get($messageId);
        }

        $this->body = array(
            'messages' => $this->message_model->get_all(),
            'keyword' => $this->input->post() ? $this->input->post('keyword') : ($message ? $message->keyword : ''),
            'response' => $this->input->post() ? $this->input->post('response') : ($message ? $message->response : ''),
            'messageId' => $message ? $message->message_id : 0
        );

        $this->load->template('messages', $this->data());
    }
} 