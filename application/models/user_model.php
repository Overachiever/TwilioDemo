<?php
/**
 * Created by PhpStorm.
 * User: sjohnson
 * Date: 9/14/2014
 * Time: 5:48 PM
 */

class User_model extends MY_Model
{
    protected $primary_key = 'user_id';

    public function __construct()
    {
        parent::__construct();
    }

    public function login($username, $password)
    {
        $valid = false;

        $user = $this->get_by('username', $username);

        if($user)
        {
            $this->load->library('encrypt');

            if($this->encrypt->decode($user->password) == $password)
            {
                $this->session->set_userdata('username', $username);
                $valid = true;
            }
        }

        return $valid;
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
    }
}
