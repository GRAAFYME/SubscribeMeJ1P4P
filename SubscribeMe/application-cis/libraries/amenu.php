<?php

class Amenu {

  // Here we build the amenu -> admin menu
  function show_menu()
  {
    $obj =& get_instance();
    $obj->load->helper('url');
    $amenu = "<ul>";
      $amenu .= "<li>"; $amenu .= anchor("/admin","Home"); $amenu .= "</li>";
      $amenu .= "<li>"; $amenu .= anchor("/admin/faq","FAQ"); $amenu .= "</li>";
      $amenu .= "<li>"; $amenu .= anchor("/admin/nieuws","Nieuws"); $amenu .= "</li>"; 
      $amenu .= "<li>"; $amenu .= anchor("/admin/paginas","Pagina's"); $amenu .= "</li>";
      $amenu .= "<li>"; $amenu .= anchor("/admin/toetsen","Toetsen"); $amenu .= "</li>";
    $amenu .= "</ul>";

    return $amenu;
  }
}