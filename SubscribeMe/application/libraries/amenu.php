<?php

class Amenu {

  function show_menu()
  {
    $obj =& get_instance();
    $obj->load->helper('url');
    $amenu = "<ul>";
      $amenu .= "<li>"; $amenu .= anchor("/","Home"); $amenu .= "</li>"; $amenu .= "</li>";
    $amenu .= "</ul>";

    return $amenu;
  }
}