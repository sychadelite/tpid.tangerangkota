<?php

class Kegiatan extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->library(["form_validation"]);
  }

  public function index() {
    $kegiatan_page = "kegiatan/kegiatan_view";
    $this->template->loadTemplate($kegiatan_page);
  }

  public function group($date) {
    $kegiatan_group_page = "kegiatan/kegiatan_group_view";
    $data['year'] = 2023;
    $data['month'] = 'April';
    $data['date'] = $date;
    $this->template->loadTemplate($kegiatan_group_page, $data);
  }

  public function detail($id) {
    $kegiatan_detail_page = "kegiatan/kegiatan_detail_view";
    $data['kegiatan_id'] = $id;
    $this->template->loadTemplate($kegiatan_detail_page, $data);
  }

  public function user_form_submit()
  {
    $this->form_validation->set_rules("tahun_kegiatan", "Tahun Kegiatan", "trim|required");
    $this->form_validation->set_rules("bulan_kegiatan", "Bulan Kegiatan", "trim|required");
  }
}
