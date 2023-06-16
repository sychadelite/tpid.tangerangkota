<?php

class Visimisi extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index() {
    $visi_misi_page = "main/visimisi/index";
    $this->template->MainLayout($visi_misi_page);
  }
}
