<?php $this->load->view("template/admin/include/load-head"); ?>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
  <div class="wrapper">
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="/assets/vendor/AdminLTE-3.2.0/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <?php $this->load->view("template/admin/include/load-topnav"); ?>

    <?php $this->load->view("template/admin/include/load-aside"); ?>

    <?php $this->load->view($page_name); ?>

    <aside class="control-sidebar control-sidebar-dark"></aside>

    <?php $this->load->view("template/admin/include/load-footer"); ?>
  </div>

  <?php $this->load->view("template/admin/include/scripts/index"); ?>
</body>

</html>