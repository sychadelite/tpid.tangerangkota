<?php

class Visimisi extends MY_Controller
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
    $visi_misi_page = "main/visimisi/index";
    $data['content']['data_visimisi'] = $this->ProfileModel->get_detail_public_data('visi-misi');
    $this->template->MainLayout($visi_misi_page, $data);
  }
}
