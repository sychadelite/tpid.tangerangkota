<nav class="navbar navbar-expand-lg navbar-black w-100 z-3" style="margin-top: 4.5rem; background-color: #1E1E1E;">
  <div class="container-fluid px-2 px-sm-5">
    <h5 class="text-white mb-0">Profil</h5>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Beranda</a></li>
        <li class="breadcrumb-item"><a href="#">Profil</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="/galeri">Galeri</a></li>
      </ol>
    </nav>
  </div>
</nav>
<section id="gallery" class="position-relative d-flex flex-column align-items-center justify-content-start min-vh-100 text-dark">
  <div class="wrapper px-1 py-5 px-sm-5">
    <div class="container text-center mt-4">
      <div class="row align-items-start gap-5">
        <div class="col text-start">
          <div class="d-flex flex-nowrap gap-4 align-items-baseline">
            <div class="d-flex flex-column w-100">
              <div>
                <div class="title-frame px-5 px-sm-4">
                  <h2>galeri</h2>
                </div>
                <hr class="mt-4 border-5 border-secondary" style="max-width: 5%; opacity: 1;" />
              </div>
              <div class="fw-bold">
                <div class="container">
                  <div class="row w-100" data-masonry="{&quot;percentPosition&quot;: true }" style="position: relative; height: 688.4px;">
                    <?php foreach ($content['data_all_berita_files'] as $key => $row) { ?>
                      <div class="col-sm-6 col-lg-4 mb-4" style="position: absolute; left: 0%; top: 0px;">
                        <a data-fancybox="gallery" data-src="<?= $row->file_path ?>" data-caption="<?= $row->title ?>">
                          <div class="card text-white" style="background-color: #EBEBEB; border-radius: 2rem;">
                            <figure><img class="w-100" src="<?= $row->file_path ?>" alt="galeri-berita"></figure>
                            <div class="overlay-bottom" style="border-radius: 1.25rem;"></div>
                            <div class="card-img-overlay invisible z-2">
                              <div class="card-caption">
                                <!-- <h5 class="card-title">Card title</h5> -->
                                <p class="card-text">
                                  <?= word_limiter($row->title, 8) ?>
                                </p>
                                <!-- <p class="card-text">Last updated 3 mins ago</p> -->
                              </div>
                            </div>
                          </div>
                        </a>
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
</section>