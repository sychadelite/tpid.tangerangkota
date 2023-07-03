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
    if ($this->input->post('tahun_kegiatan') && $this->input->post('bulan_kegiatan')) {
      $payload = [
        "year" => $this->input->post('tahun_kegiatan'),
        "month" => $this->input->post('bulan_kegiatan'),
      ];
      $kegiatan_page = "main/kegiatan/index";
      $category = $this->CategoryModel->get_data('name', 'kegiatan');
      $data['content']['data_category'] = $category;
      $data['content']['data_all_kegiatan'] = $this->BeritaModel->get_all_public_data('category_id', $category->id, null, null, $payload['year'] . "-" . $payload['month']);
      $this->template->MainLayout($kegiatan_page, $data);
    } else {
      return redirect('/kegiatan');
    }
  }

  public function search()
  {
    if ($this->input->post()) {
      $search =  $this->input->post('search');
      $yearMonth = $this->input->post('year_month');
      $category = $this->CategoryModel->get_data('name', 'kegiatan');
      $data['content']['data_kegiatan_by_year_month'] = $this->BeritaModel->get_all_public_data_by_year_month('category_id', $category->id, $yearMonth, $search);

      $data['year'] = date('Y', strtotime($yearMonth));
      $data['month'] = date('m', strtotime($yearMonth));
      $data['monthName'] = getMonthName($data['month']);

      $kegiatan_group_page = "main/kegiatan/kegiatan_group_view";
      $this->template->MainLayout($kegiatan_group_page, $data);
    } else {
      return redirect('/kegiatan');
    }
  }
}
