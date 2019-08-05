import svg4everybody from 'svg4everybody'
import objectFitImages from 'object-fit-images'
import LazyLoad from 'vanilla-lazyload'
import Slideshow from './slideshow'
import Projects from './projects'
import { TweenLite, TimelineLite } from 'gsap'
import { outCube } from './easing'
import throttle from 'lodash/throttle'
import forEach from 'lodash/forEach'
import IMask from 'imask'
import initBackgrounds from "./background"
import SimpleLightbox from 'simple-lightbox'
import './forms.js'
import './projectDetails.js'
import './matchHeight.js'
import './quiz.js'

document.addEventListener('DOMContentLoaded', initBackgrounds)
window.addEventListener('resize', initBackgrounds)

document.addEventListener('DOMContentLoaded', function() {
  const preloader = document.querySelector('.preloader')
  if (preloader) {
    const path = preloader.querySelector('path')
    TweenLite.to(path, .8, {
      onUpdate() {
        let progress = outCube(this.progress())
        path.setAttribute('d', `M${progress} 0 H 1 V 1 H ${progress} Z`)
      },
      onComplete() {
        preloader.style.display = 'none'
      }
    })
  }

  const slideshow = document.querySelector('.slideshow')
  if (slideshow) {
    new Slideshow(slideshow)
  
    const tl1 = new TimelineLite()
    tl1.staggerFromTo(document.querySelectorAll('.header-menu-slideshow__slide'), .5, {scale:0}, {scale:1, delay: .8}, 0.1)
    const tl2 = new TimelineLite()
    tl2.staggerFromTo(document.querySelectorAll('.header-menu-slideshow__link span'), .5, {x:'-100%'}, {x:'0%', delay: .8}, 0.1)
    TweenLite.fromTo(document.querySelectorAll('.slideshow-square-lt'), .3, {x:'500px', y: '250px', opacity: 0}, {x:'0px', y: '0px', opacity: .2, delay: .8})
    TweenLite.fromTo(document.querySelectorAll('.slideshow-square-rt'), .3, {x:'-500px', y: '250px', opacity: 0}, {x:'0px', y: '0px', opacity: .2, delay: .8})
    TweenLite.fromTo(document.querySelectorAll('.slideshow-square-rb'), .3, {x:'-500px', y: '-250px', opacity: 0}, {x:'0px', y: '0px', opacity: .2, delay: .8})
    TweenLite.fromTo(document.querySelectorAll('.slideshow-square-lb'), .3, {x:'500px', y: '-250px', opacity: 0}, {x:'0px', y: '0px', opacity: .2, delay: .8})
    TweenLite.fromTo(document.querySelectorAll('.overlay-email'), .3, {scale: 0}, {scale: 1, delay: .8})
    TweenLite.fromTo(document.querySelectorAll('.overlay-sitemap'), .3, {scale: 0}, {scale: 1, delay: .8})
  }
})

const elAnchor = document.querySelector('.sctolltop')
const elHeader = document.querySelector('.header')
const elMobileHeader = document.querySelector('.mobile-header')
const onScroll = e => {
  let scrolled = window.pageYOffset || document.documentElement.scrollTop

  if (scrolled > 500) {
    elAnchor.classList.add('sctolltop_visible')
    elHeader.classList.add('header_fixed')
    elMobileHeader.classList.add('mobile-header_fixed')
  } else {
    elAnchor.classList.remove('sctolltop_visible')
    elHeader.classList.remove('header_fixed')
    elMobileHeader.classList.remove('mobile-header_fixed')
  }
}
document.addEventListener('scroll', throttle(onScroll, 100))

document.querySelector('.sctolltop').addEventListener('click', function(e) {
  window.scrollTo({
    top: 0,
    behavior: "smooth"
  })
})

forEach(document.querySelectorAll('.js-scroll-to'), function(el) {
  el.addEventListener('click', function(e) {
    e.preventDefault()
    const anchor = document.querySelector(el.attributes.href.value)
    window.scrollTo({
      top: anchor.offsetTop,
      behavior: "smooth"
    })
  })
})

forEach(document.querySelectorAll('.zoom-container'), function(el) {
  const body = document.querySelector('body')
  const bg = document.querySelector('.zoom-cursor-bg')
  const icon = document.querySelector('.zoom-cursor-icon')
  const handler = function({ clientX, clientY }) {
    const { left, top, width, height } = el.getBoundingClientRect()

    bg.style.left = `${clientX}px`
    bg.style.top = `${clientY}px`
    icon.style.left = `${clientX}px`
    icon.style.top = `${clientY}px`
  }

  el.addEventListener('mousemove', throttle(handler, 10))
  el.addEventListener('mouseenter', () => {
    body.style.cursor = 'none'
    bg.style.display = 'block'
    icon.style.display = 'block'
  })
  el.addEventListener('mouseleave', () => {
    body.style.cursor = 'default'
    bg.style.display = 'none'
    icon.style.display = 'none'
  })
})

forEach(document.querySelectorAll('.js-svg-text'), function(el) {
  const box = el.querySelector('text').getBBox()
  el.style.width = box.width + 'px'
  el.style.height = box.height + 'px'
})

forEach(document.querySelectorAll('.js-toggle-menu'), el => {
  el.addEventListener('click', e => {
    e.preventDefault()
    const elHeader = document.querySelector('.header')
    if (elHeader.classList.contains('header_opened')) {
      elHeader.classList.remove('header_opened')
    } else {
      elHeader.classList.add('header_opened')
    }
  })
})

forEach(document.querySelectorAll('.js-open-modal'), el => {
  let target = document.querySelector(el.dataset.target)

  el.addEventListener('click', e => {
    e.preventDefault()
	  
    SimpleLightbox.open({
      content: target,
      elementClass: target.dataset.elementClass || ''
    })
  })
})

forEach(document.querySelectorAll('[data-imask]'), function(el) {
  new IMask(el, {
    mask: el.dataset.imask
  })
})

forEach(document.querySelectorAll('.form-input'), function(el) {
  const textarea = el.querySelector('textarea')
  const input = el.querySelector('.form-input__value')

  if (textarea) {
    function resize() {
      textarea.style.height = 'auto'
      textarea.style.height = textarea.scrollHeight + 'px'
    }
    function delayedResize() {
      window.setTimeout(resize, 0)
    }
    textarea.addEventListener('change', resize)
    textarea.addEventListener('cut', delayedResize)
    textarea.addEventListener('paste', delayedResize)
    textarea.addEventListener('drop', delayedResize)
    textarea.addEventListener('keydown', delayedResize)
    textarea.focus()
    textarea.select()
    resize()
  }
  
  input.addEventListener('focus', function(e) {
    el.classList.add('form-input_focus')
  })
  input.addEventListener('blur', function(e) {
    el.classList.remove('form-input_focus')
  })
  input.addEventListener('change', function(e) {
    if (input.value.length) {
      el.classList.add('form-input_fill')
    } else {
      el.classList.remove('form-input_fill')
    }
  })
})

const projects = document.querySelector('[data-projects]')
if (projects) {
  new Projects(projects)
}

const lorySlideshowItems = document.querySelectorAll('.js-lory-slideshow')
if (lorySlideshowItems.length > 0) {
	import('lory.js').then(({ lory }) => {
		forEach(lorySlideshowItems, function(slideshow) {
			lory(slideshow, {
				enableMouseEvents: true,
				infinite: 1
			})
		})
	})
}

var lazyLoadInstance = new LazyLoad({
  elements_selector: '.lazyload'
})

svg4everybody()
objectFitImages()