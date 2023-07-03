<?php

class Berita extends MY_Controller
{
  private $key;
  public function __construct()
  {
    parent::__construct();

    $this->load->library(['form_validation', 'upload']);

    $this->load->helper(['jwt']);

    $this->load->model(array(
      'User_model' => 'UserModel',
      'Usergroup_model' => 'UserGroupModel',
      'Berita_model' => 'BeritaModel',
      'Beritafiles_model' => 'BeritaFilesModel',
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
        $berita = $this->BeritaModel->get_all();

        $response = [
          "status" => true,
          "message" => 'Berita retrieved',
          "data" => $berita,
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

  public function get_all_by_category($category)
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
        $berita = $this->BeritaModel->get_all_data('category', $category);

        $response = [
          "status" => true,
          "message" => 'Berita by category retrieved',
          "data" => $berita,
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
        $berita = $this->BeritaModel->get_data('id', $id);
        $files = $this->BeritaModel->get_files('id', $id);

        $response = [
          "status" => true,
          "message" => 'Berita retrieved',
          "data" => $berita,
          "files" => $files
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
        $this->form_validation->set_rules('title', 'Title', 'required|trim|min_length[4]|is_unique[m_berita.title]');
        $this->form_validation->set_rules('slug', 'Slug', 'required|trim|min_length[4]|is_unique[m_berita.slug]');
        $this->form_validation->set_rules('description', 'Deskripsi', 'trim|min_length[6]');
        $this->form_validation->set_rules('category', 'Kategori', 'trim');

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
            "parent_id" => $this->input->post('parent_id') ?? 0,
            "category_id" => $this->input->post('category_id'),
            "user_id" => $check_user->id,
            "slug" => $this->input->post('slug'),
            "title" => $this->input->post('title'),
            "description" => $this->input->post('description'),
            "cover" => $this->input->post('cover'),
            "status" => $this->input->post('status') ? 'active' : 'inactive',
            "position" => $this->input->post('position') ?? 0,
            "enable_service" => $this->input->post('enable_service') ?? 0
          ];

          $check_category = $this->CategoryModel->get_data('id', $payload['category_id']);
          if ($check_category) {
            $insert_berita = $this->BeritaModel->insert_data($payload);
            if ($insert_berita) {
              if (isset($_FILES['files'])) {
                $files = $this->processFiles($_FILES['files']);
                if ($files['status']) {
                  $last_berita_id = $this->db->insert_id();
                  $processedFiles = array();
                  for ($i = 0; $i < count($files['data']); $i++) {
                    if ($files['data'][$i]['status']) {
                      $this->BeritaFilesModel->insert_data([
                        "berita_id" => $last_berita_id,
                        "file_name" => $files['data'][$i]['file_name'],
                        "file_size" => $files['data'][$i]['file_size'],
                        "file_path" => $files['data'][$i]['file_path'],
                        "file_data" => $files['data'][$i]['file_data'],
                      ]);

                      $processedFiles[$i] = $files['data'][$i]['file_path'];
                    }
                  }

                  if (count($processedFiles) > 0) {
                    $where = "id=" . $last_berita_id;
                    $this->BeritaModel->update_data($where, ["cover" => $processedFiles[0]]);
                  }
                }
              }

              $response = [
                "status" => true,
                "message" => 'Berita created'
              ];
              http_response_code(200);
              echo json_encode($response);
            } else {
              $response = [
                "status" => false,
                "message" => 'Berita failed to be created'
              ];
              http_response_code(400);
              echo json_encode($response);
            }
          } else {
            $response = [
              "status" => false,
              "message" => 'Category not found'
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
        $this->form_validation->set_rules('title', 'Title', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('slug', 'Slug', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('description', 'Deskripsi', 'trim|min_length[6]');
        $this->form_validation->set_rules('category', 'Kategori', 'trim');

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
            "parent_id" => $this->input->post('parent_id') ?? 0,
            "category_id" => $this->input->post('category_id'),
            "user_id" => $check_user->id,
            "slug" => $this->input->post('slug'),
            "title" => $this->input->post('title'),
            "description" => $this->input->post('description'),
            "cover" => $this->input->post('cover'),
            "status" => $this->input->post('status') ? 'active' : 'inactive',
            "position" => $this->input->post('position') ?? 0,
            "enable_service" => $this->input->post('enable_service') ?? 0
          ];

          $is_unique_berita = $this->BeritaModel->get_unique_data($this->input->post('id'), $payload['title'], $payload['slug']);
          if ($is_unique_berita) {
            $error_data = [];
            foreach ($is_unique_berita as $key => $value) {
              $error_data['title'] = $value->title === $payload['title'] ? 'Berita Title telah digunakan' : null;
              $error_data['slug'] = $value->slug === $payload['slug'] ? 'Berita Slug telah digunakan' : null;
            }
            $response = [
              "status" => false,
              "message" => 'Payload is not satisfied',
              "data" => $error_data
            ];
            http_response_code(403);
            echo json_encode($response);
          } else {
            $check_category = $this->CategoryModel->get_data('id', $payload['category_id']);
            if ($check_category) {
              $current_berita_id = $this->input->post('id');
              $where = 'id=' . $current_berita_id;
              $update_berita = $this->BeritaModel->update_data($where, $payload);
              if (isset($_FILES['files'])) {
                // File name does exist on server and DB but doesn't exist on payload
                $file_to_delete = $this->BeritaFilesModel->get_all_data('berita_id', $current_berita_id, null, [], 'file_name', $_FILES['files']['name']);
                $this->removeFiles($current_berita_id, $file_to_delete);

                // File name already exists on server and DB
                $file_available = $this->BeritaFilesModel->get_all_data('berita_id', $current_berita_id, 'file_name', $_FILES['files']['name']);
                // Extract the file names from the $file_available array
                $file_names_available = array_column($file_available, 'file_name');
                // Remove the files with matching names
                foreach ($_FILES['files']['name'] as $key => $file_name) {
                  if (in_array($file_name, $file_names_available)) {
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
                  $processedFiles = array();
                  for ($i = 0; $i < count($files['data']); $i++) {
                    if ($files['data'][$i]['status']) {
                      $this->BeritaFilesModel->insert_data([
                        "berita_id" => $current_berita_id,
                        "file_name" => $files['data'][$i]['file_name'],
                        "file_size" => $files['data'][$i]['file_size'],
                        "file_path" => $files['data'][$i]['file_path'],
                        "file_data" => $files['data'][$i]['file_data'],
                      ]);

                      $processedFiles[$i] = $files['data'][$i]['file_path'];
                    }
                  }

                  if (count($processedFiles) > 0) {
                    $where = "id=" . $current_berita_id;
                    $this->BeritaModel->update_data($where, ["cover" => $processedFiles[0]]);
                  }
                }
              } else {
                $file_to_delete = $this->BeritaFilesModel->get_all_data('berita_id', $current_berita_id);
                $this->removeFiles($current_berita_id, $file_to_delete);
              }

              $response = [
                "status" => true,
                "message" => 'Berita updated'
              ];
              http_response_code(200);
              echo json_encode($response);
            } else {
              $response = [
                "status" => false,
                "message" => 'Category not found'
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
        $files = $this->BeritaModel->get_files('id', $this->input->post('id'));
        for ($i = 0; $i < count($files); $i++) {
          if (!empty($files[$i]->file_path)) {
            unlink($files[$i]->file_path);
          }
        }

        $where = 'id=' . $this->input->post('id');
        $delete_category = $this->BeritaModel->delete_data($where);

        if ($delete_category) {
          $response = [
            "status" => true,
            "message" => 'Berita deleted',
            "affected_rows" => $delete_category
          ];
          http_response_code(200);
          echo json_encode($response);
        } else {
          $response = [
            "status" => false,
            "message" => 'Berita not deleted',
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
        $fileName = time() . '_' . $file['name'][$i];
        $fileType = $file['type'][$i];
        $fileTmpName = $file['tmp_name'][$i];
        $fileError = $file['error'][$i];
        $fileSize = $file['size'][$i];

        // Check file type
        $pos = strrpos($uploadedFiles['type'][$i], '/');
        $ext = $pos === false ? $uploadedFiles['type'][$i] : substr($uploadedFiles['type'][$i], $pos + 1);
        // Consider Directory
        if ($ext !== 'pdf') {
          $config['upload_path'] = './assets/publish/images/';
        } else {
          $config['upload_path'] = './assets/publish/documents/';
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
            "file_data" => null,
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
            "file_data" => null,
          ];
          continue; // Skip the file and proceed to the next iteration
        }

        // Update upload configuration for each file
        $this->upload->initialize($config);

        // Perform file upload or other operations
        $uploadPath = $config['upload_path'];
        $destination = $uploadPath . $fileName;
        if ($fileError == UPLOAD_ERR_OK) {
          // File uploaded successfully, proceed with inserting into the database
          $filedata = file_get_contents($fileTmpName);
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
            "file_data" => $filedata,
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
            "file_data" => null,
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

  private function removeFiles($id, $files)
  {
    if ($files) {
      for ($i = 0; $i < count($files); $i++) {
        if (!empty($files[$i]->file_path)) {
          unlink($files[$i]->file_path);
          $where_delete = 'file_name="' . $files[$i]->file_name . '"';
          $this->BeritaFilesModel->delete_data($where_delete, $id);
        }
      }
    }
    return true;
  }
}
