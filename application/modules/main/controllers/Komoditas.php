<?php

class Komoditas extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->library(["form_validation"]);

    $this->load->model(array(
      'admin/Komoditas_model' => 'KomoditasModel',
      'admin/Komoditasjenis_model' => 'KomoditasJenisModel',
      'admin/Komoditaskelompok_model' => 'KomoditasKelompokModel',
      'admin/Komoditasrekapitulasi_model' => 'KomoditasRekapitulasiModel',
      'admin/Pasar_model' => 'PasarModel',
    ));
  }

  public function index()
  {
    if ($this->input->post()) {
      $payload = [
        "pasar_id" => $this->input->post('pasar'),
        "cluster_id" => $this->input->post('kelompok'),
        "type_id" => $this->input->post('jenis'),
        "month" => $this->input->post('bulan'),
        "year" => $this->input->post('tahun'),
      ];
      $this->harga_komoditas($payload);
    } else {
      return redirect('/harga-komoditas');
    }
  }

  public function harga_komoditas($payload = null)
  {
    $harga_komoditas_page = "main/komoditas/harga_komoditas";

    if (!$payload) {
      $data['year'] = date("Y");
      $data['month'] = date("m");
      $data['monthName'] = getMonthName(date("m"));
      $yearMonth = $data['year'] . "-" . $data['month'];
      $data['content']['data_all_jenis_komoditas'] = $this->KomoditasJenisModel->get_all();
      $data['content']['data_all_kelompok_komoditas'] = $this->KomoditasKelompokModel->get_all();
      $data['content']['data_all_rekapitulasi_komoditas'] = $this->KomoditasRekapitulasiModel->get_all($yearMonth);
      $data['content']['data_all_pasar'] = $this->PasarModel->get_all();
    } else {
      $data['year'] = $payload['year'];
      $data['month'] = sprintf('%02d', $payload['month']);
      $data['monthName'] = getMonthName(sprintf('%02d', $payload['month']));
      $yearMonth = $data['year'] . "-" . $data['month'];
      $data['content']['data_all_jenis_komoditas'] = $this->KomoditasJenisModel->get_all();
      $data['content']['data_all_kelompok_komoditas'] = $this->KomoditasKelompokModel->get_all();
      $data['content']['data_all_rekapitulasi_komoditas'] = $this->KomoditasRekapitulasiModel->get_all($yearMonth);
      $data['content']['data_all_pasar'] = $this->PasarModel->get_all();
    }

    $this->template->MainLayout($harga_komoditas_page, $data);
  }
}
