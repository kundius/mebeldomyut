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

const mobileAndTabletCheck = function() {
  let check = false;
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
  return check;
}

const lightbox = new SimpleLightbox({elements: '.js-slb-gallery a'})

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
    const elHeader = document.querySelector('.header-drawer')
    if (elHeader.classList.contains('header-drawer_opened')) {
      elHeader.classList.remove('header-drawer_opened')
    } else {
      elHeader.classList.add('header-drawer_opened')
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

forEach(document.querySelectorAll('.js-callback-modal'), el => {
  let target = document.querySelector('#callback')

  el.addEventListener('click', e => {
    if (mobileAndTabletCheck()) return

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