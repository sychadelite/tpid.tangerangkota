<?php

class Kegiatan extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->library(["form_validation"]);
  }

  public function index() {
    $kegiatan_page = "main/kegiatan/index";
    $this->template->MainLayout($kegiatan_page);
  }

  public function group($date) {
    $kegiatan_group_page = "main/kegiatan/kegiatan_group_view";
    $data['year'] = 2023;
    $data['month'] = 'April';
    $data['date'] = $date;
    $this->template->MainLayout($kegiatan_group_page, $data);
  }

  public function detail($id) {
    $kegiatan_detail_page = "main/kegiatan/kegiatan_detail_view";
    $data['kegiatan_id'] = $id;
    $this->template->AdminLayout($kegiatan_detail_page, $data);
  }

  public function user_form_submit()
  {
    $this->form_validation->set_rules("tahun_kegiatan", "Tahun Kegiatan", "trim|required");
    $this->form_validation->set_rules("bulan_kegiatan", "Bulan Kegiatan", "trim|required");
  }
}
