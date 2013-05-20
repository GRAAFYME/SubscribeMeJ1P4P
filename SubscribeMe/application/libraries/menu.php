<?php

class Menu {

  function show_menu()
  {
    $obj =& get_instance();
    $obj->load->helper('url');
    $menu = "<ul>";
      $menu .= "<li>"; $menu .= anchor("/home","Home"); $menu .= "</li>";
      $menu .= "<li>"; $menu .= anchor("/about", "About");
        $menu .= "<ul>";
          $menu .= "<li>"; $menu .= anchor("#", "A");
            $menu .= "<ul>";
              $menu .= "<li>"; $menu .= anchor("#", "A A"); 
                $menu .= "<ul>";
                  $menu .= "<li>"; $menu .= anchor("#", "A A A"); $menu .= "</li>";
                  $menu .= "<li>"; $menu .= anchor("#", "A A B"); $menu .= "</li>";
                  $menu .= "<li>"; $menu .= anchor("#", "A A C"); $menu .= "</li>";
                $menu .= "</ul>";
              $menu .= "</li>";
              $menu .= "<li>"; $menu .= anchor("#", "A B"); $menu .= "</li>";
              $menu .= "<li>"; $menu .= anchor("#", "A C"); $menu .= "</li>";
              $menu .= "<li>"; $menu .= anchor("#", "A D"); $menu .= "</li>";
            $menu .= "</ul>";
          $menu .= "</li>";
          $menu .= "<li>"; $menu .= anchor("#", "B"); $menu .= "</li>";
          $menu .= "<li>"; $menu .= anchor("#", "C"); $menu .= "</li>";
        $menu .= "</ul>";
      $menu .= "</li>";
      $menu .= "<li>"; $menu .= anchor("/news", "News");
        $menu .= "<ul>";
          $menu .= "<li>"; $menu .= anchor("/news/create", "Create"); $menu .= "</li>";
        $menu .= "</ul>";
      $menu .= "</li>";
      $menu .= "<li>"; $menu .= anchor("/logout","Uitloggen"); $menu .= "</li>";
    $menu .= "</ul>";

    return $menu;
  }
}