<nav class="navbar navbar-expand-lg navbar-black w-100 z-3" style="margin-top: 4.5rem; background-color: #1E1E1E;">
  <div class="container-fluid px-5">
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
                <div class="d-flex flex-wrap justify-content-evenly gap-5">
                  <?php for ($i = 0; $i < 6; $i++) {
                    $randNum = rand(1, 4); ?>
                    <a data-fancybox="gallery" data-src="/assets/img/berita-<?= $randNum ?>.png" data-caption="Optional caption,&lt;br /&gt;that can contain &lt;em&gt;HTML&lt;/em&gt; code">
                      <div class="card card-item text-white">
                        <figure><img src="/assets/img/berita-<?= $randNum ?>.png" class="card-img" alt="Stony Beach" height="100%" /></figure>
                        <div class="overlay-bottom"></div>
                        <div class="card-img-overlay z-2">
                          <div class="d-flex flex-column justify-content-end h-100">
                            <!-- <h5 class="card-title">Card title</h5> -->
                            <p class="card-text">
                              Bupati Zaki Pimpin Rakor Forkopimda terkait Stok dan Harga Sembako Menjelang Ramadhan
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
        </div>
      </div>
    </div>
  </div>
</section>