<?php

/*
|--------------------------------------------------------------------------
| ST_Controller
|--------------------------------------------------------------------------
|
| This class (ST_Controller) is protecting the webpages 
| from unauthorised access.
|
*/

class ST_Controller extends MY_Controller 
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role') != "student")
        {
            redirect('home');
        }
    }
}

/* End of file ST_Controller.php */
/* Location: ./application/core/ST_Controller.php */