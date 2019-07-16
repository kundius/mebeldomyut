import { TweenLite, TimelineLite } from 'gsap'
import pulsarAnimation from './pulsarAnimation'
import { outCube } from './easing'
import forEach from 'lodash/forEach'

export default class Slideshow {
  constructor(slideshow) {
    this.slideshow = slideshow
    this.wrap = slideshow.querySelector('.slideshow-slides')
    this.controls = slideshow.querySelectorAll('[data-slideshow-control]')
    this.slides = slideshow.querySelectorAll('.slideshow-slide')
    this.nav = document.querySelectorAll('.js-slideshow-nav')
    
    this.ratio = window.innerHeight / 920
    this.timer = null
    
    this.active = null
    this.duration = 800
    this.auto = 8000
    this.clsActive = 'slideshow-slide_active'
    this.animations = []

    this.show(0)

    this.arrangeElements()
    this.arrangeAnimations()
    this.initNav()
    this.initControls()
  }

  arrangeElements() {
    const firstSlideOverlay = document.querySelector('.slideshow-slide_0 .slide-overlay')
    firstSlideOverlay.style.top = `${537 * this.ratio}px`
    firstSlideOverlay.style.right = `${307 * this.ratio}px`

    const firstSlideCost = document.querySelector('.slideshow-slide_0 .slideshow-cost')
    firstSlideCost.style.top = `${270 * this.ratio}px`
    firstSlideCost.style.right = `${710 * this.ratio}px`

    const secondSlideOverlay = document.querySelector('.slideshow-slide_1 .slide-overlay')
    secondSlideOverlay.style.top = `${250 * this.ratio}px`
    secondSlideOverlay.style.right = `${76 * this.ratio}px`

    const secondSlideCost = document.querySelector('.slideshow-slide_1 .slideshow-cost')
    secondSlideCost.style.top = `${270 * this.ratio}px`
    secondSlideCost.style.right = `${764 * this.ratio}px`

    const thirdSlideOverlay = document.querySelector('.slideshow-slide_2 .slide-overlay')
    thirdSlideOverlay.style.top = `${240 * this.ratio}px`
    thirdSlideOverlay.style.right = `${375 * this.ratio}px`

    const thirdSlideCost = document.querySelector('.slideshow-slide_2 .slideshow-cost')
    thirdSlideCost.style.top = `${268 * this.ratio}px`
    thirdSlideCost.style.right = `${757 * this.ratio}px`

    const fourthSlideOverlay = document.querySelector('.slideshow-slide_3 .slide-overlay')
    fourthSlideOverlay.style.top = `${240 * this.ratio}px`
    fourthSlideOverlay.style.right = `${375 * this.ratio}px`

    const fourthSlideCost = document.querySelector('.slideshow-slide_3 .slideshow-cost')
    fourthSlideCost.style.top = `${268 * this.ratio}px`
    fourthSlideCost.style.right = `${760 * this.ratio}px`

    const fifthSlideOverlay = document.querySelector('.slideshow-slide_4 .slide-overlay')
    fifthSlideOverlay.style.top = `${551 * this.ratio}px`
    fifthSlideOverlay.style.right = `${747 * this.ratio}px`

    const fifthSlideCost = document.querySelector('.slideshow-slide_4 .slideshow-cost')
    fifthSlideCost.style.top = `${268 * this.ratio}px`
    fifthSlideCost.style.right = `${755 * this.ratio}px`
  }

  arrangeAnimations() {
    this.animations.push(this.getFirstSlideAnimations())
    this.animations.push(this.getSecondSlideAnimations())
    this.animations.push(this.getThirdSlideAnimations())
    this.animations.push(this.getFourthSlideAnimations())
    this.animations.push(this.getFifthSlideAnimations())
  }

  initNav() {
    forEach(this.nav, el => {
      el.addEventListener('click', e => {
        e.preventDefault()
        this.show(Number(el.dataset.index))
      })
    })
  }

  initControls() {
    forEach(this.controls, el => {
      el.addEventListener('click', e => {
        e.preventDefault()

        const value = el.dataset.slideshowControl
        if (!isNaN(value)) {
          this.show(value)
        }
        else if (value == 'previous') {
          this.previous()
        }
        else if (value == 'next') {
          this.next()
        }
      })
    })
  }

  previous() {
    if (this.active === 0) {
      this.show(this.slides.length - 1)
    } else {
      this.show(this.active - 1)
    }
  }

  next() {
    if (this.slides.length - 1 > this.active) {
      this.show(this.active + 1)
    } else {
      this.show(0)
    }
  }

  show(index) {
    if (this.active === index) return false

    if (this.timer) {
      clearTimeout(this.timer)
    }

    forEach(this.nav, el => {
      if (Number(el.dataset.index) === Number(index)) {
        el.classList.add('active')
      } else {
        el.classList.remove('active')
      }
    })

    forEach(this.controls, el => {
      const value = el.dataset.slideshowControl
      if (!isNaN(value)) {
        if (Number(value) === Number(index)) {
          el.classList.add('active')
        } else {
          el.classList.remove('active')
        }
      }
    })

    let slide = this.slides[index]
    this.active = index
    this.wrap.appendChild(slide)
    forEach(this.slides, slide => slide.classList.remove(this.clsActive))
    slide.classList.add(this.clsActive)

    TweenLite.to(slide, .8, {
      onUpdateParams: [
        slide.querySelector(`.slideshow-slide__title`),
        slide.querySelector(`path`)
      ],
      onUpdate(title, path) {
        let progress = outCube(this.progress())
        title.style.transform = `translateX(-${100-progress*100}%)`
        path.setAttribute('d', `M0 0 H ${progress} V 1 H 0 Z`)
      },
      onCompleteScope: this,
      onComplete() {
        this.timer = setTimeout(() => this.next(), this.auto)
        this.animations.forEach((tl, i) => {
          if (i === index) {
            tl.play()
          } else {
            !tl.paused() && tl.restart().pause()
          }
        })
      }
    })
  }

  getFirstSlideAnimations() {
    const elPulsar = document.querySelector('.slideshow-slide_0 .pulsar')
    const elOverlayTitle = document.querySelector('.slideshow-slide_0 .slide-overlay__title')
    const elOverlayDesc = document.querySelector('.slideshow-slide_0 .slide-overlay__desc')
    const elCostTitle = document.querySelector('.slideshow-slide_0 .slideshow-cost__price')
    const elCostLine = document.querySelector('.slideshow-slide_0 .slideshow-cost__line')

    const tl = new TimelineLite({
      paused: true
    })

    if (window.matchMedia("(min-width: 1600px)").matches) {
      tl.add(pulsarAnimation(elPulsar))

      tl.add(TweenLite.fromTo(elOverlayTitle, .3, { opacity: 0 }, { opacity: 1 }))
      tl.add(TweenLite.fromTo(elOverlayDesc, .3, { opacity: 0, y: "-100%" }, { opacity: 1, y: "0%" }))
    }

    tl.add(TweenLite.fromTo(elCostTitle, .4, { x: "-100%" }, { x: "0%" }), '+=.2')
    tl.add(TweenLite.fromTo(elCostLine, .5, { x: "-100%" }, { x: "0%" }))

    return tl
  }

  getSecondSlideAnimations() {
    const elDesc = document.querySelector('.slideshow-slide_1 .slideshow-smalldesc')
    const elPulsar = document.querySelector('.slideshow-slide_1 .pulsar')
    const elOverlayTitle = document.querySelector('.slideshow-slide_1 .slide-overlay__title')
    const elOverlayDesc = document.querySelector('.slideshow-slide_1 .slide-overlay__desc')
    const elCostTitle = document.querySelector('.slideshow-slide_1 .slideshow-cost__price')
    const elCostLine = document.querySelector('.slideshow-slide_1 .slideshow-cost__line')

    const tl = new TimelineLite({
      paused: true
    })

    if (window.matchMedia("(min-width: 1600px)").matches) {
      tl.add(TweenLite.fromTo(elDesc, 1, { opacity: 0 }, { opacity: 1 }))

      tl.add(pulsarAnimation(elPulsar), '-=1')

      tl.add(TweenLite.fromTo(elOverlayTitle, .3, { opacity: 0 }, { opacity: 1 }))
      tl.add(TweenLite.fromTo(elOverlayDesc, .3, { opacity: 0, y: "-100%" }, { opacity: 1, y: "0%" }))
    }

    tl.add(TweenLite.fromTo(elCostTitle, .4, { x: "-100%" }, { x: "0%" }), '+=.2')
    tl.add(TweenLite.fromTo(elCostLine, .5, { x: "-100%" }, { x: "0%" }))

    return tl
  }

  getThirdSlideAnimations() {
    const elDesc = document.querySelector('.slideshow-slide_2 .slideshow-smalldesc')
    const elPulsar = document.querySelector('.slideshow-slide_2 .pulsar')
    const elOverlayDesc = document.querySelector('.slideshow-slide_2 .slide-overlay__desc')
    const elCostTitle = document.querySelector('.slideshow-slide_2 .slideshow-cost__price')
    const elCostLine = document.querySelector('.slideshow-slide_2 .slideshow-cost__line')

    const tl = new TimelineLite({
      paused: true
    })

    if (window.matchMedia("(min-width: 1600px)").matches) {
      tl.add(TweenLite.fromTo(elDesc, 1, { opacity: 0 }, { opacity: 1 }))

      tl.add(pulsarAnimation(elPulsar), '-=1')

      tl.add(TweenLite.fromTo(elOverlayDesc, .3, { opacity: 0, y: "-100%" }, { opacity: 1, y: "0%" }))
    }

    tl.add(TweenLite.fromTo(elCostTitle, .4, { x: "-100%" }, { x: "0%" }), '+=.2')
    tl.add(TweenLite.fromTo(elCostLine, .5, { x: "-100%" }, { x: "0%" }))

    return tl
  }

  getFourthSlideAnimations() {
    const elDesc = document.querySelector('.slideshow-slide_3 .slideshow-smalldesc')
    const elPulsar = document.querySelector('.slideshow-slide_3 .pulsar')
    const elOverlayDesc = document.querySelector('.slideshow-slide_3 .slide-overlay__desc')
    const elCostTitle = document.querySelector('.slideshow-slide_3 .slideshow-cost__price')
    const elCostLine = document.querySelector('.slideshow-slide_3 .slideshow-cost__line')

    const tl = new TimelineLite({
      paused: true
    })

    if (window.matchMedia("(min-width: 1600px)").matches) {
      tl.add(TweenLite.fromTo(elDesc, 1, { opacity: 0 }, { opacity: 1 }))

      tl.add(pulsarAnimation(elPulsar), '-=1')

      tl.add(TweenLite.fromTo(elOverlayDesc, .3, { opacity: 0, y: "-100%" }, { opacity: 1, y: "0%" }))
    }

    tl.add(TweenLite.fromTo(elCostTitle, .4, { x: "-100%" }, { x: "0%" }), '+=.2')
    tl.add(TweenLite.fromTo(elCostLine, .5, { x: "-100%" }, { x: "0%" }))

    return tl
  }

  getFifthSlideAnimations() {
    const elPulsar = document.querySelector('.slideshow-slide_4 .pulsar')
    const elOverlayDesc = document.querySelector('.slideshow-slide_4 .slide-overlay__desc')
    const elCostTitle = document.querySelector('.slideshow-slide_4 .slideshow-cost__price')
    const elCostLine = document.querySelector('.slideshow-slide_4 .slideshow-cost__line')

    const tl = new TimelineLite({
      paused: true
    })

    if (window.matchMedia("(min-width: 1600px)").matches) {
      tl.add(pulsarAnimation(elPulsar), '-=1')

      tl.add(TweenLite.fromTo(elOverlayDesc, .3, { opacity: 0, y: "-100%" }, { opacity: 1, y: "0%" }))
    }

    tl.add(TweenLite.fromTo(elCostTitle, .4, { x: "-100%" }, { x: "0%" }), '+=.2')
    tl.add(TweenLite.fromTo(elCostLine, .5, { x: "-100%" }, { x: "0%" }))

    return tl
  }
}