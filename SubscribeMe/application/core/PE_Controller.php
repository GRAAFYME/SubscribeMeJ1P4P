<?php

/*
|--------------------------------------------------------------------------
| PE_Controller
|--------------------------------------------------------------------------
|
| This class (PE_Controller) is protecting the webpages 
| from unauthorised access.
|
*/

class PE_Controller extends MY_Controller 
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

/* End of file PE_Controller.php */
/* Location: ./application/core/PE_Controller.php */