<?php

class Komoditas extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->library(["form_validation"]);
  }

  public function index() {
    $komoditas_page = "main/komoditas/index";
    $this->template->MainLayout($komoditas_page);
  }

  public function harga_komoditas() {
    $harga_komoditas_page = "main/komoditas/harga_komoditas";
    $this->template->MainLayout($harga_komoditas_page);
  }
}
