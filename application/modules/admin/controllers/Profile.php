<?php

class Profile extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model(array(
      'Profile_model' => 'ProfileModel',
      'Category_model' => 'CategoryModel',
    ));
  }

  public function index()
  {
    $page = "admin/profile/index";
    $data['content']['context'] = 'profile';
    $data['content']['data_category'] = $this->CategoryModel->get_all_data('type', 'profil');
    $this->template->AdminLayout($page, $data);
  }

  public function slug($context)
  {
    $page = "admin/profile/slug";
    $data['content']['context'] = strtolower(str_replace('-', '_', $context));
    $data['content']['data_category'] = $this->CategoryModel->get_all_data('type', 'profil');
    $this->template->AdminLayout($page, $data);
  }
}
