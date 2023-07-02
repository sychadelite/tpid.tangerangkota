<?php

class Home extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model(array(
      'admin/Banner_model' => 'BannerModel',
      'admin/Berita_model' => 'BeritaModel',
    ));
  }

  public function index() {
    $home_page = "main/home/index";
    $data['content']['data_all_banner'] = $this->BannerModel->get_all_data('status', 'active');
    $data['content']['data_all_berita'] = $this->BeritaModel->get_all_public_data(null, null, 6, 1);
    $data['content']['data_latest_berita'] = $this->BeritaModel->get_latest_public_data();
    $this->template->MainLayout($home_page, $data);
  }
}