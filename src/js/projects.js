import { TweenLite, TimelineLite } from 'gsap'
import { outCube } from './easing'
import SimpleLightbox from 'simple-lightbox'
import forEach from 'lodash/forEach'

export default class Projects {
  constructor(wrapper) {
    this.images = JSON.parse(wrapper.dataset.projects)
    this.wrapper = wrapper
    this.main = wrapper.querySelector('.projects-main')
    this.thumbs = wrapper.querySelectorAll('.projects-thumb')
    this.controls = wrapper.querySelectorAll('[data-projects-control]')

    this.active = null

    this.show(0)

    this.init()
  }

  init() {
    forEach(this.controls, el => {
      el.addEventListener('click', e => {
        e.preventDefault()

        const value = el.dataset.projectsControl
        if (value instanceof Number) {
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

    forEach(this.thumbs, (el, index) => {
      el.addEventListener('click', e => {
        let image = this.active
        for (let i = 0; i <= index; i++) {
          image = this.getNextImage(image)
        }
        SimpleLightbox.open({
          startAt: image,
          items: this.images.map(row => row.image),
          beforeSetContent: this.beforeSetContent
        })
      })
    })

    this.main.addEventListener('click', e => {
      SimpleLightbox.open({
        startAt: this.active,
        items: this.images.map(row => row.image),
        beforeSetContent: this.beforeSetContent
      })
    })
  }

  beforeSetContent($content, lightbox) {
    if (!lightbox.$eraser) {
      const slbEraser = document.createElement('div')
      const eraser = document.createElement('div')
      const eraserLeft = document.createElement('div')
      const eraserRight = document.createElement('div')
      const eraserCenter = document.createElement('div')
      slbEraser.classList.add('slbEraser')
      eraser.classList.add('eraser', 'eraser_dark')
      eraserLeft.classList.add('eraser__left')
      eraserRight.classList.add('eraser__right')
      eraserCenter.classList.add('eraser__center')
      slbEraser.appendChild(eraser)
      eraser.appendChild(eraserLeft)
      eraser.appendChild(eraserRight)
      eraser.appendChild(eraserCenter)
      lightbox.$content.parentNode.appendChild(slbEraser)
      eraserLeft.addEventListener('click', () => lightbox.prev())
      eraserRight.addEventListener('click', () => lightbox.next())
      lightbox.$eraser = slbEraser
    }
  }

  show(index, direction = 'forward') {
    if (this.active === index) return false

    if (this.active === null) {
      this.main.style.backgroundImage = `url(${this.images[index].image})`
      this.main.style.backgroundPosition = `50% 50%`

      this.thumbs[0].style.backgroundImage = `url(${this.images[this.getNextImage(index)].image})`
      this.thumbs[0].style.backgroundPosition = `50% 50%`

      this.thumbs[1].style.backgroundImage = `url(${this.images[this.getNextImage(this.getNextImage(index))].image})`
      this.thumbs[1].style.backgroundPosition = `50% 50%`
    } else {
      TweenLite.to(this.wrapper, .3, {
        onUpdateParams: [this, index, direction],
        onUpdate(self, index) {
          const width = self.main.offsetWidth
          const widthNext = self.thumbs[0].offsetWidth
          const widthAfterNext = self.thumbs[1].offsetWidth
          let progress = this.progress()

          if (direction === 'forward') {
            self.main.style.backgroundImage = `url(${self.images[self.getPreviousImage(index)].image}), url(${self.images[index].image})`
            self.main.style.backgroundPosition = `${width*progress*-1}px 50%, ${width-width*progress}px 50%`

            self.thumbs[0].style.backgroundImage = `url(${self.images[index].image}), url(${self.images[self.getNextImage(index)].image})`
            self.thumbs[0].style.backgroundPosition = `${widthNext*progress*-1}px 50%, ${widthNext-widthNext*progress}px 50%`

            self.thumbs[1].style.backgroundImage = `url(${self.images[self.getNextImage(index)].image}), url(${self.images[self.getNextImage(self.getNextImage(index))].image})`
            self.thumbs[1].style.backgroundPosition = `${widthAfterNext*progress*-1}px 50%, ${widthAfterNext-widthAfterNext*progress}px 50%`
          } else {
            self.main.style.backgroundImage = `url(${self.images[index].image}), url(${self.images[self.getNextImage(index)].image})`
            self.main.style.backgroundPosition = `${width*-1 + width*progress}px 50%, ${width*progress}px 50%`

            self.thumbs[0].style.backgroundImage = `url(${self.images[self.getNextImage(index)].image}), url(${self.images[self.getNextImage(self.getNextImage(index))].image})`
            self.thumbs[0].style.backgroundPosition = `${widthNext*-1 + widthNext*progress}px 50%, ${widthNext*progress}px 50%`

            self.thumbs[1].style.backgroundImage = `url(${self.images[self.getNextImage(self.getNextImage(index))].image}), url(${self.images[self.getNextImage(self.getNextImage(self.getNextImage(index)))].image})`
            self.thumbs[1].style.backgroundPosition = `${widthAfterNext*-1 + widthAfterNext*progress}px 50%, ${widthAfterNext*progress}px 50%`
          }
        }
      })
    }

    this.active = index
  }

  previous() {
    if (this.active === 0) {
      this.show(this.images.length - 1, 'backward')
    } else {
      this.show(this.active - 1, 'backward')
    }
  }

  next() {
    if (this.images.length - 1 > this.active) {
      this.show(this.active + 1, 'forward')
    } else {
      this.show(0, 'forward')
    }
  }

  getPreviousImage(index) {
    if (index === 0) {
      return this.images.length - 1
    } else {
      return index - 1
    }
  }

  getNextImage(index) {
    if (index + 1 > this.images.length - 1) {
      return 0
    } else {
      return index + 1
    }
  }
}