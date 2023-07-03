<?php

class Komoditaskelompok extends MY_Controller
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
      'Komoditaskelompok_model' => 'KomoditasKelompokModel',
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
        $komoditas_kelompok = $this->KomoditasKelompokModel->get_all();

        $response = [
          "status" => true,
          "message" => 'Kelompok retrieved',
          "data" => $komoditas_kelompok,
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
        $komoditas_kelompok = $this->KomoditasKelompokModel->get_data('id', $id);

        $response = [
          "status" => true,
          "message" => 'Kelompok Komoditas retrieved',
          "data" => $komoditas_kelompok,
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
        $this->form_validation->set_rules('name', 'Nama Kelompok', 'required|trim|min_length[4]|is_unique[m_komoditas_cluster.name]');

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
          ];

          $insert_komoditas = $this->KomoditasKelompokModel->insert_data($payload);

          if ($insert_komoditas) {
            $response = [
              "status" => true,
              "message" => 'Kelompok Komoditas created',
              "data" => $this->input->post()
            ];
            http_response_code(200);
            echo json_encode($response);
          } else {
            $response = [
              "status" => true,
              "message" => 'Kelompok Komoditas failed to be created'
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
        $this->form_validation->set_rules('name', 'Nama Kelompok', 'required|trim|min_length[4]');

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
          $current_edited_komoditas = $this->KomoditasKelompokModel->get_data('id', $this->input->post('id'));
          $payload = [
            "name" => strtolower($this->input->post('name')),
          ];
          
          $is_unique_name = $this->KomoditasKelompokModel->get_data('name', $payload['name']);
          if ($is_unique_name && $is_unique_name->id != $current_edited_komoditas->id) {
            $response = [
              "status" => false,
              "message" => 'Payload is not satisfied',
              "data" => [
                "name" => "Nama Kelompok telah digunakan"
              ]
            ];
            http_response_code(403);
            echo json_encode($response);
          } else {
            $where = 'id=' . $this->input->post('id');
            $update_komoditas = $this->KomoditasKelompokModel->update_data($where, $payload);

            if ($update_komoditas) {
              $response = [
                "status" => true,
                "message" => 'Kelompok Komoditas updated',
                "data" => $this->input->post(),
                "affected_rows" => $update_komoditas
              ];
              http_response_code(200);
              echo json_encode($response);
            } else {
              $response = [
                "status" => true,
                "message" => 'Kelompok Komoditas not updated',
                "affected_rows" => $update_komoditas
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
        $delete_komoditas = $this->KomoditasKelompokModel->delete_data($where);

        if ($delete_komoditas) {
          $response = [
            "status" => true,
            "message" => 'Kelompok Komoditas deleted',
            "affected_rows" => $delete_komoditas
          ];
          http_response_code(200);
          echo json_encode($response);
        } else {
          $response = [
            "status" => false,
            "message" => 'Kelompok Komoditas not deleted',
            "affected_rows" => $delete_komoditas
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
