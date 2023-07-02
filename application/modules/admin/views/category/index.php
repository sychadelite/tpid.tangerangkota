<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Daftar Kategori</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Kategori</li>
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
                  <h3 class="card-title">Tabel data kategori</h3>
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
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addKategoriModal">
                    <i class="fas fa-plus mr-1"></i>
                    Tambah Data
                  </button>
                </div>
              </div>
            </div>

            <div class="card-body">
              <table id="table_kategori" class="table table-hover table-striped">
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
  <div class="modal fade" id="addKategoriModal" tabindex="-1" aria-labelledby="addKategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addKategoriModalLabel">Tambah Data Kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formAddKategori" class="needs-validation" novalidate>
            <input type="hidden" name="<?= $content['csrf']['name']; ?>" value="<?= $content['csrf']['hash']; ?>" />
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="name">Nama Kategori</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name'); ?>" placeholder="Nama Kategori .." required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="type">Tipe</label>
                <input type="text" class="form-control" id="type" name="type" value="<?= set_value('type'); ?>" placeholder="Profil, Berita, .." required>
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
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" form="formAddKategori">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editKategoriModal" tabindex="-1" aria-labelledby="editKategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editKategoriModalLabel">Tambah Data Kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formEditKategori" class="needs-validation" novalidate>
            <input type="hidden" name="<?= $content['csrf']['name']; ?>" value="<?= $content['csrf']['hash']; ?>" />
            <input type="hidden" id="id" name="id" value="" />
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="name">Nama Kategori</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name'); ?>" placeholder="Nama Kategori .." required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="type">Tipe</label>
                <input type="text" class="form-control" id="type" name="type" value="<?= set_value('type'); ?>" placeholder="Profil, Berita, .." required>
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
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" form="formEditKategori">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="deleteKategoriModal" tabindex="-1" aria-labelledby="deleteKategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteKategoriModalLabel">Hapus Data Kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formDeleteKategori" class="needs-validation" novalidate>
            <input type="hidden" id="<?= $content['csrf']['name']; ?>" name="<?= $content['csrf']['name']; ?>" value="<?= $content['csrf']['hash']; ?>" />
            <input type="hidden" id="id" name="id" value="" />
          </form>
          Apakah anda yakin ingin menghapus data kategori ini ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger" form="formDeleteKategori">Hapus</button>
        </div>
      </div>
    </div>
  </div>

</div>

<script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/super-build/ckeditor.js"></script>

<script>
  var CKEditor_add, CKEditor_edit;
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

  var table_kategori;

  $(window).on('resize', function() {
    table_kategori.columns.adjust(); // Adjust the column widths on window resize
  });

  $(document).on('click', '[id^="btn-modal-edit-kategori"]', function() {
    let row_id = $(this).data('kategori');
    // Perform AJAX call
    $.ajax({
      url: "/api/category/" + row_id,
      method: 'GET',
      type: "GET",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      success: function(response) {
        // Handle success response
        $(`#editKategoriModal #id`).val(response.data.id);
        $(`#editKategoriModal #name`).val(response.data.name);
        $(`#editKategoriModal #type`).val(response.data.type);
        CKEditor_edit.setData(response.data.description);
        $('#editKategoriModal').modal('show');
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

  $(document).on('click', '[id^="btn-modal-delete-kategori"]', function() {
    let row_id = $(this).data('kategori');

    $(`#deleteKategoriModal #id`).val(row_id);

    $('#deleteKategoriModal').modal('show');
  });

  $('#formAddKategori').submit(function(e) {
    // Prevent form submission
    e.preventDefault();

    // Clear previous error messages and validation states
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').remove();
    $('.is-valid').removeClass('is-valid');
    $('.valid-feedback').remove();

    // Get CKEditor value
    var editorData = CKEditor_add.getData();

    // Add the CKEditor value to the form data
    var formData = $(this).serializeArray();
    formData.push({
      name: 'description',
      value: editorData
    });

    // Perform AJAX call
    $.ajax({
      url: "/api/category/create",
      method: 'POST',
      type: "POST",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      data: formData,
      success: function(response) {
        // Handle success response
        $('#addKategoriModal').modal('hide');
        table_kategori.ajax.reload();
      },
      error: function(xhr, status, error) {
        if (xhr.status === 401) {
          window.location.href = '/logout';
        } else if (xhr.status === 403) {
          var errors = JSON.parse(xhr.responseText).data;
          $.each(errors, function(field, message) {
            var inputField = $(`#formAddKategori [name="${field}"]`);
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

  $('#formEditKategori').submit(function(e) {
    // Prevent form submission
    e.preventDefault();

    // Clear previous error messages and validation states
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').remove();
    $('.is-valid').removeClass('is-valid');
    $('.valid-feedback').remove();

    // Get CKEditor value
    var editorData = CKEditor_edit.getData();

    // Add the CKEditor value to the form data
    var formData = $(this).serializeArray();
    formData.push({
      name: 'description',
      value: editorData
    });

    // Select and add values of disabled form elements
    $(this).find(':disabled[name]').each(function() {
      const element = $(this);
      const elementName = element.attr('name');
      const elementValue = element.val();
      formData.push({
        name: elementName,
        value: elementValue
      });
    });

    // Perform AJAX call
    $.ajax({
      url: "/api/category/update",
      method: 'POST',
      type: "POST",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      data: formData,
      success: function(response) {
        // Handle success response
        $('#editKategoriModal').modal('hide');
        table_kategori.ajax.reload();
      },
      error: function(xhr, status, error) {
        if (xhr.status === 401) {
          window.location.href = '/logout';
        } else if (xhr.status === 403) {
          var errors = JSON.parse(xhr.responseText).data;
          $.each(errors, function(field, message) {
            var inputField = $(`#formEditKategori [name="${field}"]`);
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

  $('#formDeleteKategori').submit(function(e) {
    // Prevent form submission
    e.preventDefault();

    // Clear previous error messages and validation states
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').remove();
    $('.is-valid').removeClass('is-valid');
    $('.valid-feedback').remove();

    // Perform AJAX call
    $.ajax({
      url: "/api/category/destroy",
      method: 'POST',
      type: "POST",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      data: $(this).serialize(),
      success: function(response) {
        // Handle success response
        $('#deleteKategoriModal').modal('hide');
        table_kategori.ajax.reload();
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
    table_kategori = $('#table_kategori').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": false,
      "scrollX": true,
      "ajax": {
        url: "/api/categories",
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
          title: "Nama Kategori",
          data: "name",
          className: 'dt-head-center dt-body-left',
        },
        {
          title: "Tipe",
          data: "type",
          className: 'dt-center',
        },
        {
          title: "Deskripsi",
          data: "description",
          className: 'dt-head-center dt-body-left',
        },
        {
          title: "",
          data: null,
          className: 'dt-center',
          orderable: false,
          render: function(data, type, row, meta) {
            return `
            <div class="d-flex flex-nowrap align-items-center justify-content-end" style="gap: 1rem;">
              <button id="btn-modal-edit-kategori-${row.id}" data-kategori=${row.id} type="button" class="btn btn-sm btn-info d-flex flex-nowrap align-items-center justify-content-center">
                <i class="fas fa-edit mr-1"></i>
                Edit
              </button>
              <button id="btn-modal-delete-kategori-${row.id}" data-kategori=${row.id} type="button" class="btn btn-sm btn-danger d-flex flex-nowrap align-items-center justify-content-center">
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