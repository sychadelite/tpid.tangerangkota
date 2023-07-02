<section id="hero" class="position-relative min-vh-100 text-white">
  <!-- Carousel wrapper -->
  <div id="carouselHeroHome" class="carousel slide carousel-fade min-vh-100 w-100" data-mdb-ride="carousel" data-mdb-interval="3000" data-mdb-pause="false">
    <!-- Inner -->
    <div class="carousel-inner min-vh-100">
      <!-- Single item -->
      <?php foreach ($content['data_all_banner'] as $key => $row) { ?>
        <div class="carousel-item min-vh-100 active">
          <div class="overlay"></div>
          <div class="overlay-hero">
            <!-- <div class="overlay-pattern"></div> -->
          </div>
          <img src="/assets/pattern/circle.svg" class="overlay-pattern" alt="pattern-circle" />
          <img src="/assets/img/<?= $row->image ?>" class="hero-image position-absolute d-block" alt="Sunset Over the City" />
          <div class="carousel-caption">
            <div class="caption-wrapper">
              <div>
                <div class="my-5">
                  <h1 class="hero-title">Selamat Datang,</h1>
                  <p>Lihat Informasi Terbaru Dari Tim Pengendalian Inflasi Daerah Kota Tangerang</p>
                </div>
                <a href="#simple-about">
                  <button type="button" class="btn bg-secondary text-white btn-rounded mt-5 py-3 px-5 fs-6" data-mdb-ripple-color="dark">
                    Cek Disini
                  </button>
                </a>
              </div>
              <div>
                <a href="#" class="icon-link"><img src="/assets/icons/instagram.svg" alt="instagram"></a>
                <a href="#" class="icon-link"><img src="/assets/icons/facebook.svg" alt="facebook"></a>
                <a href="#" class="icon-link"><img src="/assets/icons/phone.svg" alt="phone"></a>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    <!-- Inner -->
  </div>
  <!-- Carousel wrapper -->
</section>

<section id="simple-about" class="position-relative d-flex flex-column align-items-center justify-content-center text-dark">
  <div class="wrapper px-1 py-5 px-sm-5">
    <div class="container text-center">
      <div class="row align-items-start gap-5">
        <div class="col text-start">
          <div class="d-flex flex-nowrap gap-4 align-items-baseline">
            <div class="rounded-icon-frame">
              <img src="/assets/icons/question-mark.svg" class="bg-secondary rounded-circle" alt="question-mark">
            </div>
            <div class="d-flex flex-column">
              <h5 class="fw-bold">Apa itu TPID?</h5>
              <p>Tim Pengendalian Inflasi Daerah (TPID) merupakan wadah koordinasi dengan beranggotakan berbagai instansi pemerintah daerah, Badan Pusat Statistik (BPS), ketua pasar dan perbankan.</p>
            </div>
          </div>
        </div>
        <div class="col text-start">
          <div class="d-flex flex-nowrap gap-4 align-items-baseline">
            <div class="rounded-icon-frame">
              <img src="/assets/icons/question-mark.svg" class="bg-secondary rounded-circle" alt="question-mark">
            </div>
            <div class="d-flex flex-column">
              <h5 class="fw-bold">Apa tugas TPID?</h5>
              <p>TPID di fokuskan untuk memberikan rekomendasi dalam rangka menjaga ketersediaan pasokan, mendukung kelancaran distribusi sekaligus meminimalkan gangguan-gangguan (supply shocks) yang dapat mengganggu pasokan dan distribusi.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="main-news" class="position-relative d-flex flex-column align-items-start justify-content-center text-dark my-4">
  <div class="title-frame">
    <h2>berita</h2>
    <p>Berita Terbaru TPID</p>
  </div>
  <div class="wrapper px-1 py-5 px-sm-5">
    <div class="container">
      <div class="position-relative card mb-3 w-100" style="background-color: #EBEBEB; min-height: 14rem;">
        <div class="row g-0 h-100">
          <div class="col-md-6">
            <img src="<?= $content['data_latest_berita']->cover ?>" alt="Trendy Pants and Shoes" class="img-fluid rounded-start" />
          </div>
          <div class="col-md-6">
            <div class="card-body d-flex flex-column justify-content-between h-100">
              <div>
                <h5 class="card-title fw-bolder"><?= $content['data_latest_berita']->title ?></h5>

                <div class="line-clamp">
                  <p class="card-text">
                    <?= $content['data_latest_berita']->description ?>
                  </p>
                </div>
              </div>
              <p class="card-text text-end">
                <small class="text-muted">Terakhir diperbarui <?= get_human_readable_time_diff($content['data_latest_berita']->created_at) ?></small>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-5">
        <h4 class="fw-bold text-uppercase mb-4">berita lainnya</h4>
        <div class="d-flex flex-wrap justify-content-evenly gap-5">
          <?php foreach ($content['data_all_berita'] as $key => $row) { ?>
            <a href="/<?= $row->category_name ?>/detail/<?= $row->slug ?>">
              <div class="card card-item text-white">
                <figure><img src="<?= $row->cover ?>" class="card-img" alt="Stony Beach" height="100%" /></figure>
                <div class="overlay-bottom"></div>
                <h6 class="position-absolute mt-0 card-title">
                  <span class="badge badge-<?= $row->category_name === 'kegiatan' ? 'warning' : 'primary' ?> text-capitalize" style="border-radius: 0rem 0rem 1rem 0rem; padding: 8px;">
                    <?= $row->category_name ?>
                  </span>
                </h6>
                <div class="card-img-overlay z-2">
                  <div class="d-flex flex-column justify-content-end h-100">
                    <p class="card-text">
                      <?= $row->title ?>
                    </p>
                    <!-- <p class="card-text">Last updated 3 mins ago</p> -->
                  </div>
                </div>
              </div>
            </a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="gallery" class="position-relative d-flex flex-column align-items-start justify-content-center text-dark my-4">
  <div class="title-frame">
    <h2>galeri foto</h2>
    <p>Dokumentasi aktifitas terbaru dari TPID.</p>
  </div>
  <div class="wrapper px-1 py-5 px-sm-5">
    <div class="container">
      <div class="row w-100" data-masonry="{&quot;percentPosition&quot;: true }" style="position: relative; height: 688.4px;">
        <?php for ($i = 0; $i < 9; $i++) {
          $randNum = rand(1, 4); ?>
          <div class="col-sm-6 col-lg-4 mb-4" style="position: absolute; left: 0%; top: 0px;">
            <a data-fancybox="gallery" data-src="/assets/img/berita-<?= $randNum ?>.png" data-caption="Optional caption,&lt;br /&gt;that can contain &lt;em&gt;HTML&lt;/em&gt; code">
              <div class="card text-white" style="background-color: #EBEBEB; border-radius: 2rem;">
                <figure><img class="w-100" src="/assets/img/berita-<?= $randNum ?>.png" alt="galeri-berita"></figure>
                <div class="overlay-bottom" style="border-radius: 1.25rem;"></div>
                <div class="card-img-overlay invisible z-2">
                  <div class="card-caption">
                    <!-- <h5 class="card-title">Card title</h5> -->
                    <p class="card-text">
                      Jelang Nataru, Pemda Kab. Tangerang Gelar Rakor Forkopimda
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
</section>