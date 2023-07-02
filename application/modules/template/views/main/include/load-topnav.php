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
        <?php
        function search($array, $key, $value)
        {
          $results = array();
          if (is_array($array)) {
            if (isset($array[$key]) && $array[$key] == $value) {
              $results[] = $array;
            }
            foreach ($array as $subarray) {
              $results = array_merge($results, search($subarray, $key, $value));
            }
          }
          return $results;
        }
        ?>

        <?php foreach ($content['menus_main'] as $indexMenu => $menu_main) { ?>
          <?php
          $group = search($content["menus_main"], "parent_id", $menu_main['id']);
          $hasChilds = count($group) > 0;
          ?>
          <?php if ($menu_main['parent_id'] == 0) { ?>
            <li class="nav-item <?= $hasChilds ? 'dropdown' : '' ?>">
              <?php if (!$hasChilds) { ?>
                <a class="nav-link <?= base_url(uri_string()) === $menu_main['url'] ? 'active' : '' ?>" aria-current="page" href="<?= $menu_main['url'] ?>">
                  <?= $menu_main['name'] ?>
                </a>
              <?php } else { ?>
                <!-- Navbar dropdown -->
                <a class="nav-link dropdown-toggle" href="#" onclick="event.stopPropagation();" id="navbarDropdown<?= $menu_main['name'] ?>" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                  <?= $menu_main['name'] ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown<?= $menu_main['name'] ?>">
                  <!-- Dropdown menu -->
                  <?php foreach ($group as $indexChildMenu => $childMenu) { ?>
                    <li>
                      <a class="dropdown-item <?= base_url(uri_string()) === $childMenu['url'] ? 'active' : '' ?>" href="<?= $childMenu['url'] ?>">
                        <?= $childMenu['name'] ?>
                      </a>
                    </li>
                  <?php } ?>
                </ul>
              <?php } ?>
            </li>
          <?php } ?>
        <?php } ?>
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
            <?php foreach ($content['menus_main'] as $indexMenu => $menu_main) { ?>
              <?php
              $group = search($content["menus_main"], "parent_id", $menu_main['id']);
              $hasChilds = count($group) > 0;
              ?>
              <?php if ($menu_main['parent_id'] == 0) { ?>
                <li>
                  <?php if (!$hasChilds) { ?>
                    <a class="dropdown-item <?= base_url(uri_string()) === $menu_main['url'] ? 'active' : '' ?>" href="<?= $menu_main['url'] ?>">
                      &nbsp;&nbsp;&nbsp; <?= $menu_main['name'] ?>
                    </a>
                  <?php } else { ?>
                    <a class="dropdown-item" href="#" onclick="event.stopPropagation();">
                      &laquo;&nbsp; <?= $menu_main['name'] ?>
                    </a>
                    <ul class="dropdown-menu dropdown-submenu dropdown-submenu-left">
                      <?php foreach ($group as $indexChildMenu => $childMenu) { ?>
                        <li>
                          <a class="dropdown-item <?= base_url(uri_string()) === $childMenu['url'] ? 'active' : '' ?>" href="<?= $childMenu['url'] ?>">
                            <?= $childMenu['name'] ?>
                          </a>
                        </li>
                      <?php } ?>
                    </ul>
                  <?php } ?>
                </li>
              <?php } ?>
            <?php } ?>
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
    <div class="collapse w-100 d-md-none p-2" id="navbarToggleExternalContent" style="max-height: 60vh; overflow: auto;">
      <div class="accordion accordion-borderless" id="accordionFlushTopnav">
        <?php foreach ($content['menus_main'] as $indexMenu => $menu_main) { ?>
          <?php
          $group = search($content["menus_main"], "parent_id", $menu_main['id']);
          $hasChilds = count($group) > 0;
          ?>
          <?php if ($menu_main['parent_id'] == 0) { ?>
            <?php if (!$hasChilds) { ?>
              <div class="accordion-item my-2">
                <h2 class="accordion-header" id="flush-heading-<?= strtolower($menu_main['name']) ?>">
                  <a href="<?= $menu_main['url'] ?>" class="accordion-button <?= base_url(uri_string()) === $menu_main['url'] ? 'active' : '' ?> collapsed text-white" type="button">
                    <?= $menu_main['name'] ?>
                  </a>
                </h2>
              </div>
            <?php } else { ?>
              <div class="accordion-item my-2">
                <h2 class="accordion-header" id="flush-heading-<?= strtolower($menu_main['name']) ?>">
                  <button class="accordion-button collapsed text-white" type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapse-<?= strtolower($menu_main['name']) ?>" aria-expanded="false" aria-controls="flush-collapse-<?= strtolower($menu_main['name']) ?>">
                    <?= $menu_main['name'] ?>
                  </button>
                </h2>
                <?php foreach ($group as $indexChildMenu => $childMenu) { ?>
                  <div id="flush-collapse-<?= strtolower($menu_main['name']) ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading-<?= strtolower($menu_main['name']) ?>" data-mdb-parent="#accordionFlushTopnav">
                    <div class="accordion-body text-white py-0 px-3">
                      <a href="<?= $childMenu['url'] ?>" class="accordion-button <?= base_url(uri_string()) === $childMenu['url'] ? 'active' : '' ?> collapsed text-white my-2" type="button">
                        <?= $childMenu['name'] ?>
                      </a>
                    </div>
                  </div>
                <?php } ?>
              </div>
            <?php } ?>
          <?php } ?>
        <?php } ?>
      </div>
    </div>
  </nav>
</div>
<!-- Navbar -->

<script>
  const parentLink = document.querySelectorAll('#topnav .nav-link.dropdown-toggle');
  parentLink.forEach(toggle => {
    const activeButton = toggle.parentElement.querySelectorAll('.active');
    activeButton.forEach((el) => {
      const parent = el.parentElement.parentElement.parentElement;
      const parentActiveEl = parent.querySelector('.dropdown-item, .dropdown-toggle');
      parentActiveEl.classList.add('active');
    });
  });

  const parentAccordionButton = document.querySelectorAll('#topnav .accordion');
  parentAccordionButton.forEach(toggle => {
    const activeButton = toggle.querySelectorAll('.active');
    activeButton.forEach((el) => {
      const parentActiveEl = el.parentElement.parentElement.parentElement.querySelector('.accordion-button');
      if (parentActiveEl.getAttribute('data-mdb-toggle') == 'collapse') {
        parentActiveEl.classList.add('active');
        $(document).ready(function() {
          parentActiveEl.click();
        });
      }
    });
  })
</script>