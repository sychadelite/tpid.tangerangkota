<?php

class Galeri extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index() {
    $galeri_page = "main/galeri/index";
    $this->template->MainLayout($galeri_page);
  }
}
