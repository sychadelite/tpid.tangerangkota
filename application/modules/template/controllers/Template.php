<?php

class Template extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function MainLayout($page_content = "", $data = [])
  {
    $data["page_content"] = $page_content;

    $this->load->view("template/main/index", $data);
  }

  public function AdminLayout($page_content = "", $data = [])
  {
    $data["page_content"] = $page_content;

    $this->load->view("template/main/index", $data);
  }
}
