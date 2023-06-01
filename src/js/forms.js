document.querySelectorAll(".js-form").forEach(function (form) {
  const controlWrapElements = form.querySelectorAll(".wpcf7-form-control-wrap") || [];

  const resultReset = form.querySelector(".wpcf7-form-result-reset");
  const resultMessage = form.querySelector(".wpcf7-form-result-message");

  let messages = [];

  const removeErrors = () => {
    controlWrapElements.forEach((el) => el.classList.remove("_error"));
  };

  const removeMessages = () => {
    messages.forEach((message) => {
      if (message.parentNode) {
        message.parentNode.removeChild(message);
      }
    });
    messages = [];
  };

  const renderMessage = (selector, message) => {
    const el = form.querySelector(selector);
    el.classList.add("_error");
    const messageEl = document.createElement("span");
    messageEl.classList.add("ui-form-error");
    messageEl.innerHTML = message;
    el.appendChild(messageEl);
    messages.push(messageEl);
    const close = document.createElement("span");
    close.classList.add("ui-form-error__close");
    messageEl.appendChild(close);
    close.addEventListener("click", () => {
      messageEl.parentNode.removeChild(messageEl);
    });
  };

  if (resultReset) {
    resultReset.addEventListener("click", () => {
      form.classList.remove("_mail-sent");
      form.classList.remove("_mail-failed");
    });
  }

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    form.classList.add("_mail-sending");

    grecaptcha
      .execute(myajax.wpcf7_recaptcha_sitekey, { action: "submit" })
      .then(function (token) {
        removeErrors();
        removeMessages();

        const request = new XMLHttpRequest();
        request.open("POST", form.action, true);
        request.addEventListener("readystatechange", function () {
          if (this.readyState != 4) return;

          form.classList.remove("_mail-sending");

          const response = JSON.parse(request.response);

          if (response.status == "mail_sent") {
            form.reset();
            form.classList.add("_mail-sent");

            if (form.dataset.reachGoal) {
              ym(52070034, "reachGoal", form.dataset.reachGoal);
            }
          }

          if (response.status == "acceptance_missing") {
            renderMessage(".wpcf7-form-acceptance-wrap", response.message);
          }

          if (response.status == "mail_failed") {
            form.classList.add("_mail-failed");
          }

          if (response.status == "spam") {
            form.classList.add("_mail-failed");
          }

          if (response.status == "validation_failed") {
            response.invalidFields.forEach((field) => {
              renderMessage(field.into, field.message);
            });
          }

          if (resultMessage) {
            resultMessage.innerHTML = response.message;
          }
        });

        const formData = new FormData(form);
        formData.append("g-recaptcha-response", token);
        request.send(formData);
      });
  });
});

// forEach(document.querySelectorAll('.js-form'), function(form) {
//   const fields = form.querySelectorAll('input')

//   form.addEventListener('submit', function(e) {
//     e.preventDefault()

//     const request = new XMLHttpRequest()
//     request.open('POST', form.action, true)
//     request.addEventListener('readystatechange', function() {
//       if (this.readyState != 4) return

//       let message = form.querySelector('.form-message')
//       if (!message) {
//         message = document.createElement('div')
//         message.classList.add('form-message')
//         message.style.display = 'none'
//         form.appendChild(message)
//       }

//       const response = JSON.parse(request.response)
//       // if (response.status == 'validation_failed') {
//         forEach(fields, field => {
//           let found = findIndex(response.invalidFields, error => {
//             return error.into.indexOf(field.name) !== -1
//           })

//           if (found !== -1) {
//             field.parentNode.classList.add('form-input_error')
//           } else {
//             field.parentNode.classList.remove('form-input_error')
//           }
//         })
//       // }

//       if (response.status == 'mail_sent') {
//         message.classList.remove('form-message_error')
//         message.classList.add('form-message_success')
//         message.innerHTML = response.message
//         message.style.display = 'block'
//         form.reset()
//         if (typeof gtag_report_conversion === 'function') {
//           gtag_report_conversion()
//         }
//       }

//       if (response.status == 'mail_failed' || response.status == 'acceptance_missing') {
//         message.classList.remove('form-message_success')
//         message.classList.add('form-message_error')
//         message.innerHTML = response.message
//         message.style.display = 'block'
//       }
//     })
//     request.send(new FormData(form))
//   })
// })

document.addEventListener(
  "wpcf7mailsent",
  function (event) {
    if ("7" == event.detail.contactFormId) {
      ym(52070034, "reachGoal", "otpravil_zvonok");
    }
    if ("2095" == event.detail.contactFormId) {
      ym(52070034, "reachGoal", "otpravil_consult");
    }
    if ("518" == event.detail.contactFormId) {
      ym(52070034, "reachGoal", "qviz_rasshet");
    }
    if ("6" == event.detail.contactFormId) {
      ym(52070034, "reachGoal", "vyzov_dizainera");
    }
    if ("8" == event.detail.contactFormId) {
      ym(52070034, "reachGoal", "otpravka_catalog");
    }
    if ("1122" == event.detail.contactFormId) {
      ym(52070034, "reachGoal", "otpravka_stoimost");
    }
    if ("153" == event.detail.contactFormId) {
      ym(52070034, "reachGoal", "obrsvyz_otpravka");
    }
  },
  false
);
