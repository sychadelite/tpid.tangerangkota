<?php

class Template extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->helper(['datetime', 'text']);

    $this->load->model(array(
      'admin/Menus_model' => 'MenusModel',
      'admin/Menusmain_model' => 'MenusMainModel',
    ));
  }

  public function MainLayout($page_name = "", $data = [])
  {
    $data["page_name"] = $page_name;
    $data["content"]["csrf"] = array(
      "name" => $this->security->get_csrf_token_name(),
      "hash" => $this->security->get_csrf_hash()
    );

    $menus = $this->MenusMainModel->get_all_public();
    $menus = json_decode(json_encode($menus), true); // converting to array
    $data["content"]["menus_main"] = $menus;

    $this->load->view("template/main/index", $data);
  }

  public function AdminLayout($page_name = "", $data = [])
  {
    $data["page_name"] = $page_name;
    $data["content"]["csrf"] = array(
      "name" => $this->security->get_csrf_token_name(),
      "hash" => $this->security->get_csrf_hash()
    );

    $menus = $this->MenusModel->get_group_menu($this->session->user_group_id);
    $data["content"]["menus"] = $menus;

    if ($this->session->id) {
      $this->load->view("template/admin/index", $data);
    } else {
      return redirect('/login');
    }
  }

  public function AuthLayout($page_name = "", $data = [])
  {
    $data["page_name"] = $page_name;
    $data["content"]["csrf"] = array(
      "name" => $this->security->get_csrf_token_name(),
      "hash" => $this->security->get_csrf_hash()
    );

    if (!$this->session->id) {
      $this->load->view("template/auth/index", $data);
    } else {
      return redirect('/admin');
    }
  }
}
