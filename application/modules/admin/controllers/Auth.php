<?php

class Auth extends MY_Controller
{
  private $login_page;
  private $login_route;

  public function __construct()
  {
    parent::__construct();

    $this->load->library(["form_validation", "jwt_lib"]);

    $this->load->model('User_model', 'UserModel');
    
    $this->login_page = "admin/auth/login";
    $this->login_route = "/login";

  }

  public function index()
  {
    $slug = $this->uri->segment(1);
    switch ($slug) {
      case 'admin':
        return redirect('admin/dashboard');
        break;
      case 'login':
        if (!$this->input->post()) {
          $this->template->AuthLayout($this->login_page);
        } else {
          $this->login();
        }
        break;
      case 'logout':
        $this->logout();
        break;
      default:
        dd('Page not found');
        break;
    }
  }

  private function login()
  {
    $this->form_validation->set_rules('username', 'Username', 'required|trim');
    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');

    if ($this->form_validation->run() == FALSE) :
      return $this->template->AuthLayout($this->login_page);
    endif;

    $payload = [
      "username" => $this->input->post('username'),
      "password" => $this->input->post('password'),
    ];

    $check_user = $this->UserModel->get_data('username', $payload['username']);

    if ($check_user) :
      $hashed_password = $check_user->password;
      if (password_verify($this->input->post('password'), $hashed_password)) {
        // Generate bearer token for the authenticated user
        $bearerToken = $this->jwt_lib->generateBearerToken((int) $check_user->id);

        $session_data = array(
          "id" => (int) $check_user->id,
          "user_group_id" => (int) $check_user->user_group_id,
          "user_group_name" => $check_user->user_group_name,
          "username" => $check_user->username,
          "fullname" => $check_user->fullname,
          "email" => $check_user->email,
          "image" => $check_user->image,
          "token" => $bearerToken
        );
        $this->session->set_userdata($session_data);

        $this->session->set_flashdata(
          'message_success',
          'Selamat datang, ' . ucwords($check_user->fullname)
        );

        $where = 'id='.$this->session->id;
        $this->UserModel->update_data($where, array(
            'login_status' => 1,
            'last_login_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
          )
        );
        return redirect('/admin/dashboard');
      } else {
        $this->session->set_flashdata(
          'message_error',
          'Password salah'
        );
        return redirect($this->login_route);
      }
    endif;

    $this->session->set_flashdata(
      'message_error',
      'Anda Tidak Terdaftar Sebagai Admin Website'
    );
    return redirect($this->login_route);
  }

  private function logout()
  {
    $where = 'id='.$this->session->id;
    $this->UserModel->update_data($where, array(
        'login_status' => 0,
        'updated_at' => date("Y-m-d H:i:s")
      )
    );

    $session_data = array(
      "id" => FALSE,
      "user_group_id" => FALSE,
      "user_group_name" => FALSE,
      "username" => FALSE,
      "fullname" => FALSE,
      "email" => FALSE,
      "image" => FALSE,
      "token" => FALSE,
    );
    $this->session->set_userdata($session_data);
    $this->session->set_flashdata(
      'message_warning',
      'Anda berhasil keluar, sesi login telah dihapus'
    );

    return redirect($this->login_route);
  }
}
