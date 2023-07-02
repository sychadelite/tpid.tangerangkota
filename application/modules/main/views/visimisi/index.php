<nav class="navbar navbar-expand-lg navbar-black w-100 z-3" style="margin-top: 4.5rem; background-color: #1E1E1E;">
  <div class="container-fluid px-2 px-sm-5">
    <h5 class="text-white mb-0">Profil</h5>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Beranda</a></li>
        <li class="breadcrumb-item"><a href="#">Profil</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="/visi-misi">Visi Dan Misi</a></li>
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
            <?php if (isset($content['data_visimisi'])) { ?>
              <div class="d-flex flex-column w-100">
                <div>
                  <div class="title-frame px-5 px-sm-4">
                    <h2><?= $content['data_visimisi']->title ?></h2>
                  </div>
                  <hr class="mt-4 border-5 border-secondary" style="max-width: 5%; opacity: 1;" />
                </div>
                <?= $content['data_visimisi']->description ?>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>