<?php

class Strukturorganisasi extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    
    $this->load->model(array(
      'admin/Profile_model' => 'ProfileModel',
      'admin/Profilefiles_model' => 'ProfileFilesModel',
      'admin/Category_model' => 'CategoryModel',
    ));
  }

  public function index() {
    $struktur_organisasi_page = "main/strukturorganisasi/index";
    $data['content']['data_strukturorganisasi'] = $this->ProfileModel->get_detail_public_data('struktur-organisasi');
    $this->template->MainLayout($struktur_organisasi_page, $data);
  }
}
