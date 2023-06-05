<?php

class Galeri extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index() {
    $galeri_page = "galeri/galeri_view";
    $this->template->loadTemplate($galeri_page);
  }
}
