<?php $this->load->view("template/main/include/load-head"); ?>

<body>
  <?php $this->load->view("template/main/include/load-topnav"); ?>

  <div class="bg-white">
    <?php $this->load->view($page_name); ?>
  </div>

  <?php $this->load->view("template/main/include/load-footer"); ?>

  <?php $this->load->view("template/main/include/scripts/index"); ?>
</body>

</html>