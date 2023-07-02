<?php

class Dashboard extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index() {
    $dashboard_page = "admin/dashboard/dashboard_v2";
    $this->template->AdminLayout($dashboard_page);
  }
}