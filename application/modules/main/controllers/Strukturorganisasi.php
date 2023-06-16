<?php

class Strukturorganisasi extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index() {
    $struktur_organisasi_page = "main/strukturorganisasi/index";
    $this->template->MainLayout($struktur_organisasi_page);
  }
}
