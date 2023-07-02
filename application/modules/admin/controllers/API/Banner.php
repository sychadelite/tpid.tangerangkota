<?php

class Banner extends MY_Controller
{
  private $key;
  public function __construct()
  {
    parent::__construct();

    $this->load->library(['form_validation', 'upload']);

    $this->load->helper(['jwt']);

    $this->load->model(array(
      'User_model' => 'UserModel',
      'Banner_model' => 'BannerModel',
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

      if ($check_user->user_group_id == 1) {
        $banner = $this->BannerModel->get_all();

        $response = [
          "status" => true,
          "message" => 'Banners retrieved',
          "data" => $banner,
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
        $banner = $this->BannerModel->get_data('id', $id);

        $response = [
          "status" => true,
          "message" => 'Banner retrieved',
          "data" => $banner,
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
        $this->form_validation->set_rules('name', 'Nama Banner', 'required|trim|min_length[4]|is_unique[m_banner.name]');
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
            "status" => $this->input->post('status') ? 'active' : 'inactive',
            "description" => $this->input->post('description'),
          ];

          $insert_banner = $this->BannerModel->insert_data($payload);

          if ($insert_banner) {
            $last_banner_id = $this->db->insert_id();
            if (isset($_FILES['files'])) {
              $files = $this->processFiles($_FILES['files']);
              if ($files['status']) {
                for ($i = 0; $i < count($files['data']); $i++) {
                  if ($files['data'][$i]['status'] && $i == 0) {
                    $file = [
                      "banner_id" => $last_banner_id,
                      "file_name" => $files['data'][$i]['file_name'],
                      "file_size" => $files['data'][$i]['file_size'],
                      "file_path" => $files['data'][$i]['file_path'],
                    ];

                    $where = 'id=' . $file['banner_id'];
                    $update_banner = $this->BannerModel->update_data($where, [
                      "image" => $file['file_name']
                    ]);
                  }
                }
              }
            }

            $response = [
              "status" => true,
              "message" => 'Banner created',
              "data" => $this->input->post()
            ];
            http_response_code(200);
            echo json_encode($response);
          } else {
            $response = [
              "status" => true,
              "message" => 'Banner failed to be created'
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
        $this->form_validation->set_rules('name', 'Nama Banner', 'required|trim|min_length[4]');
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
            "name" => $this->input->post('name'),
            "status" => $this->input->post('status') ? 'active' : 'inactive',
            "description" => $this->input->post('description'),
          ];

          $is_unique_banner = $this->BannerModel->get_unique_data($this->input->post('id'), $payload['name']);
          if ($is_unique_banner) {
            $error_data = [];
            foreach ($is_unique_banner as $key => $value) {
              $error_data['name'] = $value->name === $payload['name'] ? 'Nama Banner telah digunakan' : null;
            }
            $response = [
              "status" => false,
              "message" => 'Payload is not satisfied',
              "data" => $error_data
            ];
            http_response_code(403);
            echo json_encode($response);
          } else {
            $current_banner_id = $this->input->post('id');
            $where = 'id=' . $current_banner_id;
            $update_banner = $this->BannerModel->update_data($where, $payload);

            if (isset($_FILES['files'])) {
              // File name already exists on server and DB
              $file_available = $this->BannerModel->get_data('id', $current_banner_id);
              // Remove the files with matching names
              foreach ($_FILES['files']['name'] as $key => $file_name) {
                if ($file_name === $file_available->image) {
                  // File name found in the database, remove it from the array
                  unset($_FILES['files']['name'][$key]);
                  unset($_FILES['files']['type'][$key]);
                  unset($_FILES['files']['tmp_name'][$key]);
                  unset($_FILES['files']['error'][$key]);
                  unset($_FILES['files']['size'][$key]);
                }
              }

              // Convert the array keys to sequential numeric indexes
              $uploadedFiles = array_map('array_values', $_FILES['files']);
              $files = $this->processFiles($uploadedFiles);
              if ($files['status']) {
                for ($i = 0; $i < count($files['data']); $i++) {
                  if ($files['data'][$i]['status'] && $i == 0) {
                    $file = [
                      "banner_id" => $current_banner_id,
                      "file_name" => $files['data'][$i]['file_name'],
                      "file_size" => $files['data'][$i]['file_size'],
                      "file_path" => $files['data'][$i]['file_path'],
                    ];

                    $where = 'id=' . $file['banner_id'];
                    $update_banner = $this->BannerModel->update_data($where, [
                      "image" => $file['file_name']
                    ]);
                  }
                }
              }
            } else {
              $file_to_delete = $this->BannerModel->get_data('id', $current_banner_id);
              $this->removeFiles($current_banner_id, $file_to_delete);
            }

            $response = [
              "status" => true,
              "message" => 'Banner updated',
              "data" => $this->input->post(),
              "affected_rows" => $update_banner
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
        $delete_banner = $this->BannerModel->delete_data($where);

        if ($delete_banner) {
          $response = [
            "status" => true,
            "message" => 'Banner deleted',
            "affected_rows" => $delete_banner
          ];
          http_response_code(200);
          echo json_encode($response);
        } else {
          $response = [
            "status" => false,
            "message" => 'Banner not deleted',
            "affected_rows" => $delete_banner
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

  private function processFiles($uploadedFiles)
  {
    // Set the upload configuration
    $config['allowed_types'] = 'jpg|jpeg|png|webp|gif|pdf'; // Specify the allowed image file types
    $config['max_size'] = 2048; // Set the maximum file size in kilobytes

    // Check if files were uploaded
    if (!empty($uploadedFiles['name'])) {
      // Files were uploaded

      // Process each uploaded file
      $dump = array();
      $fileCount = count($uploadedFiles['name']);
      for ($i = 0; $i < $fileCount; $i++) {
        $file = $uploadedFiles;
        $fileName = 'banner-' . time() . '_' . $file['name'][$i];
        $fileType = $file['type'][$i];
        $fileTmpName = $file['tmp_name'][$i];
        $fileError = $file['error'][$i];
        $fileSize = $file['size'][$i];

        // Check file type
        $pos = strrpos($uploadedFiles['type'][$i], '/');
        $ext = $pos === false ? $uploadedFiles['type'][$i] : substr($uploadedFiles['type'][$i], $pos + 1);
        // Consider Directory
        if ($ext !== 'pdf') {
          $config['upload_path'] = './assets/img/';
        } else {
          $dump[$i] = [
            "status" => false,
            "message" => "File type not allowed"
          ];
          continue;
        }

        // Validate file size
        if ($fileSize > $config['max_size'] * 1024) {
          $dump[$i] = [
            "status" => false,
            "message" => "Failed: File size exceeds the limit.",
            "file_name" => $fileName,
            "file_tmp_name" => $fileTmpName,
            "file_type" => $fileType,
            "file_error" => $fileError,
            "file_size" => $fileSize,
            "file_path" => null,
          ];
          continue; // Skip the file and proceed to the next iteration
        }

        // Check if the file already exists on the server
        $uploadPath = $config['upload_path'];
        $destination = $uploadPath . $file['name'][$i];
        if (file_exists($destination)) {
          $dump[$i] = [
            "status" => false,
            "message" => "Failed: File already exists.",
            "file_name" => $file['name'][$i],
            "file_tmp_name" => $fileTmpName,
            "file_type" => $fileType,
            "file_error" => $fileError,
            "file_size" => $fileSize,
            "file_path" => $destination,
          ];
          continue; // Skip the file and proceed to the next iteration
        }

        // Update upload configuration for each file
        $this->upload->initialize($config);

        // Perform file upload or other operations
        $uploadPath = $config['upload_path'];
        $destination = $uploadPath . $fileName;
        if ($fileError == UPLOAD_ERR_OK) {
          // Handle further operations with the uploaded file
          move_uploaded_file($fileTmpName, $destination);

          $dump[$i] = [
            "status" => true,
            "message" => "Success",
            "file_name" => $fileName,
            "file_tmp_name" => $fileTmpName,
            "file_type" => $fileType,
            "file_error" => $fileError,
            "file_size" => $fileSize,
            "file_path" => $destination,
          ];
        } else {
          // Handle file upload error
          $error = $this->upload->display_errors();

          $dump[$i] = [
            "status" => false,
            "message" => "Failed: " . $error,
            "file_name" => $fileName,
            "file_tmp_name" => $fileTmpName,
            "file_type" => $fileType,
            "file_error" => $fileError,
            "file_size" => $fileSize,
            "file_path" => $destination,
          ];
        }
      }

      for ($i = 0; $i < count($dump); $i++) {
        // Handle failed uploaded files
        if (!$dump[$i]['status'] && !empty($dump[$i]['file_path'])) {
          unlink($dump[$i]['file_path']);
        }
      }

      // Return success response
      $response = [
        'status' => true,
        'message' => 'Files uploaded successfully.',
        'data' => $dump
      ];
    } else {
      // No files uploaded

      // Return error response
      $response = [
        'status' => false,
        'message' => 'No files uploaded.',
        'data' => null
      ];
    }

    return $response;
  }

  private function removeFiles($id, $file)
  {
    if ($file) {
      if (!empty($file->image)) {
        unlink('./assets/img/' . $file->image);
        $where = 'id=' . $id;
        $this->BannerModel->update_data($where, [
          "image" => NULL,
        ]);
      }
    }
    return true;
  }
}
