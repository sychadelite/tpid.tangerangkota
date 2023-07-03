<?php

class Galeri extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model(array(
      'admin/Beritafiles_model' => 'BeritaFilesModel',
    ));
  }

  public function index() {
    $galeri_page = "main/galeri/index";
    $data['content']['data_all_berita_files'] = $this->BeritaFilesModel->get_all_public_data(null, null, 100, 0);
    $this->template->MainLayout($galeri_page, $data);
  }
}
