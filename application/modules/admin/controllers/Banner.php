<?php

class Banner extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model('Banner_model', 'BannerModel');
  }

  public function index() {
    $banner_page = "admin/banner/index";
    $this->template->AdminLayout($banner_page);
  }
}