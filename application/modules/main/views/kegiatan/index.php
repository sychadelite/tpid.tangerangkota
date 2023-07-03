<nav class="navbar navbar-expand-lg navbar-black w-100 z-3" style="margin-top: 4.5rem; background-color: #1E1E1E;">
  <div class="container-fluid px-2 px-sm-5">
    <h5 class="text-white mb-0">Berita</h5>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Beranda</a></li>
        <li class="breadcrumb-item"><a href="#">Berita</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="/kegiatan">Kegiatan</a></li>
      </ol>
    </nav>
  </div>
</nav>
<section class="position-relative d-flex flex-column align-items-center justify-content-start min-vh-100 text-dark">
  <div class="wrapper px-1 py-5 px-sm-5">
    <div class="container text-center mt-4">
      <div class="row align-items-start gap-5">
        <div class="col text-start px-0">
          <div class="d-flex flex-nowrap gap-4 align-items-baseline">
            <div class="d-flex flex-column w-100">
              <div>
                <div class="title-frame px-5 px-sm-4" data-aos="fade-right" data-aos-duration="1000">
                  <h2><?= $content['data_category']->name ?></h2>
                </div>
                <hr class="mt-4 border-5 border-secondary" style="max-width: 5%; opacity: 1;" data-aos="fade-right" data-aos-duration="2000" />
              </div>
              <div class="position-relative p-3 w-100 min-vh-100">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-4">
                  <div class="col" style="max-width: 30rem;">
                    <label for="tahun_kegiatan" class="mb-2">
                      <h5>Tahun</h5>
                    </label>
                    <select class="form-select" style="padding: 12px;" id="tahun_kegiatan" name="tahun_kegiatan" aria-label="Default select example">
                      <option disabled <?php echo !set_value('tahun_kegiatan') ? 'selected' : '' ?>>Pilih</option>
                      <option value="1" <?php echo set_value('tahun_kegiatan') == '2018' ? 'selected' : '' ?>>2018</option>
                      <option value="2" <?php echo set_value('tahun_kegiatan') == '2019' ? 'selected' : '' ?>>2019</option>
                      <option value="3" <?php echo set_value('tahun_kegiatan') == '2020' ? 'selected' : '' ?>>2020</option>
                      <option value="3" <?php echo set_value('tahun_kegiatan') == '2021' ? 'selected' : '' ?>>2021</option>
                      <option value="3" <?php echo set_value('tahun_kegiatan') == '2022' ? 'selected' : '' ?>>2022</option>
                      <option value="3" <?php echo set_value('tahun_kegiatan') == '2023' ? 'selected' : '' ?>>2023</option>
                    </select>
                    <div class="valid-feedback helper-tahun_kegiatan mt-1">Looks good!</div>
                    <div class="invalid-feedback helper-tahun_kegiatan mt-1"><?php echo form_error("tahun_kegiatan"); ?></div>
                  </div>
                  <div class="col" style="max-width: 30rem;">
                    <label for="bulan_kegiatan" class="mb-2">
                      <h5>Bulan</h5>
                    </label>
                    <select class="form-select" style="padding: 12px;" id="bulan_kegiatan" name="bulan_kegiatan" aria-label="Default select example">
                      <option disabled <?php echo !set_value('bulan_kegiatan') ? 'selected' : '' ?>>Pilih</option>
                      <option value="1" <?php echo set_value('bulan_kegiatan') == 'Januari' ? 'selected' : '' ?>>Januari</option>
                      <option value="2" <?php echo set_value('bulan_kegiatan') == 'Februari' ? 'selected' : '' ?>>Februari</option>
                      <option value="3" <?php echo set_value('bulan_kegiatan') == 'Maret' ? 'selected' : '' ?>>Maret</option>
                      <option value="1" <?php echo set_value('bulan_kegiatan') == 'April' ? 'selected' : '' ?>>April</option>
                      <option value="2" <?php echo set_value('bulan_kegiatan') == 'Mei' ? 'selected' : '' ?>>Mei</option>
                      <option value="3" <?php echo set_value('bulan_kegiatan') == 'Juni' ? 'selected' : '' ?>>Juni</option>
                      <option value="1" <?php echo set_value('bulan_kegiatan') == 'Juli' ? 'selected' : '' ?>>Juli</option>
                      <option value="2" <?php echo set_value('bulan_kegiatan') == 'Agustus' ? 'selected' : '' ?>>Agustus</option>
                      <option value="3" <?php echo set_value('bulan_kegiatan') == 'September' ? 'selected' : '' ?>>September</option>
                      <option value="1" <?php echo set_value('bulan_kegiatan') == 'Oktober' ? 'selected' : '' ?>>Oktober</option>
                      <option value="2" <?php echo set_value('bulan_kegiatan') == 'November' ? 'selected' : '' ?>>November</option>
                      <option value="3" <?php echo set_value('bulan_kegiatan') == 'Desember' ? 'selected' : '' ?>>Desember</option>
                    </select>
                    <div class="valid-feedback helper-bulan_kegiatan mt-1">Looks good!</div>
                    <div class="invalid-feedback helper-bulan_kegiatan mt-1"><?php echo form_error("bulan_kegiatan"); ?></div>
                  </div>
                </div>

                <div class="position-relative d-flex flex-column justify-content-center align-items-start">
                  <?php
                  setlocale(LC_TIME, 'id_ID.UTF-8');

                  $groupedData = [];

                  foreach ($content['data_all_kegiatan'] as $row) {
                    $yearMonth = date('Y-m', strtotime($row->created_at));
                    $groupedData[$yearMonth][] = $row;
                  }

                  $currentYear = null;

                  foreach ($groupedData as $yearMonth => $rows) {
                    $year = date('Y', strtotime($yearMonth));
                    $month = date('m', strtotime($yearMonth));
                    $monthName = strftime('%B', strtotime("2023-$month-01"));

                    if ($year !== $currentYear) {
                      $currentYear = $year; ?>
                      <h1 class="fw-bolder mt-5 w-fit followMeBar" data-follow="year" data-distance-intersect="50"><?= $year ?></h1>
                    <?php } ?>

                    <div class="position-relative w-100 px-3 px-sm-5">

                      <div class="vl position-absolute start-0 h-100" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500" data-aos-once="true"></div>
                      <!-- <div class="position-absolute rounded-circle bg-primary-subtle" style="width: 1.6rem; height: 1.6rem; left: -10.25px;" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true"></div>
                      <div class="position-absolute rounded-circle bg-primary-subtle" style="width: 1.6rem; height: 1.6rem; left: -10.25px; bottom: -10.25px" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500" data-aos-once="true"></div> -->

                      <div class="my-5">
                        <h1 class="fw-bolder mb-3 w-fit followMeBar" data-follow="month" data-distance-intersect="150"><?= getMonthName($month) ?></h1>
                        <div class="mt-n5">
                          <?php foreach ($rows as $key => $row) { ?>
                            <div class="position-relative d-flex flex-nowrap gap-5 w-100 fw-semibold">

                              <div class="vl" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500" data-aos-once="true"></div>
                              <?php if ($key == 0) {
                                echo '<div class="position-absolute rounded-circle bg-primary-subtle" style="width: 1.6rem; height: 1.6rem; left: -10.25px;" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true"></div>';
                              } ?>
                              <?php if ($key == count($rows) - 1) {
                                echo '<div class="position-absolute rounded-circle bg-primary-subtle" style="width: 1.6rem; height: 1.6rem; left: -10.25px; bottom: -10.25px" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500" data-aos-once="true"></div>';
                              } ?>

                              <div id="card-kegiatan-<?= $row->id ?>" class="shadow-sm py-3 mb-5 w-100 row no-gutters bg-primary-subtle text-white position-relative" style="border-radius: 1rem;">
                                <div class="col-md-6 mb-md-0 p-md-4">
                                  <img src="<?= $row->cover ?>" class="w-100" alt="..." style="border-radius: 1rem;">
                                </div>
                                <div class="col-md-6 p-3 p-sm-4 pl-md-0 d-flex flex-column justify-content-start">
                                  <div>
                                    <div class="d-flex flex-wrap justify-content-between card-title w-full">
                                      <div class="d-flex flex-nowrap align-items-start ">
                                        <h1 class="fs-1 fw-bold"><?= date('j', strtotime($row->news_start)) ?></h1>
                                        <h5 class="fs-6 mt-2"><?= $row->news_end ? '-' . date('j', strtotime($row->news_end)) : null ?></h5>
                                      </div>
                                      <small class="fs-6"><?= date('H.i', strtotime($row->news_start)) ?> - <?= $row->news_end ? date('H.i', strtotime($row->news_end)) : 'selesai' ?></small>
                                    </div>
                                    <div class="d-flex flex-nowrap w-full gap-3 mt-n1 mt-sm-n3">
                                      <p class="mt-1"><?= substr(getMonthName($month), 0, 3) ?></p>
                                      <h6 class="card-text mt-3 fw-bold"><?= $row->title ?></h6>
                                    </div>
                                  </div>
                                  <div class="accordion" id="accordionPanelStayOpen<?= $row->id ?>">
                                    <div class="accordion-item border-0 text-white">
                                      <div id="panelStayOpenCollapse<?= $row->id ?>" class="accordion-collapse collapse rounded-0" data-mdb-parent="#accordionPanelStayOpen<?= $row->id ?>" aria-labelledby="heading<?= $row->id ?>">
                                        <div class="accordion-body bg-primary-subtle">
                                          <div class="line-clamp" style="filter: brightness(0.8);">
                                            <?= $row->description ?>
                                          </div>
                                          <a href="/kegiatan/detail/<?= $row->slug ?>" class="stretched-link mt-5" style="filter: brightness(3.5);">
                                            lanjut baca ...
                                          </a>
                                        </div>
                                      </div>
                                      <h2 class="accordion-header bg-primary-subtle" id="heading<?= $row->id ?>">
                                        <button onclick="refTo(`card-kegiatan-<?= $row->id ?>`)" class="accordion-button collapsed from-before px-0 pb-2 bg-primary-subtle rounded-0" type="button" data-mdb-toggle="collapse" data-mdb-target="#panelStayOpenCollapse<?= $row->id ?>" aria-expanded="false" aria-controls="panelStayOpenCollapse<?= $row->id ?>">
                                          <small class="link-light fw-semibold ms-2 pe-none">selengkapnya >>></small>
                                        </button>
                                      </h2>
                                    </div>
                                  </div>
                                </div>
                              </div>

                            </div>
                          <?php } ?>
                        </div>
                      </div>

                      <div class="position-relative text-end mt-3">
                        <a href="/kegiatan/group/<?= $yearMonth ?>">
                          <button class="btn btn-primary bg-primary-subtle fs-6 text-capitalize" style="border-radius: 1rem;" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">Lihat lebih banyak</button>
                        </a>
                      </div>

                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>