<?php

class Pengumuman extends MY_Controller
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
    $pengumuman_page = "main/pengumuman/index";
    $category = $this->CategoryModel->get_data('name', 'pengumuman');
    $data['content']['data_category'] = $category;
    $data['content']['data_all_pengumuman'] = $this->BeritaModel->get_all_public_data('category_id', $category->id);
    $this->template->MainLayout($pengumuman_page, $data);
  }

  public function group($yearMonth)
  {
    $pengumuman_group_page = "main/pengumuman/pengumuman_group_view";
    $category = $this->CategoryModel->get_data('name', 'pengumuman');
    $data['content']['data_pengumuman_by_year_month'] = $this->BeritaModel->get_all_public_data_by_year_month('category_id', $category->id, $yearMonth);

    $data['year'] = date('Y', strtotime($yearMonth));
    $data['month'] = date('m', strtotime($yearMonth));
    $data['monthName'] = getMonthName($data['month']);

    $this->template->MainLayout($pengumuman_group_page, $data);
  }

  public function detail($id)
  {
    $pengumuman_detail_page = "main/pengumuman/pengumuman_detail_view";
    $data['content']['data_pengumuman_detail'] = $this->BeritaModel->get_data('slug', $id);
    if (isset($data['content']['data_pengumuman_detail'])) {
      $this->template->MainLayout($pengumuman_detail_page, $data);
    }
  }

  public function user_form_submit()
  {
    if ($this->input->post('tahun_pengumuman') && $this->input->post('bulan_pengumuman')) {
      $payload = [
        "year" => $this->input->post('tahun_pengumuman'),
        "month" => $this->input->post('bulan_pengumuman'),
      ];
      $pengumuman_page = "main/pengumuman/index";
      $category = $this->CategoryModel->get_data('name', 'pengumuman');
      $data['content']['data_category'] = $category;
      $data['content']['data_all_pengumuman'] = $this->BeritaModel->get_all_public_data('category_id', $category->id, null, null, $payload['year'] . "-" . $payload['month']);
      $this->template->MainLayout($pengumuman_page, $data);
    } else {
      return redirect('/pengumuman');
    }
  }

  public function search()
  {
    if ($this->input->post()) {
      $search =  $this->input->post('search');
      $yearMonth = $this->input->post('year_month');
      $category = $this->CategoryModel->get_data('name', 'pengumuman');
      $data['content']['data_pengumuman_by_year_month'] = $this->BeritaModel->get_all_public_data_by_year_month('category_id', $category->id, $yearMonth, $search);

      $data['year'] = date('Y', strtotime($yearMonth));
      $data['month'] = date('m', strtotime($yearMonth));
      $data['monthName'] = getMonthName($data['month']);

      $pengumuman_group_page = "main/pengumuman/pengumuman_group_view";
      $this->template->MainLayout($pengumuman_group_page, $data);
    } else {
      return redirect('/pengumuman');
    }
  }
}
