<!-- Navbar-->
<div>
  <nav id="topnav" class="navbar fixed-top navbar-expand-lg navbar-dark bg-transparent">
    <div class="container-fluid justify-content-between">
      <!-- Left elements -->
      <div class="d-flex">
        <!-- Brand -->
        <a class="navbar-brand me-2 mb-1 d-flex flex-wrap align-items-center gap-2" href="#">
          <img id="app-logo" src="/assets/icons/app-logo.svg" alt="app-logo" height="40" loading="lazy" style="margin-top: 2px;">
          <div class="d-none d-sm-block text-wrap">
            <h4 class="fs-6 mb-0">
              Tim Pengendalian Inflasi Daerah<br>
              <span style="font-size: 12px;">Pemerintahan Kota Tangerang</span>
            </h4>
          </div>
        </a>
      </div>
      <!-- Left elements -->

      <!-- Center elements -->
      <ul class="navbar-nav flex-row d-none d-md-flex"></ul>
      <!-- Center elements -->

      <!-- Right elements -->
      <ul class="navbar-nav flex-row">
        <li class="nav-item dropdown me-3 me-lg-1 d-none d-md-block">
          <a class="nav-link dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-bars fa-lg"></i>
          </a>

          <!-- Dropdown Content -->
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li>
              <a class="dropdown-item" href="/">&nbsp;&nbsp;&nbsp; Beranda</a>
            </li>
            <li>
              <a class="dropdown-item" href="#" onclick="event.stopPropagation();">&laquo;&nbsp; Profil</a>
              <ul class="dropdown-menu dropdown-submenu dropdown-submenu-left">
                <li>
                  <a class="dropdown-item" href="/about">Tentang Kami</a>
                </li>
                <li>
                  <a class="dropdown-item" href="/visi-misi">Visi Misi</a>
                </li>
                <li>
                  <a class="dropdown-item" href="/tugas-utama">Tugas Utama</a>
                </li>
                <li>
                  <a class="dropdown-item" href="/struktur-organisasi">Struktur Organisasi</a>
                </li>
              </ul>
            </li>
            <li>
              <a class="dropdown-item" href="#" onclick="event.stopPropagation();">&laquo;&nbsp; Berita</a>
              <ul class="dropdown-menu dropdown-submenu dropdown-submenu-left">
                <li>
                  <a class="dropdown-item" href="/pengumuman">Pengumuman</a>
                </li>
                <li>
                  <a class="dropdown-item" href="/kegiatan">Kegiatan</a>
                </li>
              </ul>
            </li>
            <li>
              <a class="dropdown-item" href="/galeri">&nbsp;&nbsp;&nbsp; Galeri </a>
            </li>
            <li>
              <a class="dropdown-item" href="#" onclick="event.stopPropagation();">&laquo;&nbsp; Komoditas</a>
              <ul class="dropdown-menu dropdown-submenu dropdown-submenu-left">
                <li>
                  <a class="dropdown-item" href="/harga-komoditas">Harga Komoditas</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown me-3 me-lg-1 d-block d-md-none">
          <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars fa-lg pe-none"></i>
          </button>
        </li>
      </ul>
      <!-- Right elements -->
    </div>

    <!-- Collapsed Content -->
    <div class="collapse w-100 d-md-none" id="navbarToggleExternalContent" style="max-height: 20rem; overflow: auto;">
      <div class="p-4">
        <div class="accordion accordion-borderless" id="accordionFlushTopnav">
          <div class="accordion-item my-2">
            <h2 class="accordion-header" id="flush-heading-home">
              <a href="/" class="accordion-button collapsed text-white" type="button">
                Beranda
              </a>
            </h2>
          </div>
          <div class="accordion-item my-2">
            <h2 class="accordion-header" id="flush-heading-profile">
              <button class="accordion-button collapsed text-white" type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapse-profile" aria-expanded="false" aria-controls="flush-collapse-profile">
                Profil
              </button>
            </h2>
            <div id="flush-collapse-profile" class="accordion-collapse collapse" aria-labelledby="flush-heading-profile" data-mdb-parent="#accordionFlushTopnav">
              <div class="accordion-body text-white py-0 px-3">
                <a href="/about" class="accordion-button collapsed text-white my-2" type="button">
                  Tentang Kami
                </a>
                <a href="/visi-misi" class="accordion-button collapsed text-white my-2" type="button">
                  Visi Misi
                </a>
                <a href="/tugas-utama" class="accordion-button collapsed text-white my-2" type="button">
                  Tugas Utama
                </a>
                <a href="/struktur-organisasi" class="accordion-button collapsed text-white my-2" type="button">
                  Struktur Organisasi
                </a>
              </div>
            </div>
          </div>
          <div class="accordion-item my-2">
            <h2 class="accordion-header" id="flush-heading-news">
              <button class="accordion-button collapsed text-white" type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapse-news" aria-expanded="false" aria-controls="flush-collapse-news">
                Berita
              </button>
            </h2>
            <div id="flush-collapse-news" class="accordion-collapse collapse" aria-labelledby="flush-heading-news" data-mdb-parent="#accordionFlushTopnav">
              <div class="accordion-body text-white py-0 px-3">
                <a href="/pengumuman" class="accordion-button collapsed text-white my-2" type="button">
                  Pengumuman
                </a>
                <a href="/kegiatan" class="accordion-button collapsed text-white my-2" type="button">
                  Kegiatan
                </a>
              </div>
            </div>
          </div>
          <div class="accordion-item my-2">
            <h2 class="accordion-header" id="flush-heading-gallery">
              <a href="/galeri" class="accordion-button collapsed text-white" type="button">
                Galeri
              </a>
            </h2>
          </div>
          <div class="accordion-item my-2">
            <h2 class="accordion-header" id="flush-heading-commodity">
              <button class="accordion-button collapsed text-white" type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapse-commodity" aria-expanded="false" aria-controls="flush-collapse-commodity">
                Komoditas
              </button>
            </h2>
            <div id="flush-collapse-commodity" class="accordion-collapse collapse" aria-labelledby="flush-heading-commodity" data-mdb-parent="#accordionFlushTopnav">
              <div class="accordion-body text-white py-0 px-3">
                <a href="/harga-komoditas" class="accordion-button collapsed text-white my-2" type="button">
                  Harga Komoditas
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
</div>
<!-- Navbar -->