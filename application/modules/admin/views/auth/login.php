<div class="login-page bg-light py-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 offset-lg-1">
        <div class="w-100 text-center">
          <img src="https://diskominfo.tangerangkota.go.id/assets/admin/img/KotaTangerang.png" alt="logo-pemkot" width="150px" height="105px">
          <h3 class="mb-3">TPID KOTA TANGERANG</h3>
        </div>
        <div class="login-card shadow">
          <div class="row">
            <div class="col-md-7 pe-0">
              <div class="form-left h-100 py-5 px-5">

                <!-- Start Message Warning -->
                <?php if ($this->session->flashdata('message_warning')) { ?>
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-triangle-exclamation me-1"></i>
                    <strong><?= $this->session->flashdata('message_warning'); ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php } ?>
                <!-- End Message Warning -->

                <!-- Start Message Error -->
                <?php if ($this->session->flashdata('message_error')) { ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-triangle-exclamation me-1"></i>
                    <strong><?= $this->session->flashdata('message_error'); ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php } ?>
                <!-- End Message Error -->

                <form role="form" method="post" action="/login" class="row g-4 needs-validation" autocomplete="off" novalidate>
                  <input type="hidden" name="<?= $content['csrf']['name']; ?>" value="<?= $content['csrf']['hash']; ?>" />
                  <div class="form-block-input col-12 input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-at"></i></span>
                    <input id="username" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="username" name="username" value="<?= set_value('username'); ?>" required minlength="4" />
                    <div class="valid-feedback helper-username">Looks good!</div>
                    <div class="invalid-feedback helper-username"></div>
                  </div>

                  <div class="form-block-input col-12 input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    <input id="password" type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password" name="password" value="<?= set_value('password'); ?>" required minlength="6" />
                    <div class="valid-feedback helper-password">Looks good!</div>
                    <div class="invalid-feedback helper-password"></div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="form_check_remember_me" name="remember_me" value="<?= set_value('remember_me'); ?>">
                      <label class="form-check-label" for="form_check_remember_me">Remember me</label>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <a href="#" class="float-end text-primary">Forgot Password?</a>
                  </div>

                  <div class="col-12">
                    <button type="submit" class="btn btn-primary px-4 float-end mt-4">login</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-md-5 ps-0 d-none d-md-block">
              <div class="login-card-sided d-flex flex-column justify-content-center align-items-center form-right h-100 text-white text-center" style="border-radius: 40px;">
                <i class="bi bi-bootstrap"></i>
                <h2 class="fs-4">Silahkan Login</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>