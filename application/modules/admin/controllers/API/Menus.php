<?php

class Menus extends MY_Controller
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
      'Menusmain_model' => 'MenusMainModel',
    ));

    $this->config->set_item('language', 'indonesian');

    $this->key = secretKey();

    header('Content-Type: application/json');
  }

  // SEMUA MENU
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
        $menus = $this->MenusModel->get_all();

        $response = [
          "status" => true,
          "message" => 'All Menus retrieved',
          "data" => $menus,
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
        $menus = $this->MenusModel->get_data('id', $id);

        $response = [
          "status" => true,
          "message" => 'Menu retrieved',
          "data" => $menus,
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
        $this->form_validation->set_rules('parent_id', 'Parent ID', 'is_natural');
        $this->form_validation->set_rules('name', 'Nama Menu', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('path', 'Path URL', 'trim');
        $this->form_validation->set_rules('icon', 'Icon', 'trim');
        $this->form_validation->set_rules('position', 'Index', 'required|trim|is_natural');

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
            "parent_id" => $this->input->post('parent_id') ? $this->input->post('parent_id') : 0,
            "name" => $this->input->post('name'),
            "url" => strtolower($this->input->post('path')),
            "icon" => strtolower($this->input->post('icon')),
            "position" => $this->input->post('position'),
            "status" => $this->input->post('status') ? 'active' : 'inactive',
            "target_blank" => $this->input->post('target_blank') ? 1 : 0,
          ];
          
          $insert_menu = $this->MenusModel->insert_data($payload);

          if ($insert_menu) {
            $insert_menus_group = $this->MenusUsersGroupModel->insert_data([
              "user_group_id" => $check_user->user_group_id,
              "menu_id" => $this->db->insert_id()
            ]);

            $response = [
              "status" => true,
              "message" => 'Menu created',
              "data" => $this->input->post()
            ];
            http_response_code(200);
            echo json_encode($response);
          } else {
            $response = [
              "status" => true,
              "message" => 'Menu failed to be created'
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
        $this->form_validation->set_rules('parent_id', 'Parent ID', 'is_natural');
        $this->form_validation->set_rules('name', 'Nama Menu', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('path', 'Path URL', 'trim');
        $this->form_validation->set_rules('icon', 'Icon', 'trim');
        $this->form_validation->set_rules('position', 'Index', 'required|trim|is_natural');

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
          $payload = [
            "name" => $this->input->post('name'),
            "url" => strtolower($this->input->post('path')),
            "icon" => strtolower($this->input->post('icon')),
            "position" => $this->input->post('position'),
            "status" => $this->input->post('status') ? 'active' : 'inactive',
            "target_blank" => $this->input->post('target_blank') ? 1 : 0,
          ];

          $where = 'id=' . $this->input->post('id');
          $update_menu = $this->MenusModel->update_data($where, $payload);

          if ($update_menu) {
            $response = [
              "status" => true,
              "message" => 'Menu updated',
              "data" => $this->input->post(),
              "affected_rows" => $update_menu
            ];
            http_response_code(200);
            echo json_encode($response);
          } else {
            $response = [
              "status" => true,
              "message" => 'Menu not updated',
              "affected_rows" => $update_menu
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

      if ($this->UserGroupModel->get_data('id', $check_user->user_group_id)) {
        $where = 'id=' . $this->input->post('id');
        $delete_menu = $this->MenusModel->delete_data($where);

        if ($delete_menu) {
          $response = [
            "status" => true,
            "message" => 'Menu deleted',
            "affected_rows" => $delete_menu
          ];
          http_response_code(200);
          echo json_encode($response);
        } else {
          $response = [
            "status" => false,
            "message" => 'Menu not deleted',
            "affected_rows" => $delete_menu
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

  public function group_menus($id = null)
  {
    $response = [
      "status" => true,
      "data" => [
        "menu_all" => $this->MenusModel->get_all(),
        "menu_by_user_group" => $this->MenusModel->get_all_group_menu($id),
      ]
    ];
    http_response_code(200);
    echo json_encode($response);
  }


  // MENU UTAMA
  public function main_index()
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
        $menus = $this->MenusMainModel->get_all();
        $response = [
          "status" => true,
          "message" => 'All Menus retrieved',
          "data" => [
            "menu_all" => $menus,
          ],
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

  public function main_get_by_id($id)
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
        $menus = $this->MenusMainModel->get_data('id', $id);
        $parents = $this->MenusMainModel->get_all();

        $response = [
          "status" => true,
          "message" => 'Menu retrieved',
          "data" => $menus,
          "parent_lists" => $parents
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

  public function main_create()
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
        $this->form_validation->set_rules('parent_id', 'Parent ID', 'is_natural');
        $this->form_validation->set_rules('name', 'Nama Menu', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('path', 'Path URL', 'trim');
        $this->form_validation->set_rules('icon', 'Icon', 'trim');
        $this->form_validation->set_rules('position', 'Index', 'required|trim|is_natural');

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
            "parent_id" => $this->input->post('parent_id') ? $this->input->post('parent_id') : 0,
            "name" => $this->input->post('name'),
            "url" => base_url() . strtolower($this->input->post('path')),
            "icon" => strtolower($this->input->post('icon')),
            "position" => $this->input->post('position'),
            "status" => $this->input->post('status') ? 'active' : 'inactive',
            "target_blank" => $this->input->post('target_blank') ? 1 : 0,
          ];

          $insert_menu = $this->MenusMainModel->insert_data($payload);

          if ($insert_menu) {
            $response = [
              "status" => true,
              "message" => 'Menu created',
              "data" => $this->input->post()
            ];
            http_response_code(200);
            echo json_encode($response);
          } else {
            $response = [
              "status" => true,
              "message" => 'Menu failed to be created'
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

  public function main_update()
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
        $this->form_validation->set_rules('parent_id', 'Parent ID', 'is_natural');
        $this->form_validation->set_rules('name', 'Nama Menu', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('path', 'Path URL', 'trim');
        $this->form_validation->set_rules('icon', 'Icon', 'trim');
        $this->form_validation->set_rules('position', 'Index', 'required|trim|is_natural');

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
          $payload = [
            "parent_id" => $this->input->post('parent_id'),
            "name" => $this->input->post('name'),
            "url" => base_url() . strtolower($this->input->post('path')),
            "icon" => strtolower($this->input->post('icon')),
            "position" => $this->input->post('position'),
            "status" => $this->input->post('status') ? 'active' : 'inactive',
            "target_blank" => $this->input->post('target_blank') ? 1 : 0,
          ];

          $where = 'id=' . $this->input->post('id');
          $update_menu = $this->MenusMainModel->update_data($where, $payload);

          if ($update_menu) {
            $response = [
              "status" => true,
              "message" => 'Menu updated',
              "data" => $this->input->post(),
              "affected_rows" => $update_menu
            ];
            http_response_code(200);
            echo json_encode($response);
          } else {
            $response = [
              "status" => true,
              "message" => 'Menu not updated',
              "affected_rows" => $update_menu
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

  public function main_destroy()
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
        $delete_menu = $this->MenusMainModel->delete_data($where);

        if ($delete_menu) {
          $response = [
            "status" => true,
            "message" => 'Menu deleted',
            "affected_rows" => $delete_menu
          ];
          http_response_code(200);
          echo json_encode($response);
        } else {
          $response = [
            "status" => false,
            "message" => 'Menu not deleted',
            "affected_rows" => $delete_menu
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

  public function group_main_update()
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
        $payload = $this->input->post('data');

        // Validate the payload
        $this->form_validation->set_data($payload);
        $this->form_validation->set_rules('menuID', 'Menu ID', 'is_natural');
        $this->form_validation->set_rules('parentID', 'Parent ID', 'is_natural');
        $this->form_validation->set_rules('position', 'Position', 'is_natural');

        if ($this->form_validation->run() == FALSE) {
          $errors = array();
          // Iterate through each form field and retrieve the corresponding error message
          foreach ($payload as $index => $field) {
            foreach ($field as $field_name => $field_value) {
              if (!empty(form_error($field_name))) {
                $error_message = form_error($field_name);
                $clean_error_message = strip_tags($error_message); // Remove HTML tags from the error message
                $errors[$index][$field_name] = $clean_error_message;
              }
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
          $rows_affected = 0;
          foreach ($payload as $data) {
            $menuID = $data['menuID'];
            $parentID = $data['parentID'];
            $position = $data['position'];

            $where = 'id=' . $menuID;
            $update_menu = $this->MenusMainModel->update_data($where, array(
              "parent_id" => $parentID,
              "position" => $position
            ));
            $rows_affected = $rows_affected + $update_menu;
          }

          if ($rows_affected > 0) {
            $response = [
              "status" => true,
              "message" => 'Menu updated',
              "data" => $this->input->post(),
              "affected_rows" => $update_menu
            ];
            http_response_code(200);
            echo json_encode($response);
          } else {
            $response = [
              "status" => true,
              "message" => 'Menu not updated',
              "affected_rows" => $update_menu
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
}
