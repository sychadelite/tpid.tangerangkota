<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Daftar Komoditas</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Komoditas</li>
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
                  <h3 class="card-title">Tabel data komoditas</h3>
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
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addKomoditasModal">
                    <i class="fas fa-plus mr-1"></i>
                    Tambah Data
                  </button>
                </div>
              </div>
            </div>

            <div class="card-body">
              <table id="table_komoditas" class="table table-hover table-striped">
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
  <div class="modal fade" id="addKomoditasModal" tabindex="-1" aria-labelledby="addKomoditasModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addKomoditasModalLabel">Tambah Data Komoditas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formAddKomoditas" class="needs-validation" novalidate>
            <input type="hidden" name="<?= $content['csrf']['name']; ?>" value="<?= $content['csrf']['hash']; ?>" />
            <div class="form-row">
              <div class="col-md-8 mb-3">
                <label for="name">Nama Komoditas</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name'); ?>" placeholder="Nama Komoditas .." required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="unit">Satuan</label>
                <input type="text" class="form-control" id="unit" name="unit" value="<?= set_value('unit'); ?>" placeholder="Kg, Ons, Meter, .." required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4 mb-3">
                <label for="type_id">Jenis</label>
                <select class="custom-select" id="type_id" name="type_id" required>
                  <option value="" selected disabled>-- Pilih --</option>
                  <?php foreach ($content['data_jenis_komoditas'] as $key => $row) { ?>
                    <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
                  <?php } ?>
                </select>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-8 mb-3">
                <label for="cluster_id">Kelompok</label>
                <select class="custom-select" id="cluster_id" name="cluster_id" required>
                  <option value="" selected disabled>-- Pilih --</option>
                  <?php foreach ($content['data_kelompok_komoditas'] as $key => $row) { ?>
                    <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
                  <?php } ?>
                </select>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" form="formAddKomoditas">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editKomoditasModal" tabindex="-1" aria-labelledby="editKomoditasModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editKomoditasModalLabel">Tambah Data Komoditas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formEditKomoditas" class="needs-validation" novalidate>
            <input type="hidden" name="<?= $content['csrf']['name']; ?>" value="<?= $content['csrf']['hash']; ?>" />
            <input type="hidden" id="id" name="id" value="" />
            <div class="form-row">
              <div class="col-md-8 mb-3">
                <label for="name">Nama Komoditas</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name'); ?>" placeholder="Nama Komoditas .." required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="unit">Satuan</label>
                <input type="text" class="form-control" id="unit" name="unit" value="<?= set_value('unit'); ?>" placeholder="Kg, Ons, Meter, .." required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4 mb-3">
                <label for="type_id">Jenis</label>
                <select class="custom-select" id="type_id" name="type_id" required>
                  <option value="" selected disabled>-- Pilih --</option>
                  <?php foreach ($content['data_jenis_komoditas'] as $key => $row) { ?>
                    <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
                  <?php } ?>
                </select>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-8 mb-3">
                <label for="cluster_id">Kelompok</label>
                <select class="custom-select" id="cluster_id" name="cluster_id" required>
                  <option value="" selected disabled>-- Pilih --</option>
                  <?php foreach ($content['data_kelompok_komoditas'] as $key => $row) { ?>
                    <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
                  <?php } ?>
                </select>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" form="formEditKomoditas">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="deleteKomoditasModal" tabindex="-1" aria-labelledby="deleteKomoditasModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteKomoditasModalLabel">Hapus Data Komoditas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formDeleteKomoditas" class="needs-validation" novalidate>
            <input type="hidden" id="<?= $content['csrf']['name']; ?>" name="<?= $content['csrf']['name']; ?>" value="<?= $content['csrf']['hash']; ?>" />
            <input type="hidden" id="id" name="id" value="" />
          </form>
          Apakah anda yakin ingin menghapus data komoditas ini ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger" form="formDeleteKomoditas">Hapus</button>
        </div>
      </div>
    </div>
  </div>

</div>

<script>
  var table_komoditas;

  $(window).on('resize', function() {
    table_komoditas.columns.adjust(); // Adjust the column widths on window resize
  });

  $(document).on('click', '[id^="btn-modal-edit-komoditas"]', function() {
    let row_id = $(this).data('komoditas');
    // Perform AJAX call
    $.ajax({
      url: "/api/komoditas/" + row_id,
      method: 'GET',
      type: "GET",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      success: function(response) {
        // Handle success response
        $(`#editKomoditasModal #id`).val(response.data.id);
        $(`#editKomoditasModal #name`).val(response.data.name);
        $(`#editKomoditasModal #type_id`).val(response.data.type_id);
        $(`#editKomoditasModal #cluster_id`).val(response.data.cluster_id);
        $(`#editKomoditasModal #unit`).val(response.data.unit);
        $('#editKomoditasModal').modal('show');
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

  $(document).on('click', '[id^="btn-modal-delete-komoditas"]', function() {
    let row_id = $(this).data('komoditas');

    $(`#deleteKomoditasModal #id`).val(row_id);

    $('#deleteKomoditasModal').modal('show');
  });

  $('#formAddKomoditas').submit(function(e) {
    // Prevent form submission
    e.preventDefault();

    // Clear previous error messages and validation states
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').remove();
    $('.is-valid').removeClass('is-valid');
    $('.valid-feedback').remove();

    var formData = $(this).serializeArray();

    // Perform AJAX call
    $.ajax({
      url: "/api/komoditas/create",
      method: 'POST',
      type: "POST",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      data: formData,
      success: function(response) {
        // Handle success response
        $('#addKomoditasModal').modal('hide');
        table_komoditas.ajax.reload();
      },
      error: function(xhr, status, error) {
        if (xhr.status === 401) {
          window.location.href = '/logout';
        } else if (xhr.status === 403) {
          var errors = JSON.parse(xhr.responseText).data;
          $.each(errors, function(field, message) {
            var inputField = $(`#formAddKomoditas [name="${field}"]`);
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

  $('#formEditKomoditas').submit(function(e) {
    // Prevent form submission
    e.preventDefault();

    // Clear previous error messages and validation states
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').remove();
    $('.is-valid').removeClass('is-valid');
    $('.valid-feedback').remove();

    var formData = $(this).serializeArray();

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
      url: "/api/komoditas/update",
      method: 'POST',
      type: "POST",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      data: formData,
      success: function(response) {
        // Handle success response
        $('#editKomoditasModal').modal('hide');
        table_komoditas.ajax.reload();
      },
      error: function(xhr, status, error) {
        if (xhr.status === 401) {
          window.location.href = '/logout';
        } else if (xhr.status === 403) {
          var errors = JSON.parse(xhr.responseText).data;
          $.each(errors, function(field, message) {
            var inputField = $(`#formEditKomoditas [name="${field}"]`);
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

  $('#formDeleteKomoditas').submit(function(e) {
    // Prevent form submission
    e.preventDefault();

    // Clear previous error messages and validation states
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').remove();
    $('.is-valid').removeClass('is-valid');
    $('.valid-feedback').remove();

    // Perform AJAX call
    $.ajax({
      url: "/api/komoditas/destroy",
      method: 'POST',
      type: "POST",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      data: $(this).serialize(),
      success: function(response) {
        // Handle success response
        $('#deleteKomoditasModal').modal('hide');
        table_komoditas.ajax.reload();
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
    table_komoditas = $('#table_komoditas').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": false,
      "scrollX": true,
      "ajax": {
        url: "/api/komoditases",
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
          title: "Nama Komoditas",
          data: "name",
          className: 'dt-head-center dt-body-left',
        },
        {
          title: "Satuan",
          data: "unit",
          className: 'dt-center',
        },
        {
          title: "Jenis",
          data: "type_name",
          className: 'dt-center',
        },
        {
          title: "Kelompok",
          data: "cluster_name",
          className: 'dt-center',
        },
        {
          title: "",
          data: null,
          className: 'dt-center',
          orderable: false,
          render: function(data, type, row, meta) {
            return `
            <div class="d-flex flex-nowrap align-items-center justify-content-end" style="gap: 1rem;">
              <button id="btn-modal-edit-komoditas-${row.id}" data-komoditas=${row.id} type="button" class="btn btn-sm btn-info d-flex flex-nowrap align-items-center justify-content-center">
                <i class="fas fa-edit mr-1"></i>
                Edit
              </button>
              <button id="btn-modal-delete-komoditas-${row.id}" data-komoditas=${row.id} type="button" class="btn btn-sm btn-danger d-flex flex-nowrap align-items-center justify-content-center">
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