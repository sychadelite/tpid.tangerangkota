<section class="">
  <!-- Footer -->
  <footer class="bg-black text-white">
    <!-- Grid container -->
    <div class="container p-4">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="d-flex flex-column justify-content-between col-lg-6 col-md-12 mb-4 mb-md-0">
          <h5 class="text-uppercase">TPID Kota TANGERANG</h5>
          <p>
            Jalan H. Somawinata No. 1, Kadu Agung, Tigaraksa, Kadu Agung, Tigaraksa, Tangerang, Banten 15119,Indonesia
          </p>
          <div class="mt-3 pb-2">
            <p>Telepon: (021) 5995503<br>Instagram: @pemkabtangerang</p>
          </div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-capitalize mb-3">peta situs</h5>

          <ul class="list-unstyled mb-0">
            <li class="mb-2">
              <a href="/" class="d-flex flex-nowrap align-items-baseline gap-2 text-white footer-link">
                <i class="fa-solid fa-chevron-right text-secondary"></i>
                Beranda
              </a>
            </li>
            <li class="mb-2">
              <a href="/galeri" class="d-flex flex-nowrap align-items-baseline gap-2 text-white footer-link">
                <i class="fa-solid fa-chevron-right text-secondary"></i>
                Galeri Foto
              </a>
            </li>
            <li class="mb-2">
              <a href="/galeri" class="d-flex flex-nowrap align-items-baseline gap-2 text-white footer-link">
                <i class="fa-solid fa-chevron-right text-secondary"></i>
                Galeri Video
              </a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-capitalize mb-3">aplikasi terkait</h5>

          <ul class="list-unstyled">
            <li class="mb-2">
              <a href="#!" class="d-flex flex-nowrap align-items-baseline gap-2 text-white footer-link">
                <i class="fa-solid fa-chevron-right text-secondary"></i>
                Web Terpadu Kota Tangerang
              </a>
            </li>
            <li class="mb-2">
              <a href="#!" class="d-flex flex-nowrap align-items-baseline gap-2 text-white footer-link">
                <i class="fa-solid fa-chevron-right text-secondary"></i>
                Aplikasi Kota Tangerang
              </a>
            </li>
            <li class="mb-2">
              <a href="#!" class="d-flex flex-nowrap align-items-baseline gap-2 text-white footer-link">
                <i class="fa-solid fa-chevron-right text-secondary"></i>
                Dashboard Kota Tangerang
              </a>
            </li>
            <li class="mb-2">
              <a href="#!" class="d-flex flex-nowrap align-items-baseline gap-2 text-white footer-link">
                <i class="fa-solid fa-chevron-right text-secondary"></i>
                Tangerang Gemilang
              </a>
            </li>
          </ul>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: #101010;">
      <p class="">
        © 2023 Copyright Pemerintah Kota Tangerang. All Rights Reserved<br>
        <a class="text-white" href="https://mdbootstrap.com/">Web Terpadu <span class="text-secondary">Kota Tangerang</span></a>
      </p>
      <small>Page rendered in <strong><?php echo $this->benchmark->elapsed_time('total_execution_time_start', 'total_execution_time_end'); ?></strong> seconds.</small>
      <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
</section>