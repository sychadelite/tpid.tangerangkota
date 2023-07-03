<?php

class Komoditas extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model(array(
      'Komoditas_model' => 'KomoditasModel',
      'Komoditaskelompok_model' => 'KomoditasKelompokModel',
      'Komoditasjenis_model' => 'KomoditasJenisModel',
      'Pasar_model' => 'PasarModel',
    ));
  }

  public function index($slug)
  {
    $komoditas_page = "admin/komoditas/" . str_replace('-', '', $slug);
    $data['content']['data_jenis_komoditas'] = $this->KomoditasJenisModel->get_all();
    $data['content']['data_kelompok_komoditas'] = $this->KomoditasKelompokModel->get_all();
    $data['content']['data_all_komoditas'] = $this->KomoditasModel->get_all();
    $data['content']['data_all_pasar'] = $this->PasarModel->get_all();
    $this->template->AdminLayout($komoditas_page, $data);
  }
}
