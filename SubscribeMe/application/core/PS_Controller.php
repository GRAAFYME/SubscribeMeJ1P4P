<?php

/*
|--------------------------------------------------------------------------
| PS_Controller
|--------------------------------------------------------------------------
|
| This class (PS_Controller) is protecting the webpages 
| from unauthorised access.
|
*/

class PS_Controller extends MY_Controller 
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role') != "personeel")
        {
            redirect('home');
        }
    }
}

/* End of file PS_Controller.php */
/* Location: ./application/core/PS_Controller.php */