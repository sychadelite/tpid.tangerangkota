<?php

class Home extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index() {
    $home_page = "main/home/index";
    $this->template->MainLayout($home_page);
  }
}