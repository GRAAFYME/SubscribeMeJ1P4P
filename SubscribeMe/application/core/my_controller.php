<?php
//This class is for protection on webpages.
class MY_Controller extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('is_logged_in'))
        {
            redirect('login');
        }
    }
}