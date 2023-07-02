<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Pengaturan Hak Akses</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Hak Akses</li>
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
                <h3 class="card-title">Tabel data hak akses</h3>
                <div>
                  <button id="btn-modal-add-rolepermission" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addRolePermissionModal">
                    <i class="fas fa-plus mr-1"></i>
                    Tambah Data
                  </button>
                </div>
              </div>
            </div>

            <div class="card-body">
              <table id="table_rolepermissions" class="table table-bordered table-hover">
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
  <div class="modal fade" id="addRolePermissionModal" tabindex="-1" aria-labelledby="addRolePermissionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addRolePermissionModalLabel">Tambah Data Hak Akses</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formAddRolePermission" class="needs-validation" novalidate>
            <input type="hidden" name="<?= $content['csrf']['name']; ?>" value="<?= $content['csrf']['hash']; ?>" />
            <div class="form-row">
              <div class="col-md-4 mb-3 px-4">
                <label for="name">Nama Role</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name'); ?>" placeholder="admin, operator, dinas ..." required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-8 mb-3 px-4">
                <label for="name">Hak Akses</label>
                <div id="listMenuAdd"></div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" form="formAddRolePermission">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editRolePermissionModal" tabindex="-1" aria-labelledby="editRolePermissionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editRolePermissionModalLabel">Edit Data Hak Akses</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formEditRolePermission" class="needs-validation" novalidate>
            <input type="hidden" id="<?= $content['csrf']['name']; ?>" name="<?= $content['csrf']['name']; ?>" value="<?= $content['csrf']['hash']; ?>" />
            <input type="hidden" id="id" name="id" value="" />
            <div class="form-row">
              <div class="col-md-4 mb-3 px-4">
                <label for="name">Nama Hak Akses</label>
                <input type="text" class="form-control" id="name" name="name" value="" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-8 mb-3 px-4">
                <label for="name">Hak Akses</label>
                <div id="listMenuEdit"></div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" form="formEditRolePermission">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="deleteRolePermissionModal" tabindex="-1" aria-labelledby="deleteRolePermissionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteRolePermissionModalLabel">Hapus Data Hak Akses</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formDeleteRolePermission" class="needs-validation" novalidate>
            <input type="hidden" id="<?= $content['csrf']['name']; ?>" name="<?= $content['csrf']['name']; ?>" value="<?= $content['csrf']['hash']; ?>" />
            <input type="hidden" id="id" name="id" value="" />
          </form>
          Apakah anda yakin ingin menghapus data hak akses ini ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger" form="formDeleteRolePermission">Hapus</button>
        </div>
      </div>
    </div>
  </div>

</div>

<script>
  var table_rolepermissions;

  $(window).on('resize', function() {
    table_rolepermissions.columns.adjust(); // Adjust the column widths on window resize
  });

  $(document).on('click', '[id^="btn-modal-add-rolepermission"]', function() {
    $.ajax({
      url: "/api/menus/group/" + <?= $this->session->user_group_id ?>,
      method: 'GET',
      type: "GET",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      success: function(response) {
        const menus = response.data.menu_by_user_group;

        const container = document.getElementById('listMenuAdd');

        $(container).children().remove();

        menus.forEach(menu => {
          const divOuter = document.createElement("div");
          divOuter.className = "input-group mb-3";
          divOuter.style.marginLeft = parseInt(menu.parent_id) > 0 ? "5%" : null;
          divOuter.style.maxWidth = parseInt(menu.parent_id) > 0 ? "95%" : null;

          const divInner = document.createElement("div");
          divInner.className = "input-group-prepend";

          const divInputGroupText = document.createElement("div");
          divInputGroupText.className = "input-group-text";

          const checkbox = document.createElement("input");
          checkbox.id = "checkbox-menu-" + menu.id;
          checkbox.type = "checkbox";

          checkbox.name = "menu_" + menu.id;
          checkbox.setAttribute("aria-label", "Checkbox for following text input");

          divInputGroupText.appendChild(checkbox);

          divInner.appendChild(divInputGroupText);

          const inputText = document.createElement("input");
          inputText.type = "text";
          inputText.className = "form-control";
          inputText.setAttribute("aria-label", "Text input with checkbox");
          inputText.value = menu.name;
          inputText.disabled = true;

          divOuter.appendChild(divInner);

          divOuter.appendChild(inputText);

          container.appendChild(divOuter);
        });
      },
      error: function(xhr, status, error) {
        if (xhr.status === 401) {
          window.location.href = '/logout';
        } else {
          console.error(xhr.responseText);
        }
      }
    });
  });

  $(document).on('click', '[id^="btn-modal-edit-rolepermission"]', function() {
    let row_id = $(this).data('rolepermission');
    // Perform AJAX call
    $.ajax({
      url: "/api/rolepermission/" + row_id,
      method: 'GET',
      type: "GET",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      success: function(response) {
        // Handle success response
        $(`#editRolePermissionModal #id`).val(response.data.id);
        $(`#editRolePermissionModal #name`).val(response.data.name);

        $('#editRolePermissionModal').modal('show');
        const menus = response.menus;
        const available_menus = response.available_menus;

        const container = document.getElementById('listMenuEdit');

        $(container).empty();

        menus.forEach(menu => {
          const divOuter = document.createElement("div");
          divOuter.className = "input-group mb-3";
          divOuter.style.marginLeft = parseInt(menu.parent_id) > 0 ? "5%" : null;
          divOuter.style.maxWidth = parseInt(menu.parent_id) > 0 ? "95%" : null;

          const divInner = document.createElement("div");
          divInner.className = "input-group-prepend";

          const divInputGroupText = document.createElement("div");
          divInputGroupText.className = "input-group-text";

          isMenuAlreadySet = available_menus.some(function(val) {
            return val.menu_id == menu.id;
          });

          const checkbox = document.createElement("input");
          checkbox.id = "checkbox-menu-" + menu.id;
          checkbox.type = "checkbox";
          checkbox.name = "menu_" + menu.id;
          checkbox.checked = isMenuAlreadySet;
          checkbox.setAttribute("aria-label", "Checkbox for following text input");

          divInputGroupText.appendChild(checkbox);

          divInner.appendChild(divInputGroupText);

          const inputText = document.createElement("input");
          inputText.type = "text";
          inputText.className = "form-control";
          inputText.setAttribute("aria-label", "Text input with checkbox");
          inputText.value = menu.name;
          inputText.disabled = true;

          divOuter.appendChild(divInner);

          divOuter.appendChild(inputText);

          container.appendChild(divOuter);

        });
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

  $(document).on('click', '[id^="btn-modal-delete-rolepermission"]', function() {
    let row_id = $(this).data('user');

    $(`#deleteRolePermissionModal #id`).val(row_id);

    $('#deleteRolePermissionModal').modal('show');
  });

  $('#formAddRolePermission').submit(function(e) {
    // Prevent form submission
    e.preventDefault();

    // Clear previous error messages and validation states
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').remove();
    $('.is-valid').removeClass('is-valid');
    $('.valid-feedback').remove();

    // Perform AJAX call
    $.ajax({
      url: "/api/rolepermission/create",
      method: 'POST',
      type: "POST",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      data: $(this).serialize(),
      success: function(response) {
        // Handle success response
        $('#addRolePermissionModal').modal('hide');
        table_rolepermissions.ajax.reload();
      },
      error: function(xhr, status, error) {
        if (xhr.status === 401) {
          window.location.href = '/logout';
        } else if (xhr.status === 403) {
          var errors = JSON.parse(xhr.responseText).data;
          $.each(errors, function(field, message) {
            var inputField = $(`#formAddRolePermission [name="${field}"]`);
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

  $('#formEditRolePermission').submit(function(e) {
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
      url: "/api/rolepermission/update",
      method: 'POST',
      type: "POST",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      data: formData,
      success: function(response) {
        // Handle success response
        $('#editRolePermissionModal').modal('hide');
        table_rolepermissions.ajax.reload();
      },
      error: function(xhr, status, error) {
        if (xhr.status === 401) {
          window.location.href = '/logout';
        } else if (xhr.status === 403) {
          var errors = JSON.parse(xhr.responseText).data;
          $.each(errors, function(field, message) {
            var inputField = $(`#formEditRolePermission [name="${field}"]`);
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

  $('#formDeleteRolePermission').submit(function(e) {
    // Prevent form submission
    e.preventDefault();

    // Clear previous error messages and validation states
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').remove();
    $('.is-valid').removeClass('is-valid');
    $('.valid-feedback').remove();

    // Perform AJAX call
    $.ajax({
      url: "/api/rolepermission/destroy",
      method: 'POST',
      type: "POST",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      data: $(this).serialize(),
      success: function(response) {
        // Handle success response
        $('#deleteRolePermissionModal').modal('hide');
        table_rolepermissions.ajax.reload();
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
    table_rolepermissions = $('#table_rolepermissions').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": false,
      "scrollX": true,
      "ajax": {
        url: "/api/rolepermissions",
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
          title: "Nama Role",
          data: "name",
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
              <button id="btn-modal-edit-rolepermission-${row.id}" data-rolepermission=${row.id} type="button" class="btn btn-sm btn-info d-flex flex-nowrap align-items-center justify-content-center">
                <i class="fas fa-edit mr-1"></i>
                Edit
              </button>
              <button id="btn-modal-delete-rolepermission-${row.id}" data-rolepermission=${row.id} type="button" class="btn btn-sm btn-danger d-flex flex-nowrap align-items-center justify-content-center">
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