import getCoords from './getCoords'

export default function() {
  const container = document.querySelector('body')
  const departureOrder = document.querySelector('.js-departure-order')
  const materialsFirst = document.querySelector('.js-materials-first')
  const engravingFirst = document.querySelector('.js-engraving-first')
  const videoFirst = document.querySelector('.js-video-first')
  const special = document.querySelector('.js-special')
  const gradients = []
  const backgrounds = []

  if (departureOrder) {
    const departureOrderCoords = getCoords(departureOrder)
    gradients.push({
      color: '#858582',
      to: `${departureOrderCoords.top + departureOrderCoords.height / 2}px`
    })
  }

  if (materialsFirst) {
    const materialsFirstCoords = getCoords(materialsFirst)
    gradients.push({
      color: '#e4e8eb',
      to: `${materialsFirstCoords.top + materialsFirstCoords.height / 2}px`
    })
  }

  if (engravingFirst) {
    const engravingFirstCoords = getCoords(engravingFirst)
    gradients.push({
      color: '#a3a3a0',
      to: `${engravingFirstCoords.top + engravingFirstCoords.height / 2}px`
    })
  }

  if (videoFirst) {
    const videoFirstCoords = getCoords(videoFirst)
    gradients.push({
      color: '#e0e0e0',
      to: `${videoFirstCoords.top + videoFirstCoords.height / 2}px`
    })
  }

  if (special) {
    const specialCoords = getCoords(special)
    gradients.push({
      color: '#fffffa',
      to: `${specialCoords.top + specialCoords.height / 2}px`
    })
  }

  gradients.push({
    color: '#f0f0f1',
    to: '100%'
  })

  let strings = []
  let from = 0
  gradients.forEach(({ color, to }) => {
    strings.push(`${color} ${from}, ${color} ${to}`)
    from = to
  })

  if (departureOrder) {
    const departureOrderCoords = getCoords(departureOrder)
    backgrounds.push(`url(/wp-content/themes/mebeldomyut/assets/bg-benefits.jpg) no-repeat 50% ${departureOrderCoords.top + departureOrderCoords.height / 2}px`)
    backgrounds.push(`linear-gradient(to bottom, ${strings.join(', ')})`)
  }

  container.style.background = backgrounds.join(', ')
}