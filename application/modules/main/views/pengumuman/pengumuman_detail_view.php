<nav class="navbar navbar-expand-lg navbar-black w-100 z-3" style="margin-top: 4.5rem; background-color: #1E1E1E;">
  <div class="container-fluid px-2 px-sm-5">
    <h5 class="text-white mb-0">Berita</h5>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Beranda</a></li>
        <li class="breadcrumb-item"><a href="#">Berita</a></li>
        <li class="breadcrumb-item"><a href="/pengumuman">Pengumuman</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="#"><?= $content['data_pengumuman_detail']->slug ?></a></li>
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
                  <h2>pengumuman detail</h2>
                </div>
                <hr class="mt-4 border-5 border-secondary" style="max-width: 5%; opacity: 1;" data-aos="fade-right" data-aos-duration="2000" />
              </div>
              <div class="position-relative d-flex flex-column align-items-center p-3 w-100 min-vh-100">
                <div class="news-content">
                  <div class="news-header w-100 text-center my-4">
                    <img src="<?= substr($content['data_pengumuman_detail']->cover, 1) ?>" class="w-100" alt="..." style="border-radius: 1rem;">
                  </div>
                  <div class="news-body my-4">
                    <h1 class="fs-3"><b><?= $content['data_pengumuman_detail']->title ?></b></h1>
                    <nav class="news-nav rounded-4">
                      <div class="d-flex flex-row flex-wrap align-items-center gap-2 mx-2 p-1">
                        <a href="#" class="d-flex flex-row align-items-baseline gap-1 text-reset">
                          <i class="fa-regular fa-user fa-xs"></i>
                          <small class="fw-bolder text-capitalize" style="font-size: 10px;"><?= $content['data_pengumuman_detail']->user_group_name ?></small>
                        </a>
                        <a href="#" class="d-flex flex-row align-items-baseline gap-1 text-reset">
                          <i class="fa-regular fa-clock fa-xs"></i>
                          <small class="fw-bolder" style="font-size: 10px;"><?= $content['data_pengumuman_detail']->created_at ?></small>
                        </a>
                      </div>
                    </nav>
                    <div class="news-text mt-2 fs-6 fw-medium">
                      <?= $content['data_pengumuman_detail']->description ?>
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