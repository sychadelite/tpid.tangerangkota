<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Rekapitulasi Komoditas</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Rekapitulasi</li>
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
                  <h3 class="card-title">Tabel data rekapitulasi</h3>
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
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addRekapitulasiModal">
                    <i class="fas fa-plus mr-1"></i>
                    Tambah Data
                  </button>
                </div>
              </div>
            </div>

            <div class="card-body">
              <table id="table_rekapitulasi" class="table table-hover table-striped">
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
  <div class="modal fade" id="addRekapitulasiModal" tabindex="-1" aria-labelledby="addRekapitulasiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addRekapitulasiModalLabel">Tambah Data Rekapitulasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formAddRekapitulasi" class="needs-validation" novalidate>
            <input type="hidden" name="<?= $content['csrf']['name']; ?>" value="<?= $content['csrf']['hash']; ?>" />
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="komoditas_id">Komoditas</label>
                <select class="custom-select" id="komoditas_id" name="komoditas_id" required>
                  <option value="" selected disabled>-- Pilih --</option>
                  <?php foreach ($content['data_all_komoditas'] as $key => $row) { ?>
                    <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
                  <?php } ?>
                </select>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="pasar_id">Pasar</label>
                <select class="custom-select" id="pasar_id" name="pasar_id" required>
                  <option value="" selected disabled>-- Pilih --</option>
                  <?php foreach ($content['data_all_pasar'] as $key => $row) { ?>
                    <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
                  <?php } ?>
                </select>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="value">Nilai</label>
                <input type="number" class="form-control" id="value" name="value" value="<?= set_value('value'); ?>" min="0" placeholder="Contoh Nilai: 10000, 12500, 4000 .." required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label>Date:</label>
                <div class="input-group date" id="rekapvaluedate_add" data-target-input="nearest">
                  <input type="text" id="date" name="date" class="form-control datetimepicker-input" data-target="#rekapvaluedate_add" />
                  <div class="input-group-append" data-target="#rekapvaluedate_add" data-toggle="datetimepicker">
                    <div class="input-group-text">
                      <i class="fa fa-calendar"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" form="formAddRekapitulasi">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editRekapitulasiModal" tabindex="-1" aria-labelledby="editRekapitulasiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editRekapitulasiModalLabel">Tambah Data Rekapitulasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formEditRekapitulasi" class="needs-validation" novalidate>
            <input type="hidden" name="<?= $content['csrf']['name']; ?>" value="<?= $content['csrf']['hash']; ?>" />
            <input type="hidden" id="id" name="id" value="" />
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="komoditas_id">Komoditas</label>
                <select class="custom-select" id="komoditas_id" name="komoditas_id" required>
                  <option value="" selected disabled>-- Pilih --</option>
                  <?php foreach ($content['data_all_komoditas'] as $key => $row) { ?>
                    <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
                  <?php } ?>
                </select>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="pasar_id">Pasar</label>
                <select class="custom-select" id="pasar_id" name="pasar_id" required>
                  <option value="" selected disabled>-- Pilih --</option>
                  <?php foreach ($content['data_all_pasar'] as $key => $row) { ?>
                    <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
                  <?php } ?>
                </select>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="value">Nilai</label>
                <input type="number" class="form-control" id="value" name="value" value="<?= set_value('value'); ?>" placeholder="Contoh Nilai: 10000, 12500, 4000 .." required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label>Date:</label>
                <div class="input-group date" id="rekapvaluedate_edit" data-target-input="nearest">
                  <input type="text" id="date" name="date" class="form-control datetimepicker-input" data-target="#rekapvaluedate_edit" />
                  <div class="input-group-append" data-target="#rekapvaluedate_edit" data-toggle="datetimepicker">
                    <div class="input-group-text">
                      <i class="fa fa-calendar"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" form="formEditRekapitulasi">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="deleteRekapitulasiModal" tabindex="-1" aria-labelledby="deleteRekapitulasiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteRekapitulasiModalLabel">Hapus Data Rekapitulasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formDeleteRekapitulasi" class="needs-validation" novalidate>
            <input type="hidden" id="<?= $content['csrf']['name']; ?>" name="<?= $content['csrf']['name']; ?>" value="<?= $content['csrf']['hash']; ?>" />
            <input type="hidden" id="id" name="id" value="" />
          </form>
          Apakah anda yakin ingin menghapus data rekapitulasi ini ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger" form="formDeleteRekapitulasi">Hapus</button>
        </div>
      </div>
    </div>
  </div>

</div>

<script>
  var table_rekapitulasi;

  $(window).on('resize', function() {
    table_rekapitulasi.columns.adjust(); // Adjust the column widths on window resize
  });

  $(document).on('click', '[id^="btn-modal-edit-rekapitulasi"]', function() {
    let row_id = $(this).data('rekapitulasi');
    // Perform AJAX call
    $.ajax({
      url: "/api/komoditas/rekapitulasi/" + row_id,
      method: 'GET',
      type: "GET",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      success: function(response) {
        // Handle success response
        $(`#editRekapitulasiModal #id`).val(response.data.id);
        $(`#editRekapitulasiModal #komoditas_id`).val(response.data.komoditas_id);
        $(`#editRekapitulasiModal #pasar_id`).val(response.data.pasar_id);
        $(`#editRekapitulasiModal #value`).val(response.data.value);
        $('#editRekapitulasiModal').modal('show');
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

  $(document).on('click', '[id^="btn-modal-delete-rekapitulasi"]', function() {
    let row_id = $(this).data('rekapitulasi');

    $(`#deleteRekapitulasiModal #id`).val(row_id);

    $('#deleteRekapitulasiModal').modal('show');
  });

  $('#formAddRekapitulasi').submit(function(e) {
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
      url: "/api/komoditas/rekapitulasi/create",
      method: 'POST',
      type: "POST",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      data: formData,
      success: function(response) {
        // Handle success response
        $('#addRekapitulasiModal').modal('hide');
        table_rekapitulasi.ajax.reload();
      },
      error: function(xhr, status, error) {
        if (xhr.status === 401) {
          window.location.href = '/logout';
        } else if (xhr.status === 403) {
          var errors = JSON.parse(xhr.responseText).data;
          $.each(errors, function(field, message) {
            var inputField = $(`#formAddRekapitulasi [name="${field}"]`);
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

  $('#formEditRekapitulasi').submit(function(e) {
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
      url: "/api/komoditas/rekapitulasi/update",
      method: 'POST',
      type: "POST",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      data: formData,
      success: function(response) {
        // Handle success response
        $('#editRekapitulasiModal').modal('hide');
        table_rekapitulasi.ajax.reload();
      },
      error: function(xhr, status, error) {
        if (xhr.status === 401) {
          window.location.href = '/logout';
        } else if (xhr.status === 403) {
          var errors = JSON.parse(xhr.responseText).data;
          $.each(errors, function(field, message) {
            var inputField = $(`#formEditRekapitulasi [name="${field}"]`);
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

  $('#formDeleteRekapitulasi').submit(function(e) {
    // Prevent form submission
    e.preventDefault();

    // Clear previous error messages and validation states
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').remove();
    $('.is-valid').removeClass('is-valid');
    $('.valid-feedback').remove();

    // Perform AJAX call
    $.ajax({
      url: "/api/komoditas/rekapitulasi/destroy",
      method: 'POST',
      type: "POST",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      data: $(this).serialize(),
      success: function(response) {
        // Handle success response
        $('#deleteRekapitulasiModal').modal('hide');
        table_rekapitulasi.ajax.reload();
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
    table_rekapitulasi = $('#table_rekapitulasi').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": false,
      "scrollX": true,
      "ajax": {
        url: "/api/komoditas/rekapitulasis",
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
          data: "komoditas_name",
          className: 'dt-head-center dt-body-left',
        },
        {
          title: "Satuan",
          data: "komoditas_unit",
          className: 'dt-center',
        },
        {
          title: "Jenis",
          data: "komoditas_type_name",
          className: 'dt-center',
        },
        {
          title: "Kelompok",
          data: "komoditas_cluster_name",
          className: 'dt-center',
        },
        {
          title: "Nilai",
          data: "value",
          className: 'dt-center',
          render: function(data, type, row, meta) {
            return `
            <p>Rp.${row.value}</p>
            `;
          }
        },
        {
          title: "Periode",
          data: "date",
          className: 'dt-center',
          render: function(data, type, row, meta) {
            const dateStr = row.date;
            const date = new Date(dateStr);
            const options = {
              year: 'numeric',
              month: 'long'
            };
            const formattedDate = date.toLocaleDateString('id-ID', options);
            return `
            <p>${formattedDate}</p>
            `;
          }
        },
        {
          title: "Nama Pasar",
          data: "pasar_name",
          className: 'dt-head-center dt-body-left',
        },
        {
          title: "Status Pasar",
          data: "pasar_status",
          className: 'dt-center',
          render: function(data, type, row, meta) {
            return `
            <span class="badge badge-pill badge-${row.pasar_status === 'active' ? 'success' : 'danger'} py-2 px-3 text-capitalize">${row.pasar_status === 'active' ? 'aktif' : 'tidak aktif'}</span>
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
              <button id="btn-modal-edit-rekapitulasi-${row.id}" data-rekapitulasi=${row.id} type="button" class="btn btn-sm btn-info d-flex flex-nowrap align-items-center justify-content-center">
                <i class="fas fa-edit mr-1"></i>
                Edit
              </button>
              <button id="btn-modal-delete-rekapitulasi-${row.id}" data-rekapitulasi=${row.id} type="button" class="btn btn-sm btn-danger d-flex flex-nowrap align-items-center justify-content-center">
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