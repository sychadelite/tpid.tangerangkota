<?php

class Kegiatan extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->library(["form_validation"]);

    $this->load->helper(['datetime']);

    $this->load->model(array(
      'admin/Berita_model' => 'BeritaModel',
      'admin/Beritafiles_model' => 'BeritaFilesModel',
      'admin/Category_model' => 'CategoryModel',
    ));
  }

  public function index()
  {
    $kegiatan_page = "main/kegiatan/index";
    $category = $this->CategoryModel->get_data('name', 'kegiatan');
    $data['content']['data_category'] = $category;
    $data['content']['data_all_kegiatan'] = $this->BeritaModel->get_all_public_data('category_id', $category->id);
    $this->template->MainLayout($kegiatan_page, $data);
  }

  public function group($yearMonth)
  {
    $kegiatan_group_page = "main/kegiatan/kegiatan_group_view";
    $category = $this->CategoryModel->get_data('name', 'kegiatan');
    $data['content']['data_kegiatan_by_year_month'] = $this->BeritaModel->get_all_public_data_by_year_month('category_id', $category->id, $yearMonth);

    $data['year'] = date('Y', strtotime($yearMonth));
    $data['month'] = date('m', strtotime($yearMonth));
    $data['monthName'] = getMonthName($data['month']);

    $this->template->MainLayout($kegiatan_group_page, $data);
  }

  public function detail($id)
  {
    $kegiatan_detail_page = "main/kegiatan/kegiatan_detail_view";
    $data['content']['data_kegiatan_detail'] = $this->BeritaModel->get_data('slug', $id);
    if (isset($data['content']['data_kegiatan_detail'])) {
      $this->template->MainLayout($kegiatan_detail_page, $data);
    }
  }

  public function user_form_submit()
  {
    $this->form_validation->set_rules("tahun_kegiatan", "Tahun Kegiatan", "trim|required");
    $this->form_validation->set_rules("bulan_kegiatan", "Bulan Kegiatan", "trim|required");
  }
}
