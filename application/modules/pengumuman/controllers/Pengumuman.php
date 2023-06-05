<?php

class Pengumuman extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->library(["form_validation"]);
  }

  public function index() {
    $pengumuman_page = "pengumuman/pengumuman_view";
    $this->template->loadTemplate($pengumuman_page);
  }

  public function group($date) {
    $pengumuman_group_page = "pengumuman/pengumuman_group_view";
    $data['year'] = 2023;
    $data['month'] = 'April';
    $data['date'] = $date;
    $this->template->loadTemplate($pengumuman_group_page, $data);
  }

  public function detail($id) {
    $pengumuman_detail_page = "pengumuman/pengumuman_detail_view";
    $data['pengumuman_id'] = $id;
    $this->template->loadTemplate($pengumuman_detail_page, $data);
  }

  public function user_form_submit()
  {
    $this->form_validation->set_rules("tahun_pengumuman", "Tahun Pengumuman", "trim|required");
    $this->form_validation->set_rules("bulan_pengumuman", "Bulan Pengumuman", "trim|required");
  }
}
