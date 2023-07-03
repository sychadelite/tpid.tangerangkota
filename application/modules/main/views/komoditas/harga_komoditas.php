<nav class="navbar navbar-expand-lg navbar-black w-100 z-3" style="margin-top: 4.5rem; background-color: #1E1E1E;">
  <div class="container-fluid px-2 px-sm-5">
    <h5 class="text-white mb-0">Harga Komoditas</h5>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Beranda</a></li>
        <li class="breadcrumb-item"><a href="#">Komoditas</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="/visi-misi">Harga Komoditas</a></li>
      </ol>
    </nav>
  </div>
</nav>
<section class="position-relative d-flex flex-column align-items-center justify-content-start min-vh-100 text-dark">
  <div class="wrapper px-1 py-5 px-lg-5">
    <div class="container text-center mt-4">
      <div class="row align-items-start gap-5">
        <div class="col text-start">
          <div class="d-flex flex-nowrap gap-4 align-items-baseline">
            <div class="d-flex flex-column w-100">
              <div>
                <div class="title-frame px-5 px-sm-4" data-aos="fade-right" data-aos-duration="1000">
                  <h2>harga komoditas</h2>
                </div>
                <hr class="mt-4 border-5 border-secondary" style="max-width: 5%; opacity: 1;" data-aos="fade-right" data-aos-duration="2000" />
              </div>

              <!-- START Drawer -->
              <div class="drawer left bg-primary text-white">
                <div class="h-auto w-auto p-3">
                  <div class="alert alert-secondary d-flex justify-content-center align-items-center text-center text-uppercase fs-6 fw-bolder px-2" role="alert">
                    <button type="button" class="position-absolute start-0 btn btn-primary btn-lg h-100" style="border-top-right-radius: 50%; border-bottom-right-radius: 50%;" onclick="toggleDrawer()">
                      <i class="fas fa-chevron-left text-white"></i>
                    </button>
                    <p class="ms-5 mb-0">Filter Komoditas</p>
                  </div>
                  <div class="alert alert-secondary py-2 px-3" role="alert">
                    <div>
                      <form action="/komoditas" method="post" autocomplete="off">
                        <input type="hidden" name="<?= $content['csrf']['name']; ?>" value="<?= $content['csrf']['hash']; ?>" />
                        <div id="post-list-harga-komoditas">
                          <div class="w-auto my-3">
                            <div class="btn-group w-100">
                              <button class="btn btn-light text-nowrap p-2 pe-none" style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;">
                                Pasar :
                              </button>
                              <select class="form-select" id="pasar" name="pasar" aria-label="Select Pasar" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px;">
                                <option value="0" selected="">-- Pilih --</option>
                                <?php foreach ($content['data_all_pasar'] as $key => $row) { ?>
                                  <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                          <div class="w-auto my-3">
                            <div class="btn-group w-100">
                              <button class="btn btn-light text-nowrap p-2 pe-none" style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;">
                                Kelompok :
                              </button>
                              <select class="form-select" id="kelompok" name="kelompok" aria-label="Select Kelompok" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px;">
                                <option value="0" selected="">-- Pilih --</option>
                                <?php foreach ($content['data_all_kelompok_komoditas'] as $key => $row) { ?>
                                  <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                          <div class="w-auto my-3">
                            <div class="btn-group w-100">
                              <button class="btn btn-light text-nowrap p-2 pe-none" style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;">
                                Jenis :
                              </button>
                              <select class="form-select" id="jenis" name="jenis" aria-label="Select Jenis" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px;">
                                <option value="0" selected="">-- Pilih --</option>
                                <?php foreach ($content['data_all_jenis_komoditas'] as $key => $row) { ?>
                                  <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                          <div class="w-auto my-3">
                            <div class="btn-group w-100">
                              <button class="btn btn-light text-nowrap p-2 pe-none" style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;">
                                Bulan :
                              </button>
                              <select class="form-select" id="bulan" name="bulan" aria-label="Select Bulan" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px;">
                                <option value="01" <?= $month == "01" ? 'selected' : '' ?>>Januari</option>
                                <option value="02" <?= $month == "02" ? 'selected' : '' ?>>Februari</option>
                                <option value="03" <?= $month == "03" ? 'selected' : '' ?>>Maret</option>
                                <option value="04" <?= $month == "04" ? 'selected' : '' ?>>April</option>
                                <option value="05" <?= $month == "05" ? 'selected' : '' ?>>Mei</option>
                                <option value="06" <?= $month == "06" ? 'selected' : '' ?>>Juni</option>
                                <option value="07" <?= $month == "07" ? 'selected' : '' ?>>Juli</option>
                                <option value="08" <?= $month == "08" ? 'selected' : '' ?>>Agustus</option>
                                <option value="09" <?= $month == "09" ? 'selected' : '' ?>>September</option>
                                <option value="10" <?= $month == "10" ? 'selected' : '' ?>>Oktober</option>
                                <option value="11" <?= $month == "11" ? 'selected' : '' ?>>November</option>
                                <option value="12" <?= $month == "12" ? 'selected' : '' ?>>Desember</option>
                              </select>
                            </div>
                          </div>
                          <div class="w-auto my-3">
                            <div class="btn-group w-100">
                              <button class="btn btn-light text-nowrap p-2 pe-none" style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;">
                                Tahun :
                              </button>
                              <select class="form-select" id="tahun" name="tahun" aria-label="Select Tahun" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px;">
                                <?php for ($i = ((int) date("Y") - 2015); $i >= 0; $i--) { ?>
                                  <option value="<?= 2015 + $i ?>" <?= (2015 + $i) == $year ? 'selected' : '' ?>><?= 2015 + $i ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                          <div class="text-center my-4">
                            <button class="btn btn-success">
                              Submit
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- END Drawer -->

              <div class="position-relative w-100 min-vh-100">
                <div class="mt-4">
                  <!-- Pills navs -->
                  <ul class="nav nav-pills nav-fill mb-3" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                      <a class="nav-link active" id="ex2-tab-1" data-mdb-toggle="pill" href="#ex2-pills-1" role="tab" aria-controls="ex2-pills-1" aria-selected="true">
                        Lihat Rekapitulasi
                      </a>
                    </li>
                    <!-- <li class="nav-item" role="presentation">
                      <a class="nav-link" id="ex2-tab-2" data-mdb-toggle="pill" href="#ex2-pills-2" role="tab" aria-controls="ex2-pills-2" aria-selected="false">
                        Very very very very long link
                      </a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" id="ex2-tab-3" data-mdb-toggle="pill" href="#ex2-pills-3" role="tab" aria-controls="ex2-pills-3" aria-selected="false">
                        Another link
                      </a>
                    </li> -->
                  </ul>
                  <!-- Pills navs -->

                  <!-- Pills content -->
                  <div class="tab-content" id="ex2-content">
                    <div class="tab-pane fade show active" id="ex2-pills-1" role="tabpanel" aria-labelledby="ex2-tab-1">
                      <div class="position-relative d-flex flex-column justify-content-center align-items-start">
                        <div class="d-flex flex-wrap justify-content-between align-items-center gap-4 w-100 mb-4">
                          <button id="btn-filter-komoditas" class="btn btn-primary z-1" onclick="toggleDrawer()">
                            <i class="fa-solid fa-filter me-2"></i>
                            Filter Komoditas
                          </button>
                          <div class="input-group search-box w-fit">
                            <div class="form-outline">
                              <input type="search" id="input_search_box_table_harga_komoditas" class="form-control" />
                              <label class="form-label" for="input_search_box_table_harga_komoditas">Search</label>
                            </div>
                            <button type="button" class="btn btn-primary" id="btn_search_box_table_harga_komoditas">
                              <i class="fas fa-search"></i>
                            </button>
                          </div>
                        </div>
                        <div class="w-100 border border-bottom-0">
                          <h5 class="m-0 fw-bold w-100">
                            <span class="badge badge-light w-100 px-3 py-2">
                              <i class="fa-solid fa-calendar-week me-2"></i>
                              Bulan <?= $monthName . " " . $year ?>
                            </span>
                          </h5>
                        </div>
                        <table id="table_harga_komoditas" class="stripe header-border cell-border row-border order-column hover w-100">
                          <thead></thead>
                          <tbody></tbody>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="ex2-pills-2" role="tabpanel" aria-labelledby="ex2-tab-2">
                      <div class="position-relative d-flex flex-column justify-content-center align-items-start">
                        Tab 2 content
                      </div>
                    </div>
                    <div class="tab-pane fade" id="ex2-pills-3" role="tabpanel" aria-labelledby="ex2-tab-3">
                      <div class="position-relative d-flex flex-column justify-content-center align-items-start">
                        Tab 3 content
                      </div>
                    </div>
                  </div>
                  <!-- Pills content -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  var dataTableHargaKomoditas;

  $(document).ready(function() {
    initDataTable();
  });

  $(window).on('resize', function() {
    dataTableHargaKomoditas.columns.adjust(); // Adjust the column widths on window resize
  });

  function initDataTable() {

    const pasarData = <?= json_encode($content['data_all_pasar']) ?>;

    const groupKomoditas = <?= json_encode($content['data_all_rekapitulasi_group_komoditas']) ?>

    const rekapData = <?= json_encode($content['data_all_rekapitulasi_komoditas']) ?>;

    const groupHeadData = [{
        text: 'No',
        colspan: 1,
        rowspan: 2,
        className: 'group-header text-center',
        style: 'text-align: center; border-top: 1px solid rgba(0, 0, 0, 0.3); border-right: 1px solid rgba(0, 0, 0, 0.3);'
      },
      {
        text: 'Komoditas',
        colspan: 2,
        rowspan: 1,
        className: 'group-header text-center',
        style: 'text-align: center; border-top: 1px solid rgba(0, 0, 0, 0.3); border-right: 1px solid rgba(0, 0, 0, 0.3);'
      },
      {
        text: 'Pasar',
        colspan: pasarData.length,
        rowspan: 1,
        className: 'group-header text-center',
        style: 'text-align: center; border-top: 1px solid rgba(0, 0, 0, 0.3); border-right: 1px solid rgba(0, 0, 0, 0.3);'
      },
      {
        text: 'Rata-Rata',
        colspan: 2,
        rowspan: 1,
        className: 'group-header text-center',
        style: 'text-align: center; border-top: 1px solid rgba(0, 0, 0, 0.3); border-right: 1px solid rgba(0, 0, 0, 0.3);'
      },
      {
        text: 'Perubahan',
        colspan: 2,
        rowspan: 1,
        className: 'group-header text-center',
        style: 'text-align: center; border-top: 1px solid rgba(0, 0, 0, 0.3);'
      },
    ];

    const colHeadData = [{
        text: 'Nama',
        colspan: 1,
        rowspan: 1
      },
      {
        text: 'Satuan',
        colspan: 1,
        rowspan: 1
      },
      {
        text: 'Bulan Sebelumnya',
        colspan: 1,
        rowspan: 1
      },
      {
        text: 'Bulan Ini',
        colspan: 1,
        rowspan: 1
      },
      {
        text: '(Rp)',
        colspan: 1,
        rowspan: 1
      },
      {
        text: '(%)',
        colspan: 1,
        rowspan: 1
      },
    ];

    let bodyData = [
      ["1", "Beras IR I", "kg", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["2", "Beras IR II", "kg", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["3", "Gula Pasir Impor", "kg", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["4", "Gula Pasir Lokal", "kg", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["5", "Minyak Goreng Bimoli", "liter", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["6", "Minyak Goreng Curah", "liter", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["7", "Daging Sapi", "kg", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["8", "Daging Ayam Broiler", "ekor", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["9", "Telur Ayam Broiler", "kg", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["10", "Telur Ayam Kampung", "butir", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["11", "Susu Kental Bendera (397 gr)", "kaleng", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["12", "Susu Kental Indomilk (397 gr)", "kaleng", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["13", "Garam Halus (250 gr)", "bks", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["14", "Garam Bata", "kg", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["15", "Tepung Terigu Segitiga Biru", "kg", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["16", "Kacang Kedelai (Ext/Impor)", "kg", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["17", "Mie Instant (Indomie)", "kg", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["18", "Cabe Merah Keriting", "kg", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["19", "Cabe Merah Biasa (TW)", "kg", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["20", "Cabe Rawit Merah", "kg", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["21", "Cabe Rawit Hijau", "kg", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["22", "Bawang Merah", "kg", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["23", "Bawang Putih", "kg", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["24", "Ikan Asin Gabus", "kg", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["25", "Ikan Asin Sepat", "kg", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["26", "Ikan Tongkol", "kg", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["27", "Ikan Tenggiri", "kg", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["28", "Ikan Bandeng", "kg", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["29", "Ikan Mujair", "kg", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["30", "Kacang Hijau", "kg", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["31", "Kacang Tanah", "kg", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["32", "Kentang", "kg", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["33", "Tomat", "kg", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
      ["34", "Jagung Tongkol", "kg", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "0", "0", "Rp. 0.00", "0%"],
    ];

    const appendedData = pasarData.map(item => ({
      text: item.name,
      colspan: 1,
      rowspan: 1
    }));

    // Find the index of the "Satuan" and "Bulan Sebelumnya" rows
    let satuanIndex = colHeadData.findIndex(item => item.text === 'Satuan');
    let bulanSebelumnyaIndex = colHeadData.findIndex(item => item.text === 'Bulan Sebelumnya');

    // Insert the new data after the "Satuan" row
    colHeadData.splice(satuanIndex + 1, 0, ...appendedData);

    const temp = [];
    groupKomoditas.forEach((item, index) => {
      const arr = [
        index + 1,
        item.komoditas_name,
        item.komoditas_unit,
      ];
      pasarData.forEach((row, index) => {
        const cell = rekapData.find((innerRow) => {
          return innerRow.komoditas_name == item.komoditas_name && innerRow.pasar_name == row.name
        });
        arr.push(cell ? cell.value ? cell.value : 0 : 0);
      });
      const bulanSebelumnya = 0;
      const bulanIni = 0;
      const rupiah = 'Rp. 0.00';
      const percent = '0%';
      arr.push(bulanSebelumnya);
      arr.push(bulanIni);
      arr.push(rupiah);
      arr.push(percent);
      temp.push(arr);
    });

    bodyData = temp;

    const thead = $('#table_harga_komoditas thead');
    const trGroupHeader = $('<tr>');
    const trColumnHeader = $('<tr>');

    groupHeadData.forEach(header => {
      const thGroupHeader = $('<th>', {
        rowspan: header.rowspan,
        colspan: header.colspan,
        class: header.className,
        style: header.style,
      }).text(header.text);
      trGroupHeader.append(thGroupHeader);
    });

    colHeadData.forEach(header => {
      const thColumnHeader = $('<th>').text(header.text);
      trColumnHeader.append(thColumnHeader);
    });

    thead.append(trGroupHeader, trColumnHeader);

    dataTableHargaKomoditas = $('#table_harga_komoditas').DataTable({
      dom: 'rtip', // Specify the desired layout: f - filter input, r - processing display element, t - table, i - table information summary, p - pagination control
      scrollY: "300px",
      scrollX: true,
      scrollCollapse: true,
      paging: false,
      fixedColumns: {
        left: shouldEnableFixedColumns() ? 3 : 1,
        right: shouldEnableFixedColumns() ? 4 : 0,
      },
      responsive: {
        details: false // Disable fixed columns on small screens
      },
      columnDefs: [{
          targets: 0, // Target the first column
          className: 'index-column dt-center', // Add a class to style the index column if desired
          render: function(data, type, row, meta) {
            return meta.row + 1; // Add 1 to the row index to start the numbering from 1
          }
        },
        {
          targets: [1],
          className: 'text-start',
        },
        {
          targets: '_all',
          className: 'dt-center'
        },
      ],
      data: bodyData,
      drawCallback: function() {
        // Remove order icon from the first column header
        $(this.api().table().header()).find('th.group-header:first-child').removeClass('sorting sorting_asc sorting_desc');
      }
    });

    // Set the table wrapper width to 100%
    $('#table_harga_komoditas_wrapper').css({
      'width': '100%',
      'font-size': '12px'
    });

    // Apply background color to fixed right column rows
    $('.dtfc-fixed-left, .dtfc-fixed-right').css({
      'background-color': '#FFF',
      'z-index': '1'
    });

    // Custom search function
    $('#input_search_box_table_harga_komoditas').keyup(function() {
      dataTableHargaKomoditas.search($(this).val()).draw();
    });

    $('#btn_search_box_table_harga_komoditas').on('click', function() {
      const searchText = $('#input_search_box_table_harga_komoditas').val();
      dataTableHargaKomoditas.search(searchText).draw();
    });

    dataTableHargaKomoditas.columns.adjust();
  }

  function shouldEnableFixedColumns() {
    return $(window).width() > 1280; // Adjust the screen width breakpoint as needed
  }

  function toggleDrawer() {
    if ($('.drawer').hasClass('show')) {
      $('.drawer').removeClass('show');
      $('.overlay-drawer').removeClass('show');
    } else {
      $('.drawer').addClass('show');
      $('.overlay-drawer').addClass('show');
    }
  }
</script>