<?php
/**
 * Created by PhpStorm.
 * User: sjohnson
 * Date: 9/14/2014
 * Time: 4:34 PM
 */

class MY_Loader extends CI_Loader
{
    /*custom loader for building a template*/
    public function template($template_name, $vars = array(), $return = FALSE)
    {
        $content  = $this->view('template/header', $vars['header'], $return);
        $content .= $this->view($template_name, $vars['body'], $return);
        $content .= $this->view('template/footer', $vars['footer'], $return);

        if ($return)
        {
            return $content;
        }
    }
} 