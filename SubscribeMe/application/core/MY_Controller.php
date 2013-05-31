<?php

/*
|--------------------------------------------------------------------------
| MY_Controller
|--------------------------------------------------------------------------
|
| This class (MY_Controller) is protecting the webpages 
| from unauthorised access.
|
*/

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

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */