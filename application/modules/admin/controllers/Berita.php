<?php

class Berita extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model(array(
      'Berita_model' => 'BeritaModel',
      'Category_model' => 'CategoryModel',
    ));
  }

  public function index()
  {
    $page = "admin/berita/index";
    $data['content']['context'] = 'berita';
    $data['content']['data_category'] = $this->CategoryModel->get_all_data('type', 'berita');
    $this->template->AdminLayout($page, $data);
  }

  public function slug($context)
  {
    $page = "admin/berita/slug";
    $data['content']['context'] = strtolower(str_replace('-', '_', $context));
    $data['content']['data_category'] = $this->CategoryModel->get_all_data('type', 'berita');
    $this->template->AdminLayout($page, $data);
  }
}
