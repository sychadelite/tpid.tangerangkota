<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Pengaturan Pengguna</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pengguna</li>
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
                <h3 class="card-title">Tabel data pengguna</h3>
                <div>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
                    <i class="fas fa-plus mr-1"></i>
                    Tambah Data
                  </button>
                </div>
              </div>
            </div>

            <div class="card-body">
              <table id="table_users" class="table table-bordered table-hover">
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
  <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addUserModalLabel">Tambah Data Pengguna</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formAddUser" class="needs-validation" novalidate>
            <input type="hidden" name="<?= $content['csrf']['name']; ?>" value="<?= $content['csrf']['hash']; ?>" />
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="cek_nip">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="cek_nip">CEK NIP</button>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username'); ?>" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="fullname">Nama Lengkap</label>
                <input type="text" class="form-control" id="fullname" name="fullname" value="<?= set_value('fullname'); ?>" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="email">E-Mail</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?= set_value('password'); ?>" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="peran">Peran Pengguna</label>
                <select class="custom-select" id="peran" name="peran" required>
                  <?php for ($i = 0; $i < count($content["data_users_group"]); $i++) { ?>
                    <option <?= $i == 0 ? 'selected' : '' ?> value="<?= $content["data_users_group"][$i]->id; ?>"><?= $content["data_users_group"][$i]->name; ?></option>
                  <?php } ?>
                </select>
                <div class="invalid-feedback">
                  Mohon pilih peran yang valid
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="status">Status</label>
                <select class="custom-select" id="status" name="status" required>
                  <option selected value="active">Aktif</option>
                  <option value="inactive">Tidak Aktif</option>
                </select>
                <div class="invalid-feedback">
                  Mohon pilih peran yang valid
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="agreement" required>
                <label class="form-check-label" for="agreement">
                  Agree to terms and conditions
                </label>
                <div class="invalid-feedback">
                  You must agree before submitting.
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" form="formAddUser">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editUserModalLabel">Edit Data Pengguna</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formEditUser" class="needs-validation" novalidate>
            <input type="hidden" id="<?= $content['csrf']['name']; ?>" name="<?= $content['csrf']['name']; ?>" value="<?= $content['csrf']['hash']; ?>" />
            <input type="hidden" id="id" name="id" value="" />
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="cek_nip">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="cek_nip">CEK NIP</button>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="" disabled required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="fullname">Nama Lengkap</label>
                <input type="text" class="form-control" id="fullname" name="fullname" value="" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="email">E-Mail</label>
                <input type="email" class="form-control" id="email" name="email" value="" disabled required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="" placeholder="Tidak perlu diisi jika tidak ingin mengubah password lama">
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="peran">Peran Pengguna</label>
                <select class="custom-select" id="peran" name="peran" required>
                  <?php for ($i = 0; $i < count($content["data_users_group"]); $i++) { ?>
                    <option <?= $i == 0 ? 'selected' : '' ?> value="<?= $content["data_users_group"][$i]->id; ?>"><?= $content["data_users_group"][$i]->name; ?></option>
                  <?php } ?>
                </select>
                <div class="invalid-feedback">
                  Mohon pilih peran yang valid
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="status">Status</label>
                <select class="custom-select" id="status" name="status" required>
                  <option selected value="active">Aktif</option>
                  <option value="inactive">Tidak Aktif</option>
                </select>
                <div class="invalid-feedback">
                  Mohon pilih peran yang valid
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="agreement" required>
                <label class="form-check-label" for="agreement">
                  Agree to terms and conditions
                </label>
                <div class="invalid-feedback">
                  You must agree before submitting.
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" form="formEditUser">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteUserModalLabel">Hapus Data Pengguna</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formDeleteUser" class="needs-validation" novalidate>
            <input type="hidden" id="<?= $content['csrf']['name']; ?>" name="<?= $content['csrf']['name']; ?>" value="<?= $content['csrf']['hash']; ?>" />
            <input type="hidden" id="id" name="id" value="" />
          </form>
          Apakah anda yakin ingin menghapus data pengguna ini ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger" form="formDeleteUser">Hapus</button>
        </div>
      </div>
    </div>
  </div>

</div>

<script>
  var table_users;

  $(window).on('resize', function() {
    table_users.columns.adjust(); // Adjust the column widths on window resize
  });

  $(document).on('click', '[id^="btn-modal-edit-user"]', function() {
    let row_id = $(this).data('user');
    // Perform AJAX call
    $.ajax({
      url: "/api/user/" + row_id,
      method: 'GET',
      type: "GET",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      success: function(response) {
        // Handle success response
        $(`#editUserModal #id`).val(response.data.id);
        $(`#editUserModal #username`).val(response.data.username);
        $(`#editUserModal #fullname`).val(response.data.fullname);
        $(`#editUserModal #email`).val(response.data.email);
        $(`#editUserModal #password`).val('');
        $(`#editUserModal #peran`).val(response.data.user_group_id);
        $(`#editUserModal #status`).val(response.data.status);
        $('#editUserModal').modal('show');
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

  $(document).on('click', '[id^="btn-modal-delete-user"]', function() {
    let row_id = $(this).data('user');

    $(`#deleteUserModal #id`).val(row_id);

    $('#deleteUserModal').modal('show');
  });

  $('#formAddUser').submit(function(e) {
    // Prevent form submission
    e.preventDefault();

    // Clear previous error messages and validation states
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').remove();
    $('.is-valid').removeClass('is-valid');
    $('.valid-feedback').remove();

    // Perform AJAX call
    $.ajax({
      url: "/api/user/create",
      method: 'POST',
      type: "POST",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      data: $(this).serialize(),
      success: function(response) {
        // Handle success response
        $('#addUserModal').modal('hide');
        table_users.ajax.reload();
      },
      error: function(xhr, status, error) {
        if (xhr.status === 401) {
          window.location.href = '/logout';
        } else if (xhr.status === 403) {
          var errors = JSON.parse(xhr.responseText).data;
          $.each(errors, function(field, message) {
            var inputField = $(`#formAddUser [name="${field}"]`);
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

  $('#formEditUser').submit(function(e) {
    // Prevent form submission
    e.preventDefault();

    // Clear previous error messages and validation states
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').remove();
    $('.is-valid').removeClass('is-valid');
    $('.valid-feedback').remove();

    // Get the serialized form data
    var formData = $(this).serialize();

    // Select and add values of disabled form elements
    $(this).find(':disabled[name]').each(function() {
      var element = $(this);
      var elementName = element.attr('name');
      var elementValue = element.val();

      // Append name-value pair to formData
      formData += '&' + elementName + '=' + encodeURIComponent(elementValue);
    });

    // Perform AJAX call
    $.ajax({
      url: "/api/user/update",
      method: 'POST',
      type: "POST",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      data: formData,
      success: function(response) {
        // Handle success response
        $('#editUserModal').modal('hide');
        table_users.ajax.reload();
      },
      error: function(xhr, status, error) {
        if (xhr.status === 401) {
          window.location.href = '/logout';
        } else if (xhr.status === 403) {
          var errors = JSON.parse(xhr.responseText).data;
          $.each(errors, function(field, message) {
            var inputField = $(`#formEditUser [name="${field}"]`);
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

  $('#formDeleteUser').submit(function(e) {
    // Prevent form submission
    e.preventDefault();

    // Clear previous error messages and validation states
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').remove();
    $('.is-valid').removeClass('is-valid');
    $('.valid-feedback').remove();

    // Perform AJAX call
    $.ajax({
      url: "/api/user/destroy",
      method: 'POST',
      type: "POST",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      data: $(this).serialize(),
      success: function(response) {
        // Handle success response
        $('#deleteUserModal').modal('hide');
        table_users.ajax.reload();
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
    table_users = $('#table_users').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": false,
      "scrollX": true,
      "ajax": {
        url: "/api/users",
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
          title: "Nama Lengkap",
          data: "fullname",
          className: 'dt-head-center dt-body-left',
        },
        {
          title: "Username",
          data: "username",
          className: 'dt-center',
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
          title: "Peran",
          data: "user_group_name",
          className: 'dt-center',
          render: function(data, type, row, meta) {
            return `
              <span class="badge badge-pill badge-warning py-2 px-3 text-capitalize">${row.user_group_name}</span>
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
              <button id="btn-modal-edit-user-${row.id}" data-user=${row.id} type="button" class="btn btn-sm btn-info d-flex flex-nowrap align-items-center justify-content-center">
                <i class="fas fa-edit mr-1"></i>
                Edit
              </button>
              <button id="btn-modal-delete-user-${row.id}" data-user=${row.id} type="button" class="btn btn-sm btn-danger d-flex flex-nowrap align-items-center justify-content-center">
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