<?php $this->load->view("template/include/load-head"); ?>

<body>
  <?php $this->load->view("template/include/load-topnav"); ?>

  <div class="bg-white">
    <?php $this->load->view($page_content); ?>
  </div>

  <?php $this->load->view("template/include/load-footer"); ?>

  <?php $this->load->view("template/include/scripts/index"); ?>
</body>

</html>