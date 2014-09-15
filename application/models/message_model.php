<?php
/**
 * Created by PhpStorm.
 * User: sjohnson
 * Date: 9/14/2014
 * Time: 5:48 PM
 */

class Message_model extends MY_Model
{
    protected $primary_key = 'message_id';

    protected $validate = array(
        array('field' => 'keyword',
              'label' => 'Keyword',
              'rules' => 'required|max_length[255]'),
        array('field' => 'response',
              'label' => 'Response',
              'rules' => 'required|max_length[255]')
    );

    protected $before_create = array('created_at', 'updated_at');
    protected $before_update = array('updated_at');

    public function __construct()
    {
        parent::__construct();
    }
} 