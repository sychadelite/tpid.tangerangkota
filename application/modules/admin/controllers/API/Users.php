<?php

class Users extends MY_Controller
{
  private $key;
  public function __construct()
  {
    parent::__construct();

    $this->load->library(["form_validation"]);

    $this->load->helper(['jwt']);

    $this->load->model('User_model', 'UserModel');

    $this->config->set_item('language', 'indonesian');

    $this->key = secretKey();

    header('Content-Type: application/json');
  }

  public function index()
  {
    // Serialized Token
    $authorizationHeader = $this->input->get_request_header('Authorization', TRUE);
    if ($authorizationHeader) {
      $token = str_replace("Bearer ", "", $authorizationHeader);
      $authToken = decodeJwtToken($token, $this->key);

      if (!$authToken) {
        $response = [
          "status" => false,
          "message" => 'Token Invalid',
        ];
        http_response_code(401);
        echo json_encode($response);
      }

      $check_user = $this->UserModel->get_data('id', $authToken->user_id);

      if ($check_user->user_group_id == 1) {
        $users = $this->UserModel->get_all();

        $response = [
          "status" => true,
          "message" => 'Users retrieved',
          "data" => $users,
        ];
        http_response_code(200);
        echo json_encode($response);
      } else {
        $response = [
          "status" => false,
          "message" => 'Your privilege doesn\'t satisfy the role requirement to get this data',
        ];
        http_response_code(401);
        echo json_encode($response);
      }
    } else {
      $response = [
        "status" => false,
        "message" => 'Invalid JSON Web Token',
      ];
      http_response_code(406);
      echo json_encode($response);
    }
  }

  public function get_by_id($id)
  {
    // Serialized Token
    $authorizationHeader = $this->input->get_request_header('Authorization', TRUE);
    if ($authorizationHeader) {
      $token = str_replace("Bearer ", "", $authorizationHeader);
      $authToken = decodeJwtToken($token, $this->key);

      if (!$authToken) {
        $response = [
          "status" => false,
          "message" => 'Token Invalid',
        ];
        http_response_code(401);
        echo json_encode($response);
      }

      $check_user = $this->UserModel->get_data('id', $authToken->user_id);

      if ($check_user->user_group_id == 1) {
        $user = $this->UserModel->get_data('id', $id);

        $response = [
          "status" => true,
          "message" => 'User retrieved',
          "data" => $user,
        ];
        http_response_code(200);
        echo json_encode($response);
      } else {
        $response = [
          "status" => false,
          "message" => 'Your privilege doesn\'t satisfy the role requirement to get this data',
        ];
        http_response_code(401);
        echo json_encode($response);
      }
    } else {
      $response = [
        "status" => false,
        "message" => 'Invalid JSON Web Token',
      ];
      http_response_code(406);
      echo json_encode($response);
    }
  }

  public function create()
  {
    // Serialized Token
    $authorizationHeader = $this->input->get_request_header('Authorization', TRUE);
    if ($authorizationHeader) {
      $token = str_replace("Bearer ", "", $authorizationHeader);
      $authToken = decodeJwtToken($token, $this->key);

      if (!$authToken) {
        $response = [
          "status" => false,
          "message" => 'Token Invalid',
        ];
        http_response_code(401);
        echo json_encode($response);
      }

      $check_user = $this->UserModel->get_data('id', $authToken->user_id);

      if ($check_user->user_group_id == 1) {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[4]|is_unique[m_users.username]');
        $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim|min_length[6]');
        $this->form_validation->set_rules('email', 'E-Mail', 'required|trim|valid_email|is_unique[m_users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('peran', 'Peran', 'required|trim|is_natural');
        $this->form_validation->set_rules('status', 'Status', 'required|trim|in_list[active,inactive]');

        if ($this->form_validation->run() == FALSE) {
          $errors = array();
          // Iterate through each form field and retrieve the corresponding error message
          foreach ($_POST as $field_name => $field_value) {
            if (!empty(form_error($field_name))) {
              $error_message = form_error($field_name);
              $clean_error_message = strip_tags($error_message); // Remove HTML tags from the error message
              $errors[$field_name] = $clean_error_message;
            }
          }

          $response = [
            "status" => false,
            "message" => 'Payload is not satisfied',
            "data" => $errors
          ];
          http_response_code(403);
          echo json_encode($response);
        } else {
          $payload = [
            "username" => strtolower($this->input->post('username')),
            "fullname" => $this->input->post('fullname'),
            "email" => $this->input->post('email'),
            "password" => password_hash($this->input->post('password'), PASSWORD_ARGON2I),
            "user_group_id" => $this->input->post('peran'),
            "status" => $this->input->post('status'),
          ];

          $insert_user = $this->UserModel->insert_data($payload);

          if ($insert_user) {
            $response = [
              "status" => true,
              "message" => 'User created',
              "data" => $this->input->post()
            ];
            http_response_code(200);
            echo json_encode($response);
          } else {
            $response = [
              "status" => true,
              "message" => 'User failed to be created'
            ];
            http_response_code(400);
            echo json_encode($response);
          }
        }
      } else {
        $response = [
          "status" => false,
          "message" => 'Your privilege doesn\'t satisfy the role requirement to get this data',
        ];
        http_response_code(401);
        echo json_encode($response);
      }
    } else {
      $response = [
        "status" => false,
        "message" => 'Invalid JSON Web Token',
      ];
      http_response_code(406);
      echo json_encode($response);
    }
  }

  public function update()
  {
    // Serialized Token
    $authorizationHeader = $this->input->get_request_header('Authorization', TRUE);
    if ($authorizationHeader) {
      $token = str_replace("Bearer ", "", $authorizationHeader);
      $authToken = decodeJwtToken($token, $this->key);

      if (!$authToken) {
        $response = [
          "status" => false,
          "message" => 'Token Invalid',
        ];
        http_response_code(401);
        echo json_encode($response);
      }

      $check_user = $this->UserModel->get_data('id', $authToken->user_id);

      if ($check_user->user_group_id == 1) {
        // $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim|min_length[6]');
        // $this->form_validation->set_rules('email', 'E-Mail', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'min_length[6]');
        $this->form_validation->set_rules('peran', 'Peran', 'required|trim|is_natural');
        $this->form_validation->set_rules('status', 'Status', 'required|trim|in_list[active,inactive]');

        if ($this->form_validation->run() == FALSE) {
          $errors = array();
          // Iterate through each form field and retrieve the corresponding error message
          foreach ($_POST as $field_name => $field_value) {
            if (!empty(form_error($field_name))) {
              $error_message = form_error($field_name);
              $clean_error_message = strip_tags($error_message); // Remove HTML tags from the error message
              $errors[$field_name] = $clean_error_message;
            }
          }

          $response = [
            "status" => false,
            "message" => 'Payload is not satisfied',
            "data" => validation_errors()
          ];
          http_response_code(403);
          echo json_encode($response);
        } else {
          $current_edited_user = $this->UserModel->get_data('id', $this->input->post('id'));
          $payload = [
            "username" => $current_edited_user->username,
            "fullname" => $this->input->post('fullname'),
            "email" => $current_edited_user->email,
            "password" => !$this->input->post('password') ? $current_edited_user->password : password_hash($this->input->post('password'), PASSWORD_ARGON2I),
            "user_group_id" => $this->input->post('peran'),
            "status" => $this->input->post('status'),
          ];

          $where = 'id=' . $this->input->post('id');
          $update_user = $this->UserModel->update_data($where, $payload);

          if ($update_user) {
            $response = [
              "status" => true,
              "message" => 'User updated',
              "data" => $this->input->post(),
              "affected_rows" => $update_user
            ];
            http_response_code(200);
            echo json_encode($response);
          } else {
            $response = [
              "status" => true,
              "message" => 'User not updated',
              "affected_rows" => $update_user
            ];
            http_response_code(200);
            echo json_encode($response);
          }
        }
      } else {
        $response = [
          "status" => false,
          "message" => 'Your privilege doesn\'t satisfy the role requirement to get this data',
        ];
        http_response_code(401);
        echo json_encode($response);
      }
    } else {
      $response = [
        "status" => false,
        "message" => 'Invalid JSON Web Token',
      ];
      http_response_code(406);
      echo json_encode($response);
    }
  }

  public function destroy()
  {
    // Serialized Token
    $authorizationHeader = $this->input->get_request_header('Authorization', TRUE);
    if ($authorizationHeader) {
      $token = str_replace("Bearer ", "", $authorizationHeader);
      $authToken = decodeJwtToken($token, $this->key);

      if (!$authToken) {
        $response = [
          "status" => false,
          "message" => 'Token Invalid',
        ];
        http_response_code(401);
        echo json_encode($response);
      }

      $check_user = $this->UserModel->get_data('id', $authToken->user_id);

      if ($check_user->user_group_id == 1) {
        $where = 'id=' . $this->input->post('id');
        $delete_user = $this->UserModel->delete_data($where);

        if ($delete_user) {
          $response = [
            "status" => true,
            "message" => 'User deleted',
            "affected_rows" => $delete_user
          ];
          http_response_code(200);
          echo json_encode($response);
        } else {
          $response = [
            "status" => false,
            "message" => 'User not deleted',
            "affected_rows" => $delete_user
          ];
          http_response_code(400);
          echo json_encode($response);
        }
      } else {
        $response = [
          "status" => false,
          "message" => 'Your privilege doesn\'t satisfy the role requirement to get this data',
        ];
        http_response_code(401);
        echo json_encode($response);
      }
    } else {
      $response = [
        "status" => false,
        "message" => 'Invalid JSON Web Token',
      ];
      http_response_code(406);
      echo json_encode($response);
    }
  }
}
