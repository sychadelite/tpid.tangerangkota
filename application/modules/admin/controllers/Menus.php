<?php

class Menus extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function admin() {
    $menus_page = "admin/menus/admin";
    $this->template->AdminLayout($menus_page);
  }

  public function main() {
    $menus_page = "admin/menus/main";
    $this->template->AdminLayout($menus_page);
  }
}