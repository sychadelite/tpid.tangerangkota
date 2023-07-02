<?php

class About extends MY_Controller
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
    $about_page = "main/about/index";
    $data['content']['data_about'] = $this->ProfileModel->get_detail_public_data('tentang-kami');
    $this->template->MainLayout($about_page, $data);
  }
}
