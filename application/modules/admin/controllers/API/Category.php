<?php

class Category extends MY_Controller
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
      'Category_model' => 'CategoryModel',
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
        $category = $this->CategoryModel->get_all();

        $response = [
          "status" => true,
          "message" => 'Categories retrieved',
          "data" => $category,
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
        $category = $this->CategoryModel->get_data('id', $id);

        $response = [
          "status" => true,
          "message" => 'Category retrieved',
          "data" => $category,
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
        $this->form_validation->set_rules('name', 'Nama Kategori', 'required|trim|min_length[4]|is_unique[m_category.name]');
        $this->form_validation->set_rules('type', 'Tipe', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('description', 'Deskripsi', 'trim|min_length[6]');

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
            "name" => strtolower($this->input->post('name')),
            "type" => strtolower($this->input->post('type')),
            "description" => $this->input->post('description'),
          ];

          $insert_category = $this->CategoryModel->insert_data($payload);

          if ($insert_category) {
            $response = [
              "status" => true,
              "message" => 'Category created',
              "data" => $this->input->post()
            ];
            http_response_code(200);
            echo json_encode($response);
          } else {
            $response = [
              "status" => true,
              "message" => 'Category failed to be created'
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
        $this->form_validation->set_rules('name', 'Nama Kategori', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('type', 'Tipe', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('description', 'Deskripsi', 'trim|min_length[6]');

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
          $current_edited_category = $this->CategoryModel->get_data('id', $this->input->post('id'));
          $payload = [
            "name" => $this->input->post('name'),
            "type" => strtolower($this->input->post('type')),
            "description" => $this->input->post('description'),
          ];
          
          $is_unique_name = $this->CategoryModel->get_data('name', $payload['name']);
          if ($is_unique_name && $is_unique_name->id != $current_edited_category->id) {
            $response = [
              "status" => false,
              "message" => 'Payload is not satisfied',
              "data" => [
                "name" => "Nama Kategori telah digunakan"
              ]
            ];
            http_response_code(403);
            echo json_encode($response);
          } else {
            $where = 'id=' . $this->input->post('id');
            $update_category = $this->CategoryModel->update_data($where, $payload);

            if ($update_category) {
              $response = [
                "status" => true,
                "message" => 'Category updated',
                "data" => $this->input->post(),
                "affected_rows" => $update_category
              ];
              http_response_code(200);
              echo json_encode($response);
            } else {
              $response = [
                "status" => true,
                "message" => 'Category not updated',
                "affected_rows" => $update_category
              ];
              http_response_code(200);
              echo json_encode($response);
            }
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
        $delete_category = $this->CategoryModel->delete_data($where);

        if ($delete_category) {
          $response = [
            "status" => true,
            "message" => 'Category deleted',
            "affected_rows" => $delete_category
          ];
          http_response_code(200);
          echo json_encode($response);
        } else {
          $response = [
            "status" => false,
            "message" => 'Category not deleted',
            "affected_rows" => $delete_category
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
