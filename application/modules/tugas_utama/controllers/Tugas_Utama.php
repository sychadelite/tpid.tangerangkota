<?php

class Tugas_Utama extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index() {
    $tugas_utama_page = "tugas_utama/tugas_utama_view";
    $this->template->loadTemplate($tugas_utama_page);
  }
}
