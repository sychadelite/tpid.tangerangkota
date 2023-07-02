<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Daftar Berita</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Berita</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex flex-wrap">
                  <h3 class="card-title">Tabel data berita</h3>
                  <div class="card-tools ml-4">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div>
                  <button type="button" id="btn-modal-add-berita" class="btn btn-primary" data-toggle="modal" data-target="#addBeritaModal">
                    <i class="fas fa-plus mr-1"></i>
                    Tambah Data
                  </button>
                </div>
              </div>
            </div>

            <div class="card-body">
              <table id="table_berita" class="table table-hover table-striped">
                <thead></thead>
                <tbody></tbody>
                <tfoot></tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Modals -->
  <div class="modal fade" id="addBeritaModal" tabindex="-1" aria-labelledby="addBeritaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addBeritaModalLabel">Tambah Data Berita</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formAddBerita" class="needs-validation" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="<?= $content['csrf']['name']; ?>" value="<?= $content['csrf']['hash']; ?>" />
            <input type="hidden" id="category" name="category" value="berita" />
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="title">Title Berita</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= set_value('title'); ?>" placeholder="Title Berita .." required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" value="<?= set_value('slug'); ?>" placeholder="Path .." required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="category_id">Kategori</label>
                <select class="custom-select" id="category_id" name="category_id" required>
                  <?php for ($i = 0; $i < count($content["data_category"]); $i++) { ?>
                    <option <?= $i == 0 ? 'selected' : '' ?> value="<?= $content["data_category"][$i]->id; ?>"><?= $content["data_category"][$i]->name; ?></option>
                  <?php } ?>
                </select>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-2 mb-3">
                <label for="status">Status</label>
                <div>
                  <input type="checkbox" id="status" name="status" data-bootstrap-switch data-off-color="danger" data-on-color="success">
                </div>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="description">Deskripsi</label>
                <div id="ck-code-container">
                  <div id="ck-editor-add" name="description"></div>
                </div>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="cover">Cover</label>
                <div class="card card-default">
                  <div class="card-header">
                    <h3 class="card-title"><small>Upload/Drop File</small></h3>
                  </div>
                  <div class="card-body">
                    <div id="actions" class="row">
                      <div class="col-lg-4 mb-2">
                        <div class="btn-group btn-group-sm w-auto">
                          <span class="btn btn-sm btn-success col fileinput-button">
                            <div class="d-flex flex-wrap justify-content-center align-items-center h-100 w-100" style="gap: 0 5px;">
                              <i class="fas fa-plus"></i>
                              <span>Add File</span>
                            </div>
                          </span>
                        </div>
                      </div>
                      <div class="col-lg-8 d-flex align-items-center mb-2">
                        <div class="fileupload-process w-100">
                          <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                            <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="table table-striped files" id="previews-add-file">
                      <div id="template-add-file" class="row mt-2">
                        <div class="col-auto">
                          <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                        </div>
                        <div class="col d-flex align-items-center">
                          <p class="mb-0">
                            <span class="lead" data-dz-name></span>
                            (<span data-dz-size></span>)
                          </p>
                          <strong class="error text-danger" data-dz-errormessage></strong>
                        </div>
                        <div class="col-4 d-flex align-items-center">
                          <div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                            <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                          </div>
                        </div>
                        <div class="col-auto d-flex align-items-center">
                          <div class="btn-group">
                            <!-- <button class="btn btn-sm btn-primary start">
                              <i class="fas fa-upload"></i>
                              <span>Start</span>
                            </button> -->
                            <button data-dz-remove class="btn btn-sm btn-danger cancel">
                              <i class="fas fa-times-circle"></i>
                              <span>Cancel</span>
                            </button>
                            <!-- <button data-dz-remove class="btn btn-sm btn-danger delete">
                              <i class="fas fa-trash"></i>
                              <span>Delete</span>
                            </button> -->
                          </div>
                        </div>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" form="formAddBerita">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editBeritaModal" tabindex="-1" aria-labelledby="editBeritaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editBeritaModalLabel">Edit Data Berita</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formEditBerita" class="needs-validation" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="<?= $content['csrf']['name']; ?>" value="<?= $content['csrf']['hash']; ?>" />
            <input type="hidden" id="id" name="id" value="" />
            <input type="hidden" id="category" name="category" value="berita" />
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="title">Title Berita</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= set_value('title'); ?>" placeholder="Title Berita .." required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" value="<?= set_value('slug'); ?>" placeholder="Path .." required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="category_id">Kategori</label>
                <select class="custom-select" id="category_id" name="category_id" required>
                  <?php for ($i = 0; $i < count($content["data_category"]); $i++) { ?>
                    <option <?= $i == 0 ? 'selected' : '' ?> value="<?= $content["data_category"][$i]->id; ?>"><?= $content["data_category"][$i]->name; ?></option>
                  <?php } ?>
                </select>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-2 mb-3">
                <label for="status">Status</label>
                <div>
                  <input type="checkbox" id="status" name="status" data-bootstrap-switch data-off-color="danger" data-on-color="success">
                </div>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="description">Deskripsi</label>
                <div id="ck-code-container">
                  <div id="ck-editor-edit" name="description"></div>
                </div>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="cover">Cover</label>
                <div class="card card-default">
                  <div class="card-header">
                    <h3 class="card-title"><small>Upload/Drop File</small></h3>
                  </div>
                  <div class="card-body">
                    <div id="actions" class="row">
                      <div class="col-lg-4 mb-2">
                        <div class="btn-group btn-group-sm w-auto">
                          <span class="btn btn-sm btn-success col fileinput-button">
                            <div class="d-flex flex-wrap justify-content-center align-items-center h-100 w-100" style="gap: 0 5px;">
                              <i class="fas fa-plus"></i>
                              <span>Add File</span>
                            </div>
                          </span>
                        </div>
                      </div>
                      <div class="col-lg-8 d-flex align-items-center mb-2">
                        <div class="fileupload-process w-100">
                          <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                            <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="table table-striped files" id="previews-edit-file">
                      <div id="template-edit-file" class="row mt-2">
                        <div class="col-auto">
                          <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                        </div>
                        <div class="col d-flex align-items-center">
                          <p class="mb-0">
                            <span class="lead" data-dz-name></span>
                            (<span data-dz-size></span>)
                          </p>
                          <strong class="error text-danger" data-dz-errormessage></strong>
                        </div>
                        <div class="col-4 d-flex align-items-center">
                          <div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                            <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                          </div>
                        </div>
                        <div class="col-auto d-flex align-items-center">
                          <div class="btn-group">
                            <button data-dz-remove class="btn btn-sm btn-danger cancel">
                              <i class="fas fa-trash-alt"></i>
                              <span>Delete</span>
                            </button>
                          </div>
                        </div>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" form="formEditBerita">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="deleteBeritaModal" tabindex="-1" aria-labelledby="deleteBeritaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteBeritaModalLabel">Hapus Data Berita</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formDeleteBerita" class="needs-validation" novalidate>
            <input type="hidden" id="<?= $content['csrf']['name']; ?>" name="<?= $content['csrf']['name']; ?>" value="<?= $content['csrf']['hash']; ?>" />
            <input type="hidden" id="id" name="id" value="" />
          </form>
          Apakah anda yakin ingin menghapus data berita ini ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger" form="formDeleteBerita">Hapus</button>
        </div>
      </div>
    </div>
  </div>

</div>

<script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/super-build/ckeditor.js"></script>
<script src="/assets/vendor/AdminLTE-3.2.0/plugins/dropzone/min/dropzone.min.js"></script>

<script>
  var CKEditor_add, CKEditor_edit, myDropzone, previewAddTemplate, previewEditTemplate;
  // CKEDITOR-INITIALIZED
  $.ajax({
    url: '/assets/js/config/ck-editor.json',
    dataType: 'json',
    success: function(config) {
      CKEDITOR.ClassicEditor.create(document.getElementById("ck-editor-add"), config)
        .then(editor => {
          CKEditor_add = editor;
        })
        .catch(err => {
          console.error(err.stack);
        });

      CKEDITOR.ClassicEditor.create(document.getElementById("ck-editor-edit"), config)
        .then(editor => {
          CKEditor_edit = editor;
        })
        .catch(err => {
          console.error(err.stack);
        });
    },
    error: function(xhr, status, error) {
      console.error(error);
    }
  });

  // DROPZONE START
  $(function() {
    Dropzone.autoDiscover = false
    // Get the template HTML and remove it from the document
    var previewAddNode = document.querySelector("#addBeritaModal #template-add-file");
    previewAddNode.id = "";
    previewAddTemplate = previewAddNode.parentNode.innerHTML;
    previewAddNode.parentNode.removeChild(previewAddNode);

    var previewEditNode = document.querySelector("#editBeritaModal #template-edit-file");
    previewEditNode.id = "";
    previewEditTemplate = previewEditNode.parentNode.innerHTML;
    previewEditNode.parentNode.removeChild(previewEditNode);
  })

  // Function to initialize Dropzone with the specified configuration
  function initDropzone(config) {
    if (myDropzone) {
      myDropzone.destroy(); // Destroy the existing Dropzone instance if it exists
    }

    myDropzone = new Dropzone(document.body, config);

    myDropzone.on("addedfile", function(file) {
      // Hookup the start button
      const btnStartTransfer = file.previewElement.querySelector(".start");
      if (btnStartTransfer) {
        btnStartTransfer.onclick = function() {
          myDropzone.enqueueFile(file)
        }
      }
    })

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
      document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
    })

    myDropzone.on("sending", function(file) {
      // Show the total progress bar when upload starts
      document.querySelector("#total-progress").style.opacity = "1"
      // And disable the start button
      file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
    })

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
      document.querySelector("#total-progress").style.opacity = "0"
    })

    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    const btnActionStart = document.querySelector("#actions .start");
    const btnActionCancel = document.querySelector("#actions .cancel");
    if (btnActionStart) {
      document.querySelector("#actions .start").onclick = function() {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
      }
    }
    if (btnActionCancel) {
      document.querySelector("#actions .cancel").onclick = function() {
        myDropzone.removeAllFiles(true)
      }
    }
  }
  // DROPZONE END

  // ===============================>> <<=============================

  var table_berita;

  $(window).on('resize', function() {
    table_berita.columns.adjust(); // Adjust the column widths on window resize
  });

  $(document).on('click', '[id^="btn-modal-add-berita"]', function() {
    // Add dropzone configuration for adding data
    const addConfig = {
      url: "/api/berita/create",
      sending: function(file, xhr, formData) {
        formData.append('<?= $content['csrf']['name']; ?>', '<?= $content['csrf']['hash']; ?>');
        formData.append('contain_file', true);
      },
      thumbnailWidth: 80,
      thumbnailHeight: 80,
      parallelUploads: 20,
      previewTemplate: previewAddTemplate,
      autoQueue: false,
      previewsContainer: "#previews-add-file",
      clickable: "#addBeritaModal .fileinput-button",
      uploadMultiple: true,
      maxFiles: 10,
      maxFilesize: 2,
      accept: function(file, done) {
        if (file.type.match(/image.*/)) {
          done();
        } else {
          done("Please upload only image files.");
        }
      }
    };
    // Initialize Dropzone for adding data
    initDropzone(addConfig);
  });

  $(document).on('click', '[id^="btn-modal-edit-berita"]', function() {
    let row_id = $(this).data('berita');
    // Perform AJAX call
    $.ajax({
      url: "/api/berita/" + row_id,
      method: 'GET',
      type: "GET",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      success: function(response) {
        // Handle success response
        $(`#editBeritaModal #id`).val(response.data.id);
        $(`#editBeritaModal #title`).val(response.data.title);
        $(`#editBeritaModal #slug`).val(response.data.slug);
        $(`#editBeritaModal #category_id`).val(response.data.category_id);
        $(`#editBeritaModal #status`).bootstrapSwitch('state', response.data.status === 'active', true);
        CKEditor_edit.setData(response.data.description);

        // Edit dropzone configuration
        const editConfig = {
          url: "/api/berita/create",
          sending: function(file, xhr, formData) {
            formData.append('<?= $content['csrf']['name']; ?>', '<?= $content['csrf']['hash']; ?>');
            formData.append('contain_file', true);
          },
          thumbnailWidth: 80,
          thumbnailHeight: 80,
          parallelUploads: 20,
          previewTemplate: previewEditTemplate,
          autoQueue: false,
          previewsContainer: "#previews-edit-file",
          clickable: "#editBeritaModal .fileinput-button",
          uploadMultiple: true,
          maxFiles: 10,
          maxFilesize: 2,
          accept: function(file, done) {
            if (file.type.match(/image.*/)) {
              done();
            } else {
              done("Please upload only image files.");
            }
          }
        };
        // Initialize Dropzone for editing data
        initDropzone(editConfig);

        const files = response.files;
        files.forEach(function(fileData) {
          const mockFile = {
            name: fileData.file_name,
            size: fileData.file_size
          };

          // Fetch the file data as binary
          fetch(fileData.file_path.slice(1))
            .then(response => response.blob())
            .then(blob => {
              // Create a new File object with the binary data
              const binaryFile = new File([blob], mockFile.name, {
                type: blob.type
              });

              // Add the binary file to Dropzone
              myDropzone.files.push(binaryFile);

              // Emit Dropzone events for the added file
              myDropzone.emit("addedfile", binaryFile);
              myDropzone.emit("thumbnail", binaryFile, fileData.file_path.slice(1));
              myDropzone.emit("complete", binaryFile);

              // Associate the file with custom data (if needed)
              binaryFile.customData = {
                id: fileData.id,
                title: fileData.title
                // Add any other custom data properties as needed
              };
            });
        });

        $('#editBeritaModal').modal('show');
      },
      error: function(xhr, status, error) {
        if (xhr.status === 401) {
          window.location.href = '/logout';
        } else {
          // Handle error response
          console.error(xhr.responseText);
        }
      }
    });
  });

  $(document).on('click', '[id^="btn-modal-delete-berita"]', function() {
    let row_id = $(this).data('berita');

    $(`#deleteBeritaModal #id`).val(row_id);

    $('#deleteBeritaModal').modal('show');
  });

  $('#formAddBerita').submit(function(e) {
    // Prevent form submission
    e.preventDefault();

    // Clear previous error messages and validation states
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').remove();
    $('.is-valid').removeClass('is-valid');
    $('.valid-feedback').remove();

    var formData = new FormData(this);

    // Get CKEditor value
    var editorData = CKEditor_add.getData();
    // Add the CKEditor value to the form data
    formData.append('description', editorData);

    // Get the files from Dropzone
    var files = myDropzone.getAcceptedFiles();
    // Append each file to the form data
    for (var i = 0; i < files.length; i++) {
      formData.append('files[]', files[i]);
    }

    // Perform AJAX call
    $.ajax({
      url: "/api/berita/create",
      method: 'POST',
      type: "POST",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      data: formData,
      contentType: false, // Required for file uploads
      processData: false, // Required for file uploads
      success: function(response) {
        // Handle success response
        $('#addBeritaModal').modal('hide');
        table_berita.ajax.reload();
      },
      error: function(xhr, status, error) {
        if (xhr.status === 401) {
          window.location.href = '/logout';
        } else if (xhr.status === 403) {
          var errors = JSON.parse(xhr.responseText).data;
          $.each(errors, function(field, message) {
            var inputField = $(`#formAddBerita [name="${field}"]`);
            var invalidFeedback = inputField.next('.invalid-feedback');

            if (invalidFeedback.length === 0) {
              invalidFeedback = $('<div>').addClass('invalid-feedback');
              inputField.after(invalidFeedback);
            }

            inputField.addClass('is-invalid');
            invalidFeedback.text(message);

            // Remove valid feedback if it exists
            var validFeedback = inputField.next('.valid-feedback');
            if (validFeedback.length !== 0) {
              validFeedback.remove();
            }
          });
        } else {
          // Handle error response
          console.error(xhr.responseText);
        }
      }
    });
  });

  $('#formEditBerita').submit(function(e) {
    // Prevent form submission
    e.preventDefault();

    // Clear previous error messages and validation states
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').remove();
    $('.is-valid').removeClass('is-valid');
    $('.valid-feedback').remove();

    var formData = new FormData(this);

    // Get CKEditor value
    var editorData = CKEditor_edit.getData();
    // Add the CKEditor value to the form data
    formData.append('description', editorData);

    // Get the files from Dropzone
    var files = myDropzone.files;
    // Append each file to the form data
    for (var i = 0; i < files.length; i++) {
      formData.append('files[]', files[i]);
    }

    // Select and add values of disabled form elements
    $(this).find(':disabled[name]').each(function() {
      const element = $(this);
      const elementName = element.attr('name');
      const elementValue = element.val();
      formData.append(elementName, elementValue);
    });

    // Perform AJAX call
    $.ajax({
      url: "/api/berita/update",
      method: 'POST',
      type: "POST",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      data: formData,
      contentType: false, // Required for file uploads
      processData: false, // Required for file uploads
      success: function(response) {
        // Handle success response
        $('#editBeritaModal').modal('hide');
        table_berita.ajax.reload();
      },
      error: function(xhr, status, error) {
        if (xhr.status === 401) {
          window.location.href = '/logout';
        } else if (xhr.status === 403) {
          var errors = JSON.parse(xhr.responseText).data;
          $.each(errors, function(field, message) {
            var inputField = $(`#formEditBerita [name="${field}"]`);
            var invalidFeedback = inputField.next('.invalid-feedback');

            if (invalidFeedback.length === 0) {
              invalidFeedback = $('<div>').addClass('invalid-feedback');
              inputField.after(invalidFeedback);
            }

            inputField.addClass('is-invalid');
            invalidFeedback.text(message);

            // Remove valid feedback if it exists
            var validFeedback = inputField.next('.valid-feedback');
            if (validFeedback.length !== 0) {
              validFeedback.remove();
            }
          });
        } else {
          // Handle error response
          console.error(xhr.responseText);
        }
      }
    });
  });

  $('#formDeleteBerita').submit(function(e) {
    // Prevent form submission
    e.preventDefault();

    // Clear previous error messages and validation states
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').remove();
    $('.is-valid').removeClass('is-valid');
    $('.valid-feedback').remove();

    // Perform AJAX call
    $.ajax({
      url: "/api/berita/destroy",
      method: 'POST',
      type: "POST",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      data: $(this).serialize(),
      success: function(response) {
        // Handle success response
        $('#deleteBeritaModal').modal('hide');
        table_berita.ajax.reload();
      },
      error: function(xhr, status, error) {
        if (xhr.status === 401) {
          window.location.href = '/logout';
        } else {
          // Handle error response
          console.error(xhr.responseText);
        }
      }
    });
  });

  $(function() {
    table_berita = $('#table_berita').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": false,
      "scrollX": true,
      "ajax": {
        url: "/api/beritas/",
        beforeSend: function(xhr) {
          xhr.setRequestHeader('Authorization', 'Bearer <?= $this->session->token ?>');
        },
        headers: {
          'Authorization': 'Bearer <?= $this->session->token ?>'
        },
        dataSrc: function(json) {
          return json.data;
        },
        statusCode: {
          401: function() {
            window.location.href = '/logout';
          }
        }
      },
      "columns": [{
          title: "No.",
          data: null,
          className: 'dt-center',
          render: function(data, type, row, meta) {
            return meta.row + 1;
          }
        },
        {
          title: "Title",
          data: "title",
          className: 'dt-head-center dt-body-left',
        },
        {
          title: "Slug",
          data: "slug",
          className: 'dt-center',
        },
        {
          title: "Kategori",
          data: "category_name",
          className: 'dt-center',
        },
        {
          title: "Deskripsi",
          data: null,
          className: 'dt-head-center dt-body-left',
          render: function(data, type, row, meta) {
            return '<div class="line-clamp">' + row.description + '</div>';
          }
        },
        {
          title: "Status",
          data: "status",
          className: 'dt-center',
          render: function(data, type, row, meta) {
            return `
              <span class="badge badge-pill badge-${row.status === 'active' ? 'success' : 'danger'} py-2 px-3 text-capitalize">${row.status === 'active' ? 'aktif' : 'tidak aktif'}</span>
            `;
          }
        },
        {
          title: "Editor",
          data: null,
          className: 'dt-center',
          render: function(data, type, row, meta) {
            return `
              <div class="text-center">
                <h6>
                  <span class="badge badge-pill badge-warning py-1 px-2 text-capitalize">
                    ${row.user_group_name}
                  </span>
                </h6>
                <p class="mb-0">${row.fullname}</p>
              </div>
            `;
          }
        },
        {
          title: "",
          data: null,
          className: 'dt-center',
          orderable: false,
          render: function(data, type, row, meta) {
            return `
            <div class="d-flex flex-nowrap align-items-center justify-content-end" style="gap: 1rem;">
              <button id="btn-modal-edit-berita-${row.id}" data-berita=${row.id} type="button" class="btn btn-sm btn-info d-flex flex-nowrap align-items-center justify-content-center">
                <i class="fas fa-edit mr-1"></i>
                Edit
              </button>
              <button id="btn-modal-delete-berita-${row.id}" data-berita=${row.id} type="button" class="btn btn-sm btn-danger d-flex flex-nowrap align-items-center justify-content-center">
                <i class="fas fa-trash-alt mr-1"></i>
                Delete
              </button>
            </div>`;
          }
        },
      ]
    });
  });
</script>