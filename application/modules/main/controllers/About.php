<?php

class About extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index() {
    $about_page = "main/about/index";
    $this->template->MainLayout($about_page);
  }
}
