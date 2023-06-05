<nav class="navbar navbar-expand-lg navbar-black w-100 z-3" style="margin-top: 4.5rem; background-color: #1E1E1E;">
  <div class="container-fluid px-5">
    <h5 class="text-white mb-0">Berita</h5>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Beranda</a></li>
        <li class="breadcrumb-item"><a href="#">Berita</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="/pengumuman">Pengumuman</a></li>
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
                  <h2>pengumuman</h2>
                </div>
                <hr class="mt-4 border-5 border-secondary" style="max-width: 5%; opacity: 1;" data-aos="fade-right" data-aos-duration="2000" />
              </div>
              <div class="position-relative p-3 w-100 min-vh-100">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-4">
                  <div class="col" style="max-width: 30rem;">
                    <label for="tahun_pengumuman" class="mb-2">
                      <h5>Tahun</h5>
                    </label>
                    <select class="form-select" style="padding: 12px;" id="tahun_pengumuman" name="tahun_pengumuman" aria-label="Default select example">
                      <option disabled <?php echo !set_value('tahun_pengumuman') ? 'selected' : '' ?>>Pilih</option>
                      <option value="1" <?php echo set_value('tahun_pengumuman') == '1' ? 'selected' : '' ?>>2018</option>
                      <option value="2" <?php echo set_value('tahun_pengumuman') == '2' ? 'selected' : '' ?>>2019</option>
                      <option value="3" <?php echo set_value('tahun_pengumuman') == '3' ? 'selected' : '' ?>>2020</option>
                      <option value="3" <?php echo set_value('tahun_pengumuman') == '3' ? 'selected' : '' ?>>2021</option>
                      <option value="3" <?php echo set_value('tahun_pengumuman') == '3' ? 'selected' : '' ?>>2022</option>
                      <option value="3" <?php echo set_value('tahun_pengumuman') == '3' ? 'selected' : '' ?>>2023</option>
                    </select>
                    <div class="valid-feedback helper-tahun_pengumuman mt-1">Looks good!</div>
                    <div class="invalid-feedback helper-tahun_pengumuman mt-1"><?php echo form_error("tahun_pengumuman"); ?></div>
                  </div>
                  <div class="col" style="max-width: 30rem;">
                    <label for="bulan_pengumuman" class="mb-2">
                      <h5>Bulan</h5>
                    </label>
                    <select class="form-select" style="padding: 12px;" id="bulan_pengumuman" name="bulan_pengumuman" aria-label="Default select example">
                      <option disabled <?php echo !set_value('bulan_pengumuman') ? 'selected' : '' ?>>Pilih</option>
                      <option value="1" <?php echo set_value('bulan_pengumuman') == '1' ? 'selected' : '' ?>>Januari</option>
                      <option value="2" <?php echo set_value('bulan_pengumuman') == '2' ? 'selected' : '' ?>>Februari</option>
                      <option value="3" <?php echo set_value('bulan_pengumuman') == '3' ? 'selected' : '' ?>>Maret</option>
                      <option value="1" <?php echo set_value('bulan_pengumuman') == '1' ? 'selected' : '' ?>>April</option>
                      <option value="2" <?php echo set_value('bulan_pengumuman') == '2' ? 'selected' : '' ?>>Mei</option>
                      <option value="3" <?php echo set_value('bulan_pengumuman') == '3' ? 'selected' : '' ?>>Juni</option>
                      <option value="1" <?php echo set_value('bulan_pengumuman') == '1' ? 'selected' : '' ?>>Juli</option>
                      <option value="2" <?php echo set_value('bulan_pengumuman') == '2' ? 'selected' : '' ?>>Agustus</option>
                      <option value="3" <?php echo set_value('bulan_pengumuman') == '3' ? 'selected' : '' ?>>September</option>
                      <option value="1" <?php echo set_value('bulan_pengumuman') == '1' ? 'selected' : '' ?>>Oktober</option>
                      <option value="2" <?php echo set_value('bulan_pengumuman') == '2' ? 'selected' : '' ?>>November</option>
                      <option value="3" <?php echo set_value('bulan_pengumuman') == '3' ? 'selected' : '' ?>>Desember</option>
                    </select>
                    <div class="valid-feedback helper-bulan_pengumuman mt-1">Looks good!</div>
                    <div class="invalid-feedback helper-bulan_pengumuman mt-1"><?php echo form_error("bulan_pengumuman"); ?></div>
                  </div>
                </div>

                <div class="position-relative d-flex flex-column justify-content-center align-items-start mt-4">
                  <?php for ($i = 0; $i < 3; $i++) { ?>
                    <h1 class="fw-bolder mt-5 w-fit followMeBar" data-follow="year" data-distance-intersect="50">202<?= $i + 1 ?></h1>
                    <div class="position-relative w-100 px-3 px-sm-5">
                      <div class="vl position-absolute start-0 h-100" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500" data-aos-once="true"></div>
                      <div class="position-absolute rounded-circle bg-primary-subtle" style="width: 1.6rem; height: 1.6rem; left: -10.25px;" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true"></div>
                      <div class="position-absolute rounded-circle bg-primary-subtle" style="width: 1.6rem; height: 1.6rem; left: -10.25px; bottom: -10.25px" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500" data-aos-once="true"></div>
                      <?php for ($j = 0; $j < 12; $j++) { ?>
                        <div class="my-5">
                          <h1 class="fw-bolder mb-3 w-fit followMeBar" data-follow="month" data-distance-intersect="150">Bulan <?= $j + 1 ?></h1>
                          <div class="mt-n5">
                            <?php for ($k = 0; $k < 3; $k++) { ?>
                              <div class="position-relative d-flex flex-nowrap gap-5 w-100 fw-semibold">
                                <div class="vl" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500" data-aos-once="true"></div>
                                <?php if ($k == 0) {
                                  echo '<div class="position-absolute rounded-circle bg-primary-subtle" style="width: 1.6rem; height: 1.6rem; left: -10.25px;" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true"></div>';
                                } ?>
                                <?php if ($k == 2) {
                                  echo '<div class="position-absolute rounded-circle bg-primary-subtle" style="width: 1.6rem; height: 1.6rem; left: -10.25px; bottom: -10.25px" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500" data-aos-once="true"></div>';
                                } ?>
                                <div id="card-pengumuman<?= $i . $j . $k ?>" class="py-3 w-100">
                                  <div class="card bg-primary-subtle text-white activity-card" data-aos="zoom-in-up" data-aos-duration="1000" data-aos-once="true">
                                    <div class="card-body py-3 px-3 px-sm-4">
                                      <div class="d-flex flex-wrap justify-content-between card-title w-full">
                                        <div class="d-flex flex-nowrap align-items-start ">
                                          <h1 class="fs-1 fw-bold"><?= $k + 1 ?></h1>
                                          <h5 class="fs-6 mt-2">-<?= $k + 2 ?></h5>
                                        </div>
                                        <small class="fs-6">09-00 pagi - selesai</small>
                                      </div>
                                      <div class="d-flex flex-nowrap w-full gap-3 mt-n1 mt-sm-n3">
                                        <p class="mt-n1">APR</p>
                                        <p class="card-text">TPID Gelar Pangan Murah Sekaligus Serahkan Bantuan Pangan 10 Kecamatan.</p>
                                      </div>
                                      <div class="accordion" id="accordionPanelStayOpen<?= $i . $j . $k ?>">
                                        <div class="accordion-item border-0 text-white">
                                          <div id="panelStayOpenCollapse<?= $i . $j . $k ?>" class="accordion-collapse collapse rounded-0" data-mdb-parent="#accordionPanelStayOpen<?= $i . $j . $k ?>" aria-labelledby="heading<?= $i . $j . $k ?>">
                                            <div class="accordion-body bg-primary-subtle">
                                              <strong>This is the first item's accordion body.</strong> It is shown by default,
                                              until the collapse plugin adds the appropriate classes that we use to style each
                                              element. These classes control the overall appearance, as well as the showing and
                                              hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                                              our default variables. It's also worth noting that just about any HTML can go within
                                              the <code>.accordion-body</code>, though the transition does limit overflow.
                                            </div>
                                          </div>
                                          <h2 class="accordion-header bg-primary-subtle" id="heading<?= $i . $j . $k ?>">
                                            <button onclick="refTo(`card-pengumuman<?= $i . $j . $k ?>`)" class="accordion-button collapsed from-before px-0 pb-2 bg-primary-subtle rounded-0" type="button" data-mdb-toggle="collapse" data-mdb-target="#panelStayOpenCollapse<?= $i . $j . $k ?>" aria-expanded="false" aria-controls="panelStayOpenCollapse<?= $i . $j . $k ?>">
                                              <small class="link-light fw-semibold ms-2 pe-none">selengkapnya >>></small>
                                            </button>
                                          </h2>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <?php } ?>
                          </div>
                        </div>
                        <div class="position-relative text-end mt-3">
                          <a href="/pengumuman/group/<?= 4 . '-' . 2023 ?>">
                            <button class="btn btn-primary bg-primary-subtle fs-6 text-capitalize" style="border-radius: 1rem;" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">Lihat lebih banyak</button>
                          </a>
                        </div>
                      <?php } ?>
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