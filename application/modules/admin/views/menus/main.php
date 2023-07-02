<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Pengaturan Menu Utama</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Menu Utama</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="d-flex align-items-center justify-content-between">
                <h3 class="card-title">Tabel data menu utama</h3>
                <div>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMenuModal">
                    <i class="fas fa-plus mr-1"></i>
                    Tambah Data
                  </button>
                </div>
              </div>
            </div>

            <div class="card-body">
              <!-- <table id="table_menus" class="table table-bordered table-hover">
                <thead></thead>
                <tbody></tbody>
                <tfoot></tfoot>
              </table> -->

              <!-- List with handle -->
              <div id="nestedListMenu" class="list" data-menu-id="0" data-parent-id="0"></div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Modals -->
  <div class="modal fade" id="addMenuModal" tabindex="-1" aria-labelledby="addMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addMenuModalLabel">Tambah Data Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formAddMenu" class="needs-validation" novalidate>
            <input type="hidden" name="<?= $content['csrf']['name']; ?>" value="<?= $content['csrf']['hash']; ?>" />
            <input type="hidden" id="id" name="id" value="" />
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name'); ?>" placeholder="Nama Menu .." required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="path">Path</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend" style="max-width: 40%; overflow: auto;">
                    <span class="input-group-text" id="basic-addon3"><?= base_url(); ?></span>
                  </div>
                  <input type="text" class="form-control" id="path" name="path" value="<?= set_value('path'); ?>" placeholder="Path .." required>
                </div>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="icon">Icon</label>
                <input type="text" class="form-control" id="icon" name="icon" value="<?= set_value('icon'); ?>" placeholder="Icon ..">
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="position">Index</label>
                <input type="number" class="form-control" id="position" name="position" value="<?= set_value('position'); ?>" placeholder="Posisi Urutan .." required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="status">Status</label>
                <div>
                  <input type="checkbox" id="status" name="status" data-bootstrap-switch data-off-color="danger" data-on-color="success">
                </div>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="target_blank">Target Blank</label>
                <div>
                  <input type="checkbox" id="target_blank" name="target_blank" data-bootstrap-switch data-off-color="danger" data-on-color="success">
                </div>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" form="formAddMenu">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editMenuModal" tabindex="-1" aria-labelledby="editMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editMenuModalLabel">Edit Data Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formEditMenu" class="needs-validation" novalidate>
            <input type="hidden" id="<?= $content['csrf']['name']; ?>" name="<?= $content['csrf']['name']; ?>" value="<?= $content['csrf']['hash']; ?>" />
            <input type="hidden" id="id" name="id" value="" />
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name'); ?>" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="path">Path</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend" style="max-width: 40%; overflow: auto;">
                    <span class="input-group-text" id="basic-addon3"><?= base_url(); ?></span>
                  </div>
                  <input type="text" class="form-control" id="path" name="path" value="<?= set_value('path'); ?>" required placeholder="Path ..">
                </div>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="icon">Icon</label>
                <input type="text" class="form-control" id="icon" name="icon" value="<?= set_value('icon'); ?>" required placeholder="Icon ..">
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="position">Index</label>
                <input type="number" class="form-control" id="position" name="position" value="<?= set_value('position'); ?>" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="parent_id">Parent Grup</label>
                <select class="custom-select" id="parent_id" name="parent_id"></select>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="status">Status</label>
                <div>
                  <input type="checkbox" id="status" name="status" data-bootstrap-switch data-off-color="danger" data-on-color="success">
                </div>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="target_blank">Target Blank</label>
                <div>
                  <input type="checkbox" id="target_blank" name="target_blank" data-bootstrap-switch data-off-color="danger" data-on-color="success">
                </div>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" form="formEditMenu">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="deleteMenuModal" tabindex="-1" aria-labelledby="deleteMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteMenuModalLabel">Hapus Data Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formDeleteMenu" class="needs-validation" novalidate>
            <input type="hidden" id="<?= $content['csrf']['name']; ?>" name="<?= $content['csrf']['name']; ?>" value="<?= $content['csrf']['hash']; ?>" />
            <input type="hidden" id="id" name="id" value="" />
          </form>
          Apakah anda yakin ingin menghapus data menu ini ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger" form="formDeleteMenu">Hapus</button>
        </div>
      </div>
    </div>
  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

<script>
  var table_menus, table_menus_row_num = 1;

  $(function() {
    // Perform AJAX call
    $.ajax({
      url: "/api/menus/main",
      method: 'GET',
      type: "GET",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      data: $(this).serialize(),
      success: function(response) {
        // Handle success response
        const menus = response.data.menu_all
        parentMenus = menus.filter((menu) => {
          return menu.url != null && menu.url != undefined && menu.url != ''
        });

        // Create a nested data structure representing the parent-child relationships
        const nestedData = {};
        parentMenus.forEach(item => {
          const id = item.id;
          const parentId = item.parent_id;

          if (!nestedData[id]) {
            nestedData[id] = {
              ...item,
              children: []
            };
          } else {
            nestedData[id] = {
              ...item,
              children: nestedData[id].children
            };
          }

          if (parentId != 0) {
            if (!nestedData[parentId]) {
              nestedData[parentId] = {
                children: []
              };
            }
            nestedData[parentId].children.push(nestedData[id]);
          }
        });

        // Get the container element
        const container = document.getElementById('nestedListMenu');

        // Clear the container
        container.innerHTML = '';

        // Generate the menu elements and append them to the container
        parentMenus.forEach(item => {
          if (item.parent_id == 0) {
            const element = createMenuElements(nestedData[item.id]);
            container.appendChild(element);
          }
        });

        // Apply SortableJS to the generated elements
        var elements = document.getElementsByClassName('list');
        for (var i = 0; i < elements.length; i++) {
          new Sortable(elements[i], {
            handle: '.glyphicon-move',
            group: 'shared',
            animation: 150,
            ghostClass: 'bg-warning',
            invertSwap: true,
            // Element dragging ended
            onEnd: function( /**Event*/ evt) {
              var itemEl = evt.item; // dragged HTMLElement
              evt.to; // target list
              evt.from; // previous list
              evt.oldIndex; // element's old index within old parent
              evt.newIndex; // element's new index within new parent
              evt.oldDraggableIndex; // element's old index within old parent, only counting draggable elements
              evt.newDraggableIndex; // element's new index within new parent, only counting draggable elements
              evt.clone // the clone element
              evt.pullMode; // when item is in another sortable: `"clone"` if cloning, `true` if moving

              updateParentID(evt);
            },
          });
        }

        // Create the HTML elements recursively
        function createMenuElements(data) {
          const div = document.createElement('div');
          div.dataset.menuId = data.id;
          div.dataset.parentId = data.parent_id;
          div.dataset.position = data.position;
          div.className = 'menu-container bg-secondary px-3 py-2 my-2 rounded';

          const innerDiv = document.createElement('div');
          innerDiv.className = 'd-flex flex-wrap align-items-center justify-content-between w-100';
          innerDiv.style.gap = '8px';

          const p = document.createElement('p');
          p.className = 'mb-0';

          const span = document.createElement('span');
          span.className = 'glyphicon glyphicon-move mr-2';
          span.setAttribute('aria-hidden', 'true');

          const i = document.createElement('i');
          i.className = 'fas fa-arrows-alt';

          span.appendChild(i);
          p.appendChild(span);
          p.appendChild(document.createTextNode(data.name));


          const buttonDiv = document.createElement('div');
          buttonDiv.classList = 'd-flex flex-wrap';
          buttonDiv.style.gap = '8px';

          const buttonEdit = document.createElement('button');
          buttonEdit.className = 'btn btn-sm btn-info';
          buttonEdit.id = `btn-modal-edit-menu-${data.id}`;
          buttonEdit.dataset.menu = data.id;

          const editIcon = document.createElement('i');
          editIcon.className = 'fas fa-edit mr-1';
          editIcon.style.pointerEvents = 'none';

          buttonEdit.appendChild(editIcon);
          buttonEdit.appendChild(document.createTextNode('Edit'));

          const buttonDelete = document.createElement('button');
          buttonDelete.className = 'btn btn-sm btn-danger';
          buttonDelete.id = `btn-modal-delete-menu-${data.id}`;
          buttonDelete.dataset.menu = data.id;

          const deleteIcon = document.createElement('i');
          deleteIcon.className = 'fas fa-trash mr-1';
          deleteIcon.style.pointerEvents = 'none';

          buttonDelete.appendChild(deleteIcon);
          buttonDelete.appendChild(document.createTextNode('Delete'));

          buttonDiv.appendChild(buttonEdit);
          buttonDiv.appendChild(buttonDelete);

          innerDiv.appendChild(p);
          innerDiv.appendChild(buttonDiv);

          div.appendChild(innerDiv);

          if (data.children && data.children.length > 0) {
            const nestedList = document.createElement('div');
            nestedList.className = 'list n' + data.position + ' px-3 py-2';
            nestedList.style.filter = 'brightness(0.85)';

            data.children.forEach(child => {
              const childElement = createMenuElements(child);
              nestedList.appendChild(childElement);
            });

            div.appendChild(nestedList);
          }

          return div;
        }

        // Function to retrieve the updated menu IDs, parent IDs, and positions from the DOM
        function getMenuData(container) {
          const menuData = [];

          // Traverse the DOM and retrieve the menu IDs, parent IDs, and positions
          function traverseElements(element, parentID = null) {
            const listItem = element.closest('.menu-container');
            const menuID = listItem.getAttribute('data-menu-id') ?? 0;
            const parentIDAttribute = listItem.getAttribute('data-parent-id') ?? 0;
            const position = listItem.getAttribute('data-position') ?? 0;
            const childrenList = listItem.querySelector('.list');

            // Add the menu ID, parent ID, and position to the data array
            menuData.push({
              menuID,
              parentID,
              position
            });

            // Recursively traverse the children elements
            if (childrenList) {
              const children = childrenList.children;
              for (let i = 0; i < children.length; i++) {
                traverseElements(children[i], menuID);
              }
            }
          }

          // Start traversing from the top-level menu items
          const topLevelItems = container.children;
          for (let i = 0; i < topLevelItems.length; i++) {
            traverseElements(topLevelItems[i]);
          }

          return menuData;
        }

        function updateParentID(event) {
          const item = event.item;
          const oldParentList = event.from;
          const newParentList = event.to;

          const currentMenuID = $(item).data('menu-id');

          const oldParentID = $(oldParentList).parent().data('parent-id') ?? 0;
          const newParentID = $(newParentList).parent().data('menu-id') ?? 0;

          const oldParentChildren = $(oldParentList).children('[data-menu-id]');
          $(oldParentChildren).each(function() {
            $(this).data('position', $(this).index());
          });

          if (newParentID != oldParentID) {
            const newParentChildren = $(newParentList).children('[data-menu-id]');
            $(newParentChildren).each(function() {
              $(this).data('position', $(this).index());
            });
          }

          // Update dragged data parent ID
          $(item).data('parent-id', newParentID);

          // const newData = getMenuData(container);

          const listItem = $(container).find('[data-menu-id]');
          const newData = [];
          listItem.each(function() {
            elData = {
              menuID: $(this).data('menu-id'),
              parentID: $(this).data('parent-id'),
              position: $(this).data('position'),
            };
            newData.push(elData);
          });

          const formData = {
            <?= $content['csrf']['name']; ?>: '<?= $content['csrf']['hash']; ?>',
            data: newData,
          };

          // Perform AJAX call
          $.ajax({
            url: "/api/menus/main/group/update",
            method: 'POST',
            type: "POST",
            headers: {
              'Authorization': 'Bearer <?= $this->session->token ?>'
            },
            data: formData,
            success: function(response) {
              // Handle success response
            },
            error: function(xhr, status, error) {
              if (xhr.status === 401) {
                window.location.href = '/logout';
              } else {
                // Handle error response
                console.error(xhr.responseText);
              }
            }
          });
        }
      },
      error: function(xhr, status, error) {
        if (xhr.status === 401) {
          window.location.href = '/logout';
        } else {
          // Handle error response
          console.error(xhr.responseText);
        }
      }
    });
  });

  $(document).on('click', '[id^="btn-modal-add-menu"]', function() {
    let row_id = $(this).data('menu');

    $(`#addMenuModal #id`).val(row_id);
  });

  $(document).on('click', '[id^="btn-modal-edit-menu"]', function() {
    let row_id = $(this).data('menu');
    // Perform AJAX call
    $.ajax({
      url: "/api/menu/main/" + row_id,
      method: 'GET',
      type: "GET",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      success: function(response) {
        const url = response.data.url;
        const parsedUrl = new URL(url);
        let locationPath = parsedUrl.pathname;

        // Remove the leading slash if it exists
        if (locationPath.startsWith('/')) {
          locationPath = locationPath.substring(1);
        }

        if (parsedUrl.href.lastIndexOf('#') >= 0) {
          locationPath = locationPath + parsedUrl.href.charAt(parsedUrl.href.length - 1);
        }

        // Append the fragment identifier if it exists
        const fragmentIdentifier = parsedUrl.hash;
        if (fragmentIdentifier) {
          locationPath += fragmentIdentifier;
        }

        const available_parent_lists = response.parent_lists.filter((item) => {
          return item.id != row_id && item.parent_id != response.data.id
        });

        $(`#editMenuModal #parent_id`).children().remove();
        const optionDefault = document.createElement('option');
        optionDefault.value = 0;
        optionDefault.innerHTML = 'Default';
        optionDefault.selected = true;
        $(`#editMenuModal #parent_id`).append(optionDefault);
        available_parent_lists.forEach(item => {
          const option = document.createElement('option');
          option.value = item.id;
          option.innerHTML = item.name;
          if (item.id == response.data.parent_id) option.selected = true;
          $(`#editMenuModal #parent_id`).append(option);
        });

        // Handle success response
        $(`#editMenuModal #id`).val(response.data.id);
        $(`#editMenuModal #name`).val(response.data.name);
        $(`#editMenuModal #path`).val(locationPath);
        $(`#editMenuModal #icon`).val(response.data.icon);
        $(`#editMenuModal #position`).val(response.data.position);
        $(`#editMenuModal #status`).bootstrapSwitch('state', response.data.status === 'active', true);
        $(`#editMenuModal #target_blank`).bootstrapSwitch('state', response.data.target_blank == 1, true);
        $('#editMenuModal').modal('show');
      },
      error: function(xhr, status, error) {
        if (xhr.status === 401) {
          window.location.href = '/logout';
        } else {
          // Handle error response
          console.error(xhr.responseText);
        }
      }
    });
  });

  $(document).on('click', '[id^="btn-modal-delete-menu"]', function() {
    let row_id = $(this).data('menu');

    $(`#deleteMenuModal #id`).val(row_id);

    $('#deleteMenuModal').modal('show');
  });

  $('#formAddMenu').submit(function(e) {
    // Prevent form submission
    e.preventDefault();

    // Clear previous error messages and validation states
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').remove();
    $('.is-valid').removeClass('is-valid');
    $('.valid-feedback').remove();

    var formData = $(this).serialize();
    const additionPayload = {
      parent_id: $(this).find('#id').val()
    }

    Object.entries(additionPayload).forEach(entri => {
      formData += '&' + entri[0] + '=' + encodeURIComponent(entri[1]);
    });

    // Perform AJAX call
    $.ajax({
      url: "/api/menu/main/create",
      method: 'POST',
      type: "POST",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      data: formData,
      success: function(response) {
        // Handle success response
        $('#addMenuModal').modal('hide');
        window.location.reload();
      },
      error: function(xhr, status, error) {
        if (xhr.status === 401) {
          window.location.href = '/logout';
        } else if (xhr.status === 403) {
          var errors = JSON.parse(xhr.responseText).data;
          $.each(errors, function(field, message) {
            var inputField = $(`#formAddMenu [name="${field}"]`);
            var invalidFeedback = inputField.next('.invalid-feedback');

            if (invalidFeedback.length === 0) {
              invalidFeedback = $('<div>').addClass('invalid-feedback');
              inputField.after(invalidFeedback);
            }

            inputField.addClass('is-invalid');
            invalidFeedback.text(message);

            // Remove valid feedback if it exists
            var validFeedback = inputField.next('.valid-feedback');
            if (validFeedback.length !== 0) {
              validFeedback.remove();
            }
          });
        } else {
          // Handle error response
          console.error(xhr.responseText);
        }
      }
    });
  });

  $('#formEditMenu').submit(function(e) {
    // Prevent form submission
    e.preventDefault();

    // Clear previous error messages and validation states
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').remove();
    $('.is-valid').removeClass('is-valid');
    $('.valid-feedback').remove();

    // Get the serialized form data
    var formData = $(this).serialize();

    // Select and add values of disabled form elements
    $(this).find(':disabled[name]').each(function() {
      var element = $(this);
      var elementName = element.attr('name');
      var elementValue = element.val();

      // Append name-value pair to formData
      formData += '&' + elementName + '=' + encodeURIComponent(elementValue);
    });

    // Perform AJAX call
    $.ajax({
      url: "/api/menu/main/update",
      method: 'POST',
      type: "POST",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      data: formData,
      success: function(response) {
        // Handle success response
        $('#editMenuModal').modal('hide');
        window.location.reload();
      },
      error: function(xhr, status, error) {
        if (xhr.status === 401) {
          window.location.href = '/logout';
        } else if (xhr.status === 403) {
          var errors = JSON.parse(xhr.responseText).data;
          $.each(errors, function(field, message) {
            var inputField = $(`#formEditMenu [name="${field}"]`);
            var invalidFeedback = inputField.next('.invalid-feedback');

            if (invalidFeedback.length === 0) {
              invalidFeedback = $('<div>').addClass('invalid-feedback');
              inputField.after(invalidFeedback);
            }

            inputField.addClass('is-invalid');
            invalidFeedback.text(message);

            // Remove valid feedback if it exists
            var validFeedback = inputField.next('.valid-feedback');
            if (validFeedback.length !== 0) {
              validFeedback.remove();
            }
          });
        } else {
          // Handle error response
          console.error(xhr.responseText);
        }
      }
    });
  });

  $('#formDeleteMenu').submit(function(e) {
    // Prevent form submission
    e.preventDefault();

    // Clear previous error messages and validation states
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').remove();
    $('.is-valid').removeClass('is-valid');
    $('.valid-feedback').remove();

    // Perform AJAX call
    $.ajax({
      url: "/api/menu/main/destroy",
      method: 'POST',
      type: "POST",
      headers: {
        'Authorization': 'Bearer <?= $this->session->token ?>'
      },
      data: $(this).serialize(),
      success: function(response) {
        // Handle success response
        $('#deleteMenuModal').modal('hide');
        window.location.reload();
      },
      error: function(xhr, status, error) {
        if (xhr.status === 401) {
          window.location.href = '/logout';
        } else {
          // Handle error response
          console.error(xhr.responseText);
        }
      }
    });
  });
</script>