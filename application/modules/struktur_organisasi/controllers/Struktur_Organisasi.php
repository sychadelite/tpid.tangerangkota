<?php

class Struktur_Organisasi extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index() {
    $struktur_organisasi_page = "struktur_organisasi/struktur_organisasi_view";
    $this->template->loadTemplate($struktur_organisasi_page);
  }
}
