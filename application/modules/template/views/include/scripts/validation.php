<!-- Validation Form (Must Include form_validation library) -->
<script>
  'use strict';

  window.onload = function() {
    document.querySelectorAll(".form-outline").forEach((formOutline) => {
      new mdb.Input(formOutline).init();
    });
  };

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation');
  // Loop over them and prevent submission
  Array.prototype.slice.call(forms).forEach((form) => {
    /* ========> OnRender <======== */
    validityEveryInput();

    /* ========> OnSubmit <======== */
    form.addEventListener('submit', (event) => {
      const btn = form.querySelector(`button[type="submit"]`) || document.querySelector(`button[form="${form.id}"]`);
      const inputs = form.querySelectorAll(`[name]`);
      btn.innerHTML = `<span class="d-flex flex-row flex-nowrap align-items-baseline justify-content-center gap-1"><i class="fa fa-spinner"></i> Validate ...</span>`;
      btn.disabled = true;
      event.preventDefault();
      event.stopPropagation();
      const timeout = setTimeout(async () => {
        let dumpErrorEl = [];
        await inputs.forEach(input => {
          if (input.classList.contains('is-invalid')) {
            dumpErrorEl.push(input.name);
          }
          validityInput(input, 'not-throw');
        });

        if (await !form.checkValidity()) {
          // form.classList.add('was-validated');
        } else {
          if (dumpErrorEl.length === 0) {
            await form.submit();
          }
        }

        btn.innerHTML = await `Try Again`;
        btn.disabled = await false;

        await clearTimeout(timeout);
      }, 500);
    }, false);

    /* ========> OnInput <======== */
    const passwordInput = form.querySelector('#password');
    const confirmPasswordInput = form.querySelector('#password_confirmation');
    form.addEventListener('input', (e) => {
      validityInput(e.target);
    });

    /* ========> Functions <======== */
    function validityEveryInput() {
      const inputs = form.querySelectorAll('[name]');
      const error_array = <?php echo json_encode($this->form_validation->error_array()); ?>;
      const error_fields = Object.entries(error_array);
      inputs.forEach(input => {
        const error = filterByValue(error_fields, input.name)[0];
        if (error) {
          const name = error[0];
          const msg = error[1];
          const input = document.querySelector(`[name="${name}"]`);
          const helper = document.querySelector(`.invalid-feedback.helper-${name}`);

          input.classList.remove('is-valid');
          input.classList.add('is-invalid');
          helper.innerHTML = msg;
          input.closest('[class^="form-"]')?.parentElement.classList.add('mb-5');
        } else {
          // input.classList.remove('is-invalid');
          // input.classList.add('is-valid');
          // input.closest('[class^="form-"]')?.parentElement.classList.add('mb-3');
        }
      });
    }

    function validityInput(input, exec = null) {
      const inputName = input.name[0].toUpperCase() + input.name.substring(1);
      const helper_valid = input.parentElement.querySelector(`.valid-feedback.helper-${input.id}`);
      const helper_invalid = input.parentElement.querySelector(`.invalid-feedback.helper-${input.id}`);
      // Get the input validation rules
      let rules = input.getAttributeNames().filter((name) => {
        const exclude = ['class', 'id', 'name', 'type', 'value', 'aria-describedby', 'onclick', 'autocompleted'];
        name = exclude.indexOf(name) === -1;
        return name;
      }).map((name) => {
        let rule = {};
        let value = input.getAttribute(name);
        rule[name.substr(0)] = value;
        return rule;
      });

      // Neutralized
      setValidity(input, true, ``);
      // Loop through the validation rules and validate the input
      rules.forEach((rule) => {
        let ruleName = Object.keys(rule)[0];
        let ruleValue = Object.values(rule)[0];

        if (ruleName === 'required') {
          try {
            if (!input.value || (input.type === 'checkbox' && !input.checked)) {
              throw `This field is required.`;
            }
          } catch (e) {
            if (exec === 'not-throw') {
              return setValidity(input, false, e);
            } else {
              throw setValidity(input, false, e);
            }
          }
        }

        switch (ruleName) {
          case 'minlength':
            if (input.value.length > 0 && input.value.trim().length < parseInt(ruleValue)) {
              setValidity(input, false, `Minimum length is ${ruleValue}.`);
            }
            break;
          case 'maxlength':
            if (input.value.length > parseInt(ruleValue) && input.value.trim().length > parseInt(ruleValue)) {
              setValidity(input, false, `Maximum length is ${ruleValue}.`);
            }
            break;
          case 'match':
            let targetMatch = form.querySelector(`[name="${ruleValue}"]`);
            if (input.value !== targetMatch.value) {
              setValidity(input, false, `doesn't match with ${ruleValue} field.`);
              setValidity(targetMatch, false, `doesn't match with ${ruleValue} field.`);
            } else {
              setValidity(input, true, `Looks good!`);
              setValidity(targetMatch, true, `Looks good!`);
            }
            break;
          case 'pattern':
            let regex = new RegExp(ruleValue);
            if (!regex.test(input.value.trim())) {
              setValidity(input, false, `Invalid ${input.type} format.`);
            } else {
              setValidity(input, true, `Looks good!`);
            }
            break;
          default:
            break;
        }
      });

      function setValidity(input, status, msg) {
        clearanceValidity();
        if (status) {
          input.classList.remove('is-invalid');
          input.classList.add('is-valid');
          input.parentElement.classList.add('mb-3');
          helper_valid ? helper_valid.innerHTML = msg || `Looks good!` : null;
        } else {
          input.classList.remove('is-valid');
          input.classList.add('is-invalid');
          input.parentElement.classList.add('mb-3');
          helper_invalid ? helper_invalid.innerHTML = msg : null;
        }
      }

      function clearanceValidity() {
        helper_valid ? helper_valid.innerHTML = null : null;
        helper_invalid ? helper_invalid.innerHTML = null : null;
        input.parentElement.style.transition = '.3s';
        input?.closest('[class^="form-"]').parentElement.classList.remove('mb-3', 'mb-5');
        form.querySelector(`[name][match="${inputName.toLowerCase()}"]`)?.closest('[class^="form-"]').parentElement.classList.remove('mb-3');
      }
    }
  });

  function filterByValue(array, string) {
    return array.filter(o => Object.keys(o).some(k => o[k].toLowerCase().includes(string.toLowerCase())));
  }
</script>