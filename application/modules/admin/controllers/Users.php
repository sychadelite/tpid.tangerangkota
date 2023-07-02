<?php

class Users extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model('Usergroup_model', 'UserGroupModel');
  }

  public function index() {
    $users_page = "admin/users/index";
    $data["content"]["data_users_group"] = $this->UserGroupModel->get_all();
    $this->template->AdminLayout($users_page, $data);
  }
}