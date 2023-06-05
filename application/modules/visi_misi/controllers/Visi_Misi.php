<?php

class Visi_Misi extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index() {
    $visi_misi_page = "visi_misi/visi_misi_view";
    $this->template->loadTemplate($visi_misi_page);
  }
}
