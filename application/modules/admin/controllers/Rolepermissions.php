<?php

class Rolepermissions extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index() {
    $rolepermissions_page = "admin/rolepermissions/index";
    $this->template->AdminLayout($rolepermissions_page);
  }
}