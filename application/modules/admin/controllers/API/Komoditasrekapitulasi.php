<?php

class Komoditasrekapitulasi extends MY_Controller
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
      'Komoditas_model' => 'KomoditasModel',
      'Pasar_model' => 'PasarModel',
      'Komoditasrekapitulasi_model' => 'KomoditasRekapitulasiModel',
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
        $rekapitulasi = $this->KomoditasRekapitulasiModel->get_all();

        $response = [
          "status" => true,
          "message" => 'Rekapitulasi retrieved',
          "data" => $rekapitulasi,
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
        $rekapitulasi = $this->KomoditasRekapitulasiModel->get_data('id', $id);

        $response = [
          "status" => true,
          "message" => 'Komoditas Rekapitulasi retrieved',
          "data" => $rekapitulasi,
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
        $this->form_validation->set_rules('komoditas_id', 'Komoditas', 'required|trim|numeric');
        $this->form_validation->set_rules('pasar_id', 'Pasar', 'required|trim|numeric');
        $this->form_validation->set_rules('value', 'Value', 'required|trim|numeric');
        $this->form_validation->set_rules('date', 'Date', 'required|trim');

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
            "komoditas_id" => $this->input->post('komoditas_id'),
            "pasar_id" => $this->input->post('pasar_id'),
            "value" => $this->input->post('value'),
            "date" => date('Y-m-d', strtotime($this->input->post('date'))),
          ];

          $is_unique_komoditas_rekapitulasi = $this->KomoditasRekapitulasiModel->get_unique_data('komoditas_id', $payload['komoditas_id'], 'pasar_id', $payload['pasar_id'], 'date', $payload['date']);
          if ($is_unique_komoditas_rekapitulasi) {
            $response = [
              "status" => false,
              "message" => 'Payload is not satisfied',
              "data" => [
                "komoditas_id" => "Komoditas Rekapitulasi telah diinput"
              ]
            ];
            http_response_code(403);
            echo json_encode($response);
          } else {
            $insert_pasar = $this->KomoditasRekapitulasiModel->insert_data($payload);

            if ($insert_pasar) {
              $response = [
                "status" => true,
                "message" => 'Komoditas Rekapitulasi created',
                "data" => $this->input->post()
              ];
              http_response_code(200);
              echo json_encode($response);
            } else {
              $response = [
                "status" => true,
                "message" => 'Komoditas Rekapitulasi failed to be created'
              ];
              http_response_code(400);
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
        $this->form_validation->set_rules('komoditas_id', 'Komoditas', 'required|trim|numeric');
        $this->form_validation->set_rules('pasar_id', 'Pasar', 'required|trim|numeric');
        $this->form_validation->set_rules('value', 'Value', 'required|trim|numeric');
        $this->form_validation->set_rules('date', 'Date', 'required|trim');

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
          $current_edited_rekapitulasi = $this->KomoditasRekapitulasiModel->get_data('id', $this->input->post('id'));
          $payload = [
            "komoditas_id" => $this->input->post('komoditas_id'),
            "pasar_id" => $this->input->post('pasar_id'),
            "value" => $this->input->post('value'),
            "date" => date('Y-m-d', strtotime($this->input->post('date'))),
          ];

          $is_unique_komoditas_rekapitulasi = $this->KomoditasRekapitulasiModel->get_unique_data('komoditas_id', $payload['komoditas_id'], 'pasar_id', $payload['pasar_id'], 'date', $payload['date']);
          if ($is_unique_komoditas_rekapitulasi && ($is_unique_komoditas_rekapitulasi->id != $current_edited_rekapitulasi->id)) {
            $response = [
              "status" => false,
              "message" => 'Payload is not satisfied',
              "data" => [
                "komoditas_id" => "Komoditas Rekapitulasi telah diinput"
              ]
            ];
            http_response_code(403);
            echo json_encode($response);
          } else {
            $where = 'id=' . $this->input->post('id');
            $update_pasar = $this->KomoditasRekapitulasiModel->update_data($where, $payload);

            if ($update_pasar) {
              $response = [
                "status" => true,
                "message" => 'Komoditas Rekapitulasi updated',
                "data" => $this->input->post(),
                "affected_rows" => $update_pasar
              ];
              http_response_code(200);
              echo json_encode($response);
            } else {
              $response = [
                "status" => true,
                "message" => 'Komoditas Rekapitulasi not updated',
                "affected_rows" => $update_pasar
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
        $delete_pasar = $this->KomoditasRekapitulasiModel->delete_data($where);

        if ($delete_pasar) {
          $response = [
            "status" => true,
            "message" => 'Komoditas Rekapitulasi deleted',
            "affected_rows" => $delete_pasar
          ];
          http_response_code(200);
          echo json_encode($response);
        } else {
          $response = [
            "status" => false,
            "message" => 'Komoditas Rekapitulasi not deleted',
            "affected_rows" => $delete_pasar
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
