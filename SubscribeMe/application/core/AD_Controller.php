<?php

/*
|--------------------------------------------------------------------------
| AD_Controller
|--------------------------------------------------------------------------
|
| This class (AD_Controller) is protecting the webpages 
| from unauthorised access.
|
*/

class AD_Controller extends MY_Controller 
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role') != "admin")
        {
            redirect('home');
        }
    }
}

/* End of file AD_Controller.php */
/* Location: ./application/core/AD_Controller.php */