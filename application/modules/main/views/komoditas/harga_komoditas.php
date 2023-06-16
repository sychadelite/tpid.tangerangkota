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
  <div class="wrapper px-1 py-5 px-sm-5">
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
                      <div id="post-list-harga-komoditas">
                        <div class="w-auto my-3">
                          <div class="btn-group w-100">
                            <button class="btn btn-light text-nowrap p-2 pe-none" style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;">
                              Pasar :
                            </button>
                            <select class="form-select" aria-label="Select Pasar" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px;">
                              <option value="1" selected="">Anyar</option>
                              <option value="2">Bandeng</option>
                              <option value="30">Cibodas</option>
                              <option value="3">Gerendeng</option>
                              <option value="32">Grand Duta</option>
                              <option value="31">Jatake</option>
                              <option value="4">Laris Cibodas</option>
                              <option value="5">Malabar</option>
                              <option value="51">Pasar Jajanan Cisadane Walk</option>
                              <option value="50">Pasar Jajanan Gajah Tunggal</option>
                              <option value="52">Pasar Jajanan Jembatan Berendeng</option>
                              <option value="48">Pasar Jajanan Taman Potret</option>
                              <option value="49">Pasar Jajanan Teras Cisadane</option>
                              <option value="34">Pasar Lingkungan Periuk Jaya</option>
                              <option value="45">Pasar Lingkungan Batuceper</option>
                              <option value="36">Pasar Lingkungan Benda</option>
                              <option value="40">Pasar Lingkungan Cibodas Baru</option>
                              <option value="39">Pasar Lingkungan Cimone</option>
                              <option value="47">Pasar Lingkungan Cipondoh Indah</option>
                              <option value="42">Pasar Lingkungan Gebang Raya</option>
                              <option value="37">Pasar Lingkungan Kunciran Indah</option>
                              <option value="35">Pasar Lingkungan Larangan Utara</option>
                              <option value="33">Pasar LIngkungan Manis Jaya</option>
                              <option value="44">Pasar Lingkungan Nambo Jaya</option>
                              <option value="38">Pasar Lingkungan Nusa Jaya</option>
                              <option value="43">Pasar Lingkungan Pabuaran Tumpeng</option>
                              <option value="53">Pasar Lingkungan Pasar Baru</option>
                              <option value="46">Pasar Lingkungan Pondok Bahar</option>
                              <option value="41">Pasar Lingkungan Sangiang Jaya</option>
                              <option value="6">Poris Indah</option>
                              <option value="7">Ramadhani</option>
                            </select>
                          </div>
                        </div>
                        <div class="w-auto my-3">
                          <div class="btn-group w-100">
                            <button class="btn btn-light text-nowrap p-2 pe-none" style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;">
                              Kelompok :
                            </button>
                            <select class="form-select" aria-label="Select Kelompok" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px;">
                              <option value="1" selected="">Komoditas Strategis</option>
                              <option value="2">Komoditas Lain</option>
                            </select>
                          </div>
                        </div>
                        <div class="w-auto my-3">
                          <div class="btn-group w-100">
                            <button class="btn btn-light text-nowrap p-2 pe-none" style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;">
                              Jenis :
                            </button>
                            <select class="form-select" aria-label="Select Jenis" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px;">
                              <option value="1" selected="">Sembako</option>
                              <option value="2">Daging</option>
                              <option value="3">Sayur</option>
                              <option value="4">Buah</option>
                              <option value="5">Bumbu</option>
                            </select>
                          </div>
                        </div>
                        <div class="w-auto my-3">
                          <div class="btn-group w-100">
                            <button class="btn btn-light text-nowrap p-2 pe-none" style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;">
                              Bulan :
                            </button>
                            <select class="form-select" aria-label="Select Bulan" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px;">
                              <option value="1" <?php echo set_value('bulan_pengumuman') == 'Januari' ? 'selected' : '' ?>>Januari</option>
                              <option value="2" <?php echo set_value('bulan_pengumuman') == 'Februari' ? 'selected' : '' ?>>Februari</option>
                              <option value="3" <?php echo set_value('bulan_pengumuman') == 'Maret' ? 'selected' : '' ?>>Maret</option>
                              <option value="1" <?php echo set_value('bulan_pengumuman') == 'April' ? 'selected' : '' ?>>April</option>
                              <option value="2" <?php echo set_value('bulan_pengumuman') == 'Mei' ? 'selected' : '' ?>>Mei</option>
                              <option value="3" <?php echo set_value('bulan_pengumuman') == 'Juni' ? 'selected' : '' ?>>Juni</option>
                              <option value="1" <?php echo set_value('bulan_pengumuman') == 'Juli' ? 'selected' : '' ?>>Juli</option>
                              <option value="2" <?php echo set_value('bulan_pengumuman') == 'Agustus' ? 'selected' : '' ?>>Agustus</option>
                              <option value="3" <?php echo set_value('bulan_pengumuman') == 'September' ? 'selected' : '' ?>>September</option>
                              <option value="1" <?php echo set_value('bulan_pengumuman') == 'Oktober' ? 'selected' : '' ?>>Oktober</option>
                              <option value="2" <?php echo set_value('bulan_pengumuman') == 'November' ? 'selected' : '' ?>>November</option>
                              <option value="3" <?php echo set_value('bulan_pengumuman') == 'Desember' ? 'selected' : '' ?>>Desember</option>
                            </select>
                          </div>
                        </div>
                        <div class="w-auto my-3">
                          <div class="btn-group w-100">
                            <button class="btn btn-light text-nowrap p-2 pe-none" style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;">
                              Tahun :
                            </button>
                            <select class="form-select" aria-label="Select Tahun" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px;">
                              <option value="2023" selected="">2023</option>
                              <option value="2022">2022</option>
                              <option value="2021">2021</option>
                              <option value="2020">2020</option>
                              <option value="2019">2019</option>
                              <option value="2018">2018</option>
                            </select>
                          </div>
                        </div>
                        <div class="text-center my-4">
                          <button class="btn btn-success">
                            Submit
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- END Drawer -->

              <div class="position-relative p-3 w-100 min-vh-100">
                <div class="mt-4">
                  <!-- Pills navs -->
                  <ul class="nav nav-pills nav-fill mb-3" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                      <a class="nav-link active" id="ex2-tab-1" data-mdb-toggle="pill" href="#ex2-pills-1" role="tab" aria-controls="ex2-pills-1" aria-selected="true">
                        Lihat Rekapitulasi
                      </a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" id="ex2-tab-2" data-mdb-toggle="pill" href="#ex2-pills-2" role="tab" aria-controls="ex2-pills-2" aria-selected="false">
                        Very very very very long link
                      </a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" id="ex2-tab-3" data-mdb-toggle="pill" href="#ex2-pills-3" role="tab" aria-controls="ex2-pills-3" aria-selected="false">
                        Another link
                      </a>
                    </li>
                  </ul>
                  <!-- Pills navs -->

                  <!-- Pills content -->
                  <div class="tab-content" id="ex2-content">
                    <div class="tab-pane fade show active" id="ex2-pills-1" role="tabpanel" aria-labelledby="ex2-tab-1">
                      <div class="position-relative d-flex flex-column justify-content-center align-items-start mt-4">
                        <div class="d-flex flex-wrap justify-content-end align-items-center gap-4 w-100 mb-4">
                          <button id="btn-filter-komoditas" class="btn btn-primary z-1" onclick="toggleDrawer()">
                            <i class="fa-solid fa-filter me-2"></i>
                            Filter Komoditas
                          </button>
                        </div>
                        <table id="table_harga_komoditas" class="stripe row-border order-column w-100">
                          <thead>
                            <tr>
                              <th colspan="14" class="group-header" style="text-align: center; border-top: 1px solid rgba(0, 0, 0, 0.3); border-bottom: none;">Bulan Juni 2023</th>
                            </tr>
                            <tr>
                              <th colspan="1" class="group-header" style="text-align: center; border-top: 1px solid rgba(0, 0, 0, 0.3); border-right: 1px solid rgba(0, 0, 0, 0.3);"></th>
                              <th colspan="2" class="group-header" style="text-align: center; border-top: 1px solid rgba(0, 0, 0, 0.3); border-right: 1px solid rgba(0, 0, 0, 0.3);">Komoditas</th>
                              <th colspan="7" class="group-header" style="text-align: center; border-top: 1px solid rgba(0, 0, 0, 0.3); border-right: 1px solid rgba(0, 0, 0, 0.3);">Pasar</th>
                              <th colspan="11" class="group-header" style="text-align: center; border-top: 1px solid rgba(0, 0, 0, 0.3);"></th>
                            </tr>
                            <tr>
                              <th>#</th>
                              <th>Nama</th>
                              <th>Satuan</th>
                              <th>11</th>
                              <th>12</th>
                              <th>13</th>
                              <th>14</th>
                              <th>15</th>
                              <th>16</th>
                              <th>17</th>
                              <th>Bulan Sebelumnya</th>
                              <th>Bulan Ini</th>
                              <th>(Rp)</th>
                              <th>(%)</th>
                            </tr>
                          </thead>
                          <tbody></tbody>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="ex2-pills-2" role="tabpanel" aria-labelledby="ex2-tab-2">
                      <div class="position-relative d-flex flex-column justify-content-center align-items-start mt-4">
                        Tab 2 content
                      </div>
                    </div>
                    <div class="tab-pane fade" id="ex2-pills-3" role="tabpanel" aria-labelledby="ex2-tab-3">
                      <div class="position-relative d-flex flex-column justify-content-center align-items-start mt-4">
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
  $(document).ready(function() {
    const rowData = [
      ["1", "John", "Doe", "Manager", "New York", "35", "2022-01-01", "$100,000", "123", "john.doe@example.com", "", "", "", ""],
      ["2", "Jane", "Smith", "Engineer", "San Francisco", "28", "2022-02-15", "$85,000", "456", "jane.smith@example.com", "", "", "", ""],
      ["3", "John", "Doe", "Manager", "New York", "35", "2022-01-01", "$100,000", "123", "john.doe@example.com", "", "", "", ""],
      ["4", "Jane", "Smith", "Engineer", "San Francisco", "28", "2022-02-15", "$85,000", "456", "jane.smith@example.com", "", "", "", ""],
      ["5", "John", "Doe", "Manager", "New York", "35", "2022-01-01", "$100,000", "123", "john.doe@example.com", "", "", "", ""],
      ["6", "Jane", "Smith", "Engineer", "San Francisco", "28", "2022-02-15", "$85,000", "456", "jane.smith@example.com", "", "", "", ""],
      ["7", "John", "Doe", "Manager", "New York", "35", "2022-01-01", "$100,000", "123", "john.doe@example.com", "", "", "", ""],
      ["8", "Jane", "Smith", "Engineer", "San Francisco", "28", "2022-02-15", "$85,000", "456", "jane.smith@example.com", "", "", "", ""],
      ["9", "John", "Doe", "Manager", "New York", "35", "2022-01-01", "$100,000", "123", "john.doe@example.com", "", "", "", ""],
      ["10", "Jane", "Smith", "Engineer", "San Francisco", "28", "2022-02-15", "$85,000", "456", "jane.smith@example.com", "", "", "", ""],
      ["11", "John", "Doe", "Manager", "New York", "35", "2022-01-01", "$100,000", "123", "john.doe@example.com", "", "", "", ""],
      ["12", "Jane", "Smith", "Engineer", "San Francisco", "28", "2022-02-15", "$85,000", "456", "jane.smith@example.com", "", "", "", ""],
      ["13", "John", "Doe", "Manager", "New York", "35", "2022-01-01", "$100,000", "123", "john.doe@example.com", "", "", "", ""],
      ["14", "Jane", "Smith", "Engineer", "San Francisco", "28", "2022-02-15", "$85,000", "456", "jane.smith@example.com", "", "", "", ""],
      ["15", "John", "Doe", "Manager", "New York", "35", "2022-01-01", "$100,000", "123", "john.doe@example.com", "", "", "", ""],
      ["16", "Jane", "Smith", "Engineer", "San Francisco", "28", "2022-02-15", "$85,000", "456", "jane.smith@example.com", "", "", "", ""],
      // Add more rows as needed
    ];

    var table = $('#table_harga_komoditas').DataTable({
      scrollY: "400px",
      scrollX: true,
      scrollCollapse: true,
      paging: false,
      fixedColumns: {
        left: 3,
        right: 4
      },
      responsive: {
        details: false // Disable fixed columns on small screens
      },
      columnDefs: [{
          targets: 0, // Target the first column
          className: 'index-column', // Add a class to style the index column if desired
          render: function(data, type, row, meta) {
            return meta.row + 1; // Add 1 to the row index to start the numbering from 1
          }
        },
        {
          targets: '_all',
          className: 'dt-center'
        }, // Add 'dt-center' class to center align all columns
      ],
      data: rowData,
      drawCallback: function() {
        // Remove order icon from the first column header
        $(this.api().table().header()).find('th:first-child').removeClass('sorting sorting_asc sorting_desc');
      }
    });

    // Set the table wrapper width to 100%
    $('#table_harga_komoditas_wrapper').css('width', '100%');

    // Apply background color to fixed right column rows
    $('.dtfc-fixed-left, .dtfc-fixed-right').css({
      'background-color': '#FFF',
      'z-index': '1'
    });

    table.columns.adjust();

    $(window).on('resize', function() {
      table.columns.adjust(); // Adjust the column widths on window resize
    });
  });


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