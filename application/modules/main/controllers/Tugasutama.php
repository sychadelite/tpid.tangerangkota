<?php

class Tugasutama extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index() {
    $tugas_utama_page = "main/tugasutama/index";
    $this->template->MainLayout($tugas_utama_page);
  }
}
