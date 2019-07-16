import SimpleLightbox from 'simple-lightbox'
import forEach from 'lodash/forEach'

let lightbox = null
const preloader = document.createElement('div')
preloader.classList.add('slbPreloader')
preloader.innerHTML = '<div class="spinner"><div class="spinner__inner spinner__c1"></div><div class="spinner__inner spinner__c2"></div><div class="spinner__inner spinner__c4"></div><div class="spinner__inner spinner__c3"></div></div>'

function init(wrap) {
	forEach(wrap.querySelectorAll('.js-product-details'), el => {
	  let id = el.dataset.id

	  el.addEventListener('click', e => {
	  	e.preventDefault()

			if (!lightbox) {
		    lightbox = SimpleLightbox.open({
		      content: preloader
		    })
			} else {
				lightbox.$content.appendChild(preloader)
				lightbox.show()
			}

	  	const data = new FormData()
	  	data.append('id', id)
	  	data.append('action', 'product')
	  	data.append('nonce_code', myajax.nonce)

	    const request = new XMLHttpRequest()
	    request.open('POST', myajax.url, true)
	    request.addEventListener('readystatechange', function() {
	      if (this.readyState != 4) return

		    lightbox.setContent(request.response)

			  init(lightbox.$content)
	    })
	    request.send(data)
	  })
	})
}

document.addEventListener('DOMContentLoaded', () => init(document))