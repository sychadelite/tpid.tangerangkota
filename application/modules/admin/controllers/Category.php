<?php

class Category extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model('Category_model', 'CategoryModel');
  }

  public function index() {
    $category_page = "admin/category/index";
    $this->template->AdminLayout($category_page);
  }
}