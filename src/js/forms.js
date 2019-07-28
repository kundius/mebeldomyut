import forEach from 'lodash/forEach'
import findIndex from 'lodash/findIndex'

forEach(document.querySelectorAll('.js-form'), function(form) {
  const fields = form.querySelectorAll('input')

  form.addEventListener('submit', function(e) {
    e.preventDefault()

    const request = new XMLHttpRequest()
    request.open('POST', form.action, true)
    request.addEventListener('readystatechange', function() {
      if (this.readyState != 4) return

      let message = form.querySelector('.form-message')
      if (!message) {
        message = document.createElement('div')
        message.classList.add('form-message')
        message.style.display = 'none'
        form.appendChild(message)
      }

      const response = JSON.parse(request.response)
      // if (response.status == 'validation_failed') {
        forEach(fields, field => {
          let found = findIndex(response.invalidFields, error => {
            return error.into.indexOf(field.name) !== -1
          })

          if (found !== -1) {
            field.parentNode.classList.add('form-input_error')
          } else {
            field.parentNode.classList.remove('form-input_error')
          }
        })
      // }

      if (response.status == 'mail_sent') {
        message.classList.remove('form-message_error')
        message.classList.add('form-message_success')
        message.innerHTML = response.message
        message.style.display = 'block'
        form.reset()
        if (typeof gtag_report_conversion === 'function') {
          gtag_report_conversion()
        }
      }

      if (response.status == 'mail_failed' || response.status == 'acceptance_missing') {
        message.classList.remove('form-message_success')
        message.classList.add('form-message_error')
        message.innerHTML = response.message
        message.style.display = 'block'
      }
    })
    request.send(new FormData(form))
  })
})