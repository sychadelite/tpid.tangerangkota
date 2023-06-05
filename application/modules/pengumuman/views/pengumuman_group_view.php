<nav class="navbar navbar-expand-lg navbar-black w-100 z-3" style="margin-top: 4.5rem; background-color: #1E1E1E;">
  <div class="container-fluid px-5">
    <h5 class="text-white mb-0">Berita</h5>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Beranda</a></li>
        <li class="breadcrumb-item"><a href="#">Berita</a></li>
        <li class="breadcrumb-item"><a href="/pengumuman">Pengumuman</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="#">Pengumuman <?php echo $month . " " . $year; ?></a></li>
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
                  <h2>pengumuman <?= $month . " " . $year ?></h2>
                </div>
                <hr class="mt-4 border-5 border-secondary" style="max-width: 5%; opacity: 1;" data-aos="fade-right" data-aos-duration="2000" />
              </div>
              <div class="position-relative p-3 w-100 min-vh-100">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-4">
                  <div class="input-group custom-input-search m-auto" style="max-width: 96%; height: 3rem;">
                    <div class="form-outline" style="height: 3rem;">
                      <input id="search_event" type="search" class="form-control" style="height: 3rem;" />
                      <label class="form-label" for="search_event" style="font-size: 20px;">Cari informasi event</label>
                    </div>
                    <button type="button" class="btn btn-primary">
                      <i class="fas fa-search pe-none"></i>
                    </button>
                  </div>
                </div>

                <div class="position-relative d-flex flex-column justify-content-center align-items-start mt-4">
                  <h1 class="fw-bolder mt-5 w-fit followMeBar" data-follow="year" data-distance-intersect="50"><?= $year ?></h1>
                  <div class="position-relative w-100 px-3 px-sm-5">
                    <div class="vl position-absolute start-0 h-100" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500" data-aos-once="true"></div>
                    <div class="position-absolute rounded-circle bg-primary-subtle" style="width: 1.6rem; height: 1.6rem; left: -10.25px;" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true"></div>
                    <div class="position-absolute rounded-circle bg-primary-subtle" style="width: 1.6rem; height: 1.6rem; left: -10.25px; bottom: -10.25px" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500" data-aos-once="true"></div>
                    <div class="my-5">
                      <h1 class="fw-bolder mb-3 w-fit followMeBar" data-follow="month" data-distance-intersect="150"><?= $month ?></h1>
                      <div class="mt-n5">
                        <?php for ($k = 0; $k < 30; $k++) { ?>
                          <div class="position-relative d-flex flex-nowrap gap-5 w-100 fw-semibold">
                            <div class="vl" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500" data-aos-once="true"></div>
                            <?php if ($k == 0) {
                              echo '<div class="position-absolute rounded-circle bg-primary-subtle" style="width: 1.6rem; height: 1.6rem; left: -10.25px;" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true"></div>';
                            } ?>
                            <?php if ($k == 29) {
                              echo '<div class="position-absolute rounded-circle bg-primary-subtle" style="width: 1.6rem; height: 1.6rem; left: -10.25px; bottom: -10.25px" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500" data-aos-once="true"></div>';
                            } ?>
                            <div id="card-pengumuman<?= $k ?>" class="py-3 w-100">
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
                                  <div class="accordion" id="accordionPanelStayOpen<?= $k ?>">
                                    <div class="accordion-item border-0 text-white">
                                      <div id="panelStayOpenCollapse<?= $k ?>" class="accordion-collapse collapse rounded-0" data-mdb-parent="#accordionPanelStayOpen<?= $k ?>" aria-labelledby="heading<?= $k ?>">
                                        <div class="accordion-body bg-primary-subtle">
                                          <strong>This is the first item's accordion body.</strong> It is shown by default,
                                          until the collapse plugin adds the appropriate classes that we use to style each
                                          element. These classes control the overall appearance, as well as the showing and
                                          hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                                          our default variables. It's also worth noting that just about any HTML can go within
                                          the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                      </div>
                                      <h2 class="accordion-header bg-primary-subtle" id="heading<?= $k ?>">
                                        <button onclick="refTo(`card-pengumuman<?= $k ?>`)" class="accordion-button collapsed from-before px-0 pb-2 bg-primary-subtle rounded-0" type="button" data-mdb-toggle="collapse" data-mdb-target="#panelStayOpenCollapse<?= $k ?>" aria-expanded="false" aria-controls="panelStayOpenCollapse<?= $k ?>">
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
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>