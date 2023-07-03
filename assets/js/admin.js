/* FUNCTIONS */
function onLoad(event) {
  console.log('admin loaded ...')
}

function toggle(id) {
  if ($(`#${id}`).hasClass('show')) {
    $(`#${id}`).removeClass('show');
    $(`#${id}`).addClass('hide');
  } else {
    $(`#${id}`).removeClass('hide');
    $(`#${id}`).addClass('show');
  }
}

// CHECKBOX
$("input[data-bootstrap-switch]").each(function(){
  $(this).bootstrapSwitch('state', $(this).prop('checked'));
});

//Date picker
$('#rekapvaluedate_add').datetimepicker({
  // format: 'L'
  format: 'YYYY-MM'
});
$('#rekapvaluedate_edit').datetimepicker({
  // format: 'L'
  format: 'YYYY-MM'
});

/* EVENTS */
window.onload = onLoad(this);

$(function () {
  'use strict';
  window.addEventListener('load', function () {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function (form) {
      form.addEventListener('submit', function (event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
});