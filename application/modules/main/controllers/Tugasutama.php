<?php

class Tugasutama extends MY_Controller
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
    $tugas_utama_page = "main/tugasutama/index";
    $data['content']['data_tugasutama'] = $this->ProfileModel->get_detail_public_data('tugas-utama');
    $this->template->MainLayout($tugas_utama_page, $data);
  }
}
