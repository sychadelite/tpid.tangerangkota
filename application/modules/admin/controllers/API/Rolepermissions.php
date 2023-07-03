<?php

class Rolepermissions extends MY_Controller
{
  private $key;
  public function __construct()
  {
    parent::__construct();

    $this->load->library(["form_validation"]);

    $this->load->helper(['jwt']);

    $this->load->model(array(
      'User_model' => 'UserModel',
      'Usergroup_model' => 'UserGroupModel',
      'Menus_model' => 'MenusModel',
      'Menususersgroup_model' => 'MenusUsersGroupModel',
    ));

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

      if ($this->UserGroupModel->get_data('id', $check_user->user_group_id)) {
        $role_permissions = $this->UserGroupModel->get_all();

        $response = [
          "status" => true,
          "message" => 'Role Permissions retrieved',
          "data" => $role_permissions,
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

      if ($this->UserGroupModel->get_data('id', $check_user->user_group_id)) {
        $rolepermission = $this->UserGroupModel->get_data('id', $id);
        $menus = $this->MenusModel->get_all();
        $availableMenus = $this->MenusUsersGroupModel->get_all_data_group('user_group_id', $id);

        $response = [
          "status" => true,
          "message" => 'Role Permission retrieved',
          "data" => $rolepermission,
          "menus" => $menus,
          "available_menus" => $availableMenus
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

      if ($this->UserGroupModel->get_data('id', $check_user->user_group_id)) {
        $this->form_validation->set_rules('name', 'Nama Hak Akses', 'required|trim|min_length[4]|is_unique[m_users_group.name]');

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
            "name" => strtolower($this->input->post('name'))
          ];

          $insert_role_permission = $this->UserGroupModel->insert_data($payload);

          if ($insert_role_permission) {
            $inserted_role_id = $this->db->insert_id();
            $inserted_rows = 0;
            // Iterate through the POST array
            foreach ($this->input->post() as $key => $value) {
              // Check if the key has the prefix "menu_"
              if (strpos($key, 'menu_') === 0) {
                // Extract the ID from the key
                $menu_id = substr($key, strlen('menu_'));
                $payload_menus_group = [
                  "user_group_id" => $inserted_role_id,
                  "menu_id" => $menu_id
                ];
                $process = $this->MenusUsersGroupModel->insert_data($payload_menus_group);
                if ($process) {
                  $inserted_rows = $inserted_rows + 1;
                }
              }
            }

            if ($inserted_rows > 0) {
              $response = [
                "status" => true,
                "message" => 'Transaction Role Menu created',
                "data" => $this->input->post()
              ];
              http_response_code(200);
              echo json_encode($response);
            } else {
              $response = [
                "status" => true,
                "message" => 'Transaction Role Menu failed to be created'
              ];
              http_response_code(400);
              echo json_encode($response);
            }
          } else {
            $response = [
              "status" => true,
              "message" => 'Role Permission failed to be created'
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

      if ($this->UserGroupModel->get_data('id', $check_user->user_group_id)) {
        $this->form_validation->set_rules('name', 'Nama Hak Akses', 'required|trim|min_length[4]');

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
          $current_edited_role_permission = $this->UserGroupModel->get_data('id', $this->input->post('id'));
          $payload = [
            "name" => $this->input->post('name'),
          ];

          $where = 'id=' . $current_edited_role_permission->id;
          $this->UserGroupModel->update_data($where, $payload);

          $affected_rows = 0;

          $where_menus_group_id = 'user_group_id=' . $current_edited_role_permission->id;
          $process = $this->MenusUsersGroupModel->delete_data($where_menus_group_id);
          // Iterate through the POST array
          foreach ($this->input->post() as $key => $value) {
            // Check if the key has the prefix "menu_"
            if (strpos($key, 'menu_') === 0) {
              // Extract the ID from the key
              $menu_id = substr($key, strlen('menu_'));
              $process = $this->MenusUsersGroupModel->insert_data([
                "user_group_id" => $current_edited_role_permission->id,
                "menu_id" => $menu_id,
              ]);
              if ($process) {
                $affected_rows = $affected_rows + 1;
              }
            }
          }

          // OUTPUT
          if ($affected_rows > 0) {
            $response = [
              "status" => true,
              "message" => 'Transaction Role Menu created',
              "data" => $this->input->post(),
              "affected_rows" => $affected_rows
            ];
            http_response_code(200);
            echo json_encode($response);
          } else {
            $response = [
              "status" => true,
              "message" => 'Transaction Role Menu failed to be created'
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

      if ($this->UserGroupModel->get_data('id', $check_user->user_group_id)) {
        $where = 'id=' . $this->input->post('id');
        $delete_role_permission = $this->UserGroupModel->delete_data($where);

        if ($delete_role_permission) {
          $response = [
            "status" => true,
            "message" => 'Role Permission deleted',
            "affected_rows" => $delete_role_permission
          ];
          http_response_code(200);
          echo json_encode($response);
        } else {
          $response = [
            "status" => false,
            "message" => 'Role Permission not deleted',
            "affected_rows" => $delete_role_permission
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
