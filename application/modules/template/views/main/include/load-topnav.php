<!-- Navbar-->
<div>
  <nav id="topnav" class="navbar fixed-top navbar-expand-lg navbar-dark bg-transparent">
    <div class="container-fluid justify-content-between px-sm-5">
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
      <ul class="navbar-nav flex-row d-none d-lg-flex gap-4">
        <li class="nav-item">
          <a class="nav-link <?= uri_string() === '' ? 'active' : '' ?>" aria-current="page" href="/">Beranda</a>
        </li>
        <!-- Navbar dropdown profil -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" onclick="event.stopPropagation();" id="navbarDropdownProfil" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            Profil
          </a>
          <!-- Dropdown menu profil -->
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownProfil">
            <li>
              <a class="dropdown-item <?= uri_string() === 'about' ? 'active' : '' ?>" href="/about">Tentang Kami</a>
            </li>
            <li>
              <a class="dropdown-item <?= uri_string() === 'visi-misi' ? 'active' : '' ?>" href="/visi-misi">Visi Misi</a>
            </li>
            <li>
              <a class="dropdown-item <?= uri_string() === 'tugas-utama' ? 'active' : '' ?>" href="/tugas-utama">Tugas Utama</a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li>
              <a class="dropdown-item <?= uri_string() === 'struktur-organisasi' ? 'active' : '' ?>" href="/struktur-organisasi">Struktur Organisasi</a>
            </li>
          </ul>
        </li>
        <!-- Navbar dropdown berita -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" onclick="event.stopPropagation();" id="navbarDropdownBerita" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            Berita
          </a>
          <!-- Dropdown menu berita -->
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownBerita">
            <li>
              <a class="dropdown-item <?= uri_string() === 'pengumuman' ? 'active' : '' ?>" href="/pengumuman">Pengumuman</a>
            </li>
            <li>
              <a class="dropdown-item <?= uri_string() === 'kegiatan' ? 'active' : '' ?>" href="/kegiatan">Kegiatan</a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= uri_string() === 'galeri' ? 'active' : '' ?>" href="/galeri">Galeri</a>
        </li>
        <!-- Navbar dropdown komoditas -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" onclick="event.stopPropagation();" id="navbarDropdownKomoditas" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            Komoditas
          </a>
          <!-- Dropdown menu komoditas -->
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownKomoditas">
            <li>
              <a class="dropdown-item <?= uri_string() === 'harga-komoditas' ? 'active' : '' ?>" href="/harga-komoditas">Harga Komoditas</a>
            </li>
          </ul>
        </li>
      </ul>
      <!-- Center elements -->

      <!-- Right elements -->
      <ul class="navbar-nav flex-row d-lg-none">
        <!-- Dropdown Menu on tablet -->
        <li class="nav-item dropdown me-3 me-lg-1 d-none d-md-block d-lg-none">
          <a class="nav-link dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-bars fa-lg"></i>
          </a>

          <!-- Dropdown Content -->
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li>
              <a class="dropdown-item active" href="/">&nbsp;&nbsp;&nbsp; Beranda</a>
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
        <!-- Accordion Menu on phone -->
        <li class="nav-item dropdown mx-auto d-block d-md-none">
          <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars fa-lg pe-none"></i>
          </button>
        </li>
      </ul>
      <!-- Right elements -->
    </div>

    <!-- Collapsed Content -->
    <div class="collapse w-100 d-md-none p-2" id="navbarToggleExternalContent" style="max-height: 75vh; overflow: auto;">
      <div class="accordion accordion-borderless" id="accordionFlushTopnav">
        <div class="accordion-item my-2">
          <h2 class="accordion-header" id="flush-heading-home">
            <a href="/" class="accordion-button <?= uri_string() === '' ? 'active' : '' ?> collapsed text-white" type="button">
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
              <a href="/about" class="accordion-button <?= uri_string() === 'about' ? 'active' : '' ?> collapsed text-white my-2" type="button">
                Tentang Kami
              </a>
              <a href="/visi-misi" class="accordion-button <?= uri_string() === 'visi-misi' ? 'active' : '' ?> collapsed text-white my-2" type="button">
                Visi Misi
              </a>
              <a href="/tugas-utama" class="accordion-button <?= uri_string() === 'tugas-utama' ? 'active' : '' ?> collapsed text-white my-2" type="button">
                Tugas Utama
              </a>
              <a href="/struktur-organisasi" class="accordion-button <?= uri_string() === 'struktur-organisasi' ? 'active' : '' ?> collapsed text-white my-2" type="button">
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
              <a href="/pengumuman" class="accordion-button <?= uri_string() === 'pengumuman' ? 'active' : '' ?> collapsed text-white my-2" type="button">
                Pengumuman
              </a>
              <a href="/kegiatan" class="accordion-button <?= uri_string() === 'kegiatan' ? 'active' : '' ?> collapsed text-white my-2" type="button">
                Kegiatan
              </a>
            </div>
          </div>
        </div>
        <div class="accordion-item my-2">
          <h2 class="accordion-header" id="flush-heading-gallery">
            <a href="/galeri" class="accordion-button <?= uri_string() === 'galeri' ? 'active' : '' ?> collapsed text-white" type="button">
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
              <a href="/harga-komoditas" class="accordion-button <?= uri_string() === 'harga-komoditas' ? 'active' : '' ?> collapsed text-white my-2" type="button">
                Harga Komoditas
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
</div>
<!-- Navbar -->

<script>
  // Get all the active accordion buttons
  const parentDropdownButton = document.querySelectorAll('.nav-link.dropdown-toggle')

  // Loop through each active button
  parentDropdownButton.forEach(toggle => {
    const activeButton = toggle.parentElement.querySelectorAll('.active');
    if (activeButton.length > 0) {
      toggle.classList.add('active')
    }
  });
</script>