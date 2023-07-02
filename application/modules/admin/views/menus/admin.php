<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Pengaturan Semua Menu</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Semua Menu</li>
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
                <h3 class="card-title">Tabel data semua menu</h3>
                <div>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMenuModal">
                    <i class="fas fa-plus mr-1"></i>
                    Tambah Data
                  </button>
                </div>
              </div>
            </div>

            <div class="card-body">
              <table id="table_menus" class="table table-bordered table-hover">
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
  <div class="modal fade" id="addMenuModal" tabindex="-1" aria-labelledby="addMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addMenuModalLabel">Tambah Data Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formAddMenu" class="needs-validation" novalidate>
            <input type="hidden" name="<?= $content['csrf']['name']; ?>" value="<?= $content['csrf']['hash']; ?>" />
            <input type="hidden" id="id" name="id" value="" />
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name'); ?>" placeholder="Nama Menu .." required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="path">Path</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend" style="max-width: 40%; overflow: auto;">
                    <span class="input-group-text" id="basic-addon3"><?= base_url(); ?>admin/</span>
                  </div>
                  <input type="text" class="form-control" id="path" name="path" value="<?= set_value('path'); ?>" placeholder="Path .." required>
                </div>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="icon">Icon</label>
                <input type="text" class="form-control" id="icon" name="icon" value="<?= set_value('icon'); ?>" placeholder="Icon ..">
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="position">Index</label>
                <input type="number" class="form-control" id="position" name="position" value="<?= set_value('position'); ?>" placeholder="Posisi Urutan .." required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="status">Status</label>
                <div>
                  <input type="checkbox" id="status" name="status" data-bootstrap-switch data-off-color="danger" data-on-color="success">
                </div>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="target_blank">Target Blank</label>
                <div>
                  <input type="checkbox" id="target_blank" name="target_blank" data-bootstrap-switch data-off-color="danger" data-on-color="success">
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
          <button type="submit" class="btn btn-primary" form="formAddMenu">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editMenuModal" tabindex="-1" aria-labelledby="editMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editMenuModalLabel">Edit Data Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formEditMenu" class="needs-validation" novalidate>
            <input type="hidden" id="<?= $content['csrf']['name']; ?>" name="<?= $content['csrf']['name']; ?>" value="<?= $content['csrf']['hash']; ?>" />
            <input type="hidden" id="id" name="id" value="" />
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name'); ?>" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="path">Path</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend" style="max-width: 40%; overflow: auto;">
                    <span class="input-group-text" id="basic-addon3"><?= base_url(); ?>admin/</span>
                  </div>
                  <input type="text" class="form-control" id="path" name="path" value="<?= set_value('path'); ?>" required>
                </div>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="icon">Icon</label>
                <input type="text" class="form-control" id="icon" name="icon" value="<?= set_value('icon'); ?>" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="position">Index</label>
                <input type="number" class="form-control" id="position" name="position" value="<?= set_value('position'); ?>" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="status">Status</label>
                <div>
                  <input type="checkbox" id="status" name="status" data-bootstrap-switch data-off-color="danger" data-on-color="success">
                </div>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="target_blank">Target Blank</label>
                <div>
                  <input type="checkbox" id="target_blank" name="target_blank" data-bootstrap-switch data-off-color="danger" data-on-color="success">
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
          <button type="submit" class="btn btn-primary" form="formEditMenu">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="deleteMenuModal" tabindex="-1" aria-labelledby="deleteMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteMenuModalLabel">Hapus Data Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formDeleteMenu" class="needs-validation" novalidate>
            <input type="hidden" id="<?= $content['csrf']['name']; ?>" name="<?= $content['csrf']['name']; ?>" value="<?= $content['csrf']['hash']; ?>" />
            <input type="hidden" id="id" name="id" value="" />
          </form>
          Apakah anda yakin ingin menghapus data menu ini ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger" form="formDeleteMenu">Hapus</button>
        </div>
      </div>
    </div>
  </div>

</div>

<script>
  var table_menus, table_menus_row_num = 1;

  $(window).on('resize', function() {
    table_menus.columns.adjust(); // Adjust the column widths on window resize
  });

  $(document).on('click', '[id^="btn-modal-add-menu"]', function() {
    let row_id = $(this).data('menu');

    $(`#addMenuModal #id`).val(row_id);
  });

  $(document).on('click', '[id^="btn-modal-edit-menu"]', function() {
    let row_id = $(this).data('menu');
    // Perform AJAX call
    $.ajax({
      url: "/api/menu/" + row_id,
      method: 'GET',
      type: "GET",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      success: function(response) {
        // Handle success response
        $(`#editMenuModal #id`).val(response.data.id);
        $(`#editMenuModal #name`).val(response.data.name);
        $(`#editMenuModal #path`).val(response.data.url);
        $(`#editMenuModal #icon`).val(response.data.icon);
        $(`#editMenuModal #position`).val(response.data.position);
        $(`#editMenuModal #status`).bootstrapSwitch('state', response.data.status === 'active', true);
        $(`#editMenuModal #target_blank`).bootstrapSwitch('state', response.data.target_blank == 1, true);
        $('#editMenuModal').modal('show');
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

  $(document).on('click', '[id^="btn-modal-delete-menu"]', function() {
    let row_id = $(this).data('menu');

    $(`#deleteMenuModal #id`).val(row_id);

    $('#deleteMenuModal').modal('show');
  });

  $('#formAddMenu').submit(function(e) {
    // Prevent form submission
    e.preventDefault();

    // Clear previous error messages and validation states
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').remove();
    $('.is-valid').removeClass('is-valid');
    $('.valid-feedback').remove();

    var formData = $(this).serialize();
    const additionPayload = {
      parent_id: $(this).find('#id').val()
    }

    Object.entries(additionPayload).forEach(entri => {
      formData += '&' + entri[0] + '=' + encodeURIComponent(entri[1]);
    });

    // Perform AJAX call
    $.ajax({
      url: "/api/menu/create",
      method: 'POST',
      type: "POST",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      data: formData,
      success: function(response) {
        // Handle success response
        $('#addMenuModal').modal('hide');
        window.location.reload();
      },
      error: function(xhr, status, error) {
        if (xhr.status === 401) {
          window.location.href = '/logout';
        } else if (xhr.status === 403) {
          var errors = JSON.parse(xhr.responseText).data;
          $.each(errors, function(field, message) {
            var inputField = $(`#formAddMenu [name="${field}"]`);
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

  $('#formEditMenu').submit(function(e) {
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
      url: "/api/menu/update",
      method: 'POST',
      type: "POST",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      data: formData,
      success: function(response) {
        // Handle success response
        $('#editMenuModal').modal('hide');
        window.location.reload();
      },
      error: function(xhr, status, error) {
        if (xhr.status === 401) {
          window.location.href = '/logout';
        } else if (xhr.status === 403) {
          var errors = JSON.parse(xhr.responseText).data;
          $.each(errors, function(field, message) {
            var inputField = $(`#formEditMenu [name="${field}"]`);
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

  $('#formDeleteMenu').submit(function(e) {
    // Prevent form submission
    e.preventDefault();

    // Clear previous error messages and validation states
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').remove();
    $('.is-valid').removeClass('is-valid');
    $('.valid-feedback').remove();

    // Perform AJAX call
    $.ajax({
      url: "/api/menu/destroy",
      method: 'POST',
      type: "POST",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      data: $(this).serialize(),
      success: function(response) {
        // Handle success response
        $('#deleteMenuModal').modal('hide');
        window.location.reload();
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
    table_menus = $('#table_menus').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": false,
      "scrollX": true,
      "ajax": {
        url: "/api/menus/group/" + <?= $this->session->user_group_id ?>,
        beforeSend: function(xhr) {
          xhr.setRequestHeader('Authorization', 'Bearer <?= $this->session->token ?>');
        },
        headers: {
          'Authorization': 'Bearer <?= $this->session->token ?>'
        },
        dataSrc: function(json) {
          return json.data.menu_by_user_group;
        },
        statusCode: {
          401: function() {
            window.location.href = '/logout';
          }
        }
      },
      "columns": [{
          className: 'dt-center dt-custom-control',
          orderable: false,
          data: null,
          defaultContent: '',
        },
        {
          title: "No.",
          data: null,
          className: 'dt-center',
          render: function(data, type, row, meta) {
            if (data.parent_id == 0) {
              return table_menus_row_num++;
            } else {
              return null
            }
          }
        },
        {
          title: "Nama Menu",
          data: "name",
          className: 'dt-head-center dt-body-left',
        },
        {
          title: "Path",
          data: "url",
          className: 'dt-head-center dt-body-left',
        },
        {
          title: "Icon",
          data: "icon",
          className: 'dt-head-center dt-body-left',
        },
        {
          title: "",
          data: null,
          className: 'dt-center',
          orderable: false,
          render: function(data, type, row, meta) {
            const addBtn = `
              <button id="btn-modal-add-menu-${row.id}" data-menu=${row.id} type="button" class="btn btn-sm btn-outline-success d-flex flex-nowrap align-items-center justify-content-center" data-toggle="modal" data-target="#addMenuModal">
                <i class="fas fa-plus mr-1" style="pointer-events: none;"></i>
                Tambah
              </button>
            `;

            return `
              <div class="d-flex flex-nowrap align-items-center justify-content-end" style="gap: 1rem;">
                ${row.url ? addBtn : ''}
                <button id="btn-modal-edit-menu-${row.id}" data-menu=${row.id} type="button" class="btn btn-sm btn-info d-flex flex-nowrap align-items-center justify-content-center">
                  <i class="fas fa-edit mr-1" style="pointer-events: none;"></i>
                  Edit
                </button>
                <button id="btn-modal-delete-menu-${row.id}" data-menu=${row.id} type="button" class="btn btn-sm btn-danger d-flex flex-nowrap align-items-center justify-content-center">
                  <i class="fas fa-trash-alt mr-1" style="pointer-events: none;"></i>
                  Delete
                </button>
              </div>
            `;
          }
        },
      ],
      "createdRow": function(row, data, dataIndex) {
        var mainRow = $(row);

        // Add dt-custom-control element to the first column of the main row
        mainRow.attr('id', 'row-' + data.id);
        mainRow.attr('data-parent-id', data.parent_id);

        // Add a class to identify parent rows
        if (data.parent_id === "0") {
          mainRow.addClass('parent');
        } else {
          mainRow.addClass('child');
          mainRow.hide(); // Hide child rows initially

          // Find the parent row based on its ID
          var parentId = data.parent_id;
          var parentRow = $('#row-' + parentId);

          // Check if parent row exists
          if (parentRow.length > 0) {
            // Parent row exists, append the child row after the parent row
            parentRow.after(mainRow);
          } else {
            // Parent row doesn't exist, defer child row insertion
            parentRowDeferredInsertion(parentId, mainRow);
          }
        }
      }
    });

    // Add event listener for opening and closing details
    $('#table_menus tbody').on('click', 'tr.parent', function(e) {
      const mainRow = $(this);
      const childRows = mainRow.nextUntil('.parent');
      if (e.target.nodeName.toLowerCase() != 'button') {
        childRows.toggle(); // Show/hide child rows
        const dtControl = mainRow.find('td.dt-custom-control');
        if (childRows.is(':visible')) {
          dtControl.html('<i class="fas fa-minus-circle"></i>'); // Change icon to minus sign
        } else {
          dtControl.html('<i class="fas fa-plus-circle"></i>'); // Change icon to plus sign
        }
      }
    });

    // Call the processDeferredInsertions function after the DataTable is initialized
    $('#table_menus').on('init.dt', function() {
      processDeferredInsertions();

      const table = $(this)
      const rows = table.find('tbody tr');

      $.each(rows, function(index, el) {
        const currentRow = $(el);
        const nextRow = rows[index + 1] ? $(rows[index + 1]) : null;

        if (currentRow.hasClass('parent') && nextRow?.hasClass('child')) {
          const childRows = currentRow.nextUntil('.parent');
          const dtControl = currentRow.find('td.dt-custom-control');
          if (childRows.is(':visible')) {
            dtControl.html('<i class="fas fa-minus-circle"></i>');
          } else {
            dtControl.html('<i class="fas fa-plus-circle"></i>');
          }
        }

        if (currentRow.hasClass('parent') && (!nextRow || !nextRow.hasClass('child'))) {
          currentRow.find('td.dt-custom-control').removeClass('dt-custom-control');
        }

        if (currentRow.hasClass('child')) {
          currentRow.find('td.dt-custom-control').removeClass('dt-custom-control');
          currentRow.find('[data-target="#addMenuModal"]').remove();
        }
      });
    });

    // Deferred insertion of child rows
    var deferredInsertions = {};

    function parentRowDeferredInsertion(parentId, childRow) {
      if (deferredInsertions.hasOwnProperty(parentId)) {
        // If deferred insertion for parent row already exists, add child row to the queue
        deferredInsertions[parentId].push(childRow);
      } else {
        // Create a new queue for deferred insertion
        deferredInsertions[parentId] = [childRow];
      }
    }

    function processDeferredInsertions() {
      Object.keys(deferredInsertions).forEach(function(parentId) {
        var parentRow = $('#row-' + parentId);
        var newBorn = $(`[data-parent-id="${parentId}"]`);
        var childRows = deferredInsertions[parentId];

        if (parentRow.length > 0) {
          // Parent row exists, insert child rows after the parent row
          childRows.forEach(function(childRow) {
            parentRow.after(childRow);
          });

          // Remove the processed deferred insertion
          delete deferredInsertions[parentId];
        }
      });
    }
  });
</script>