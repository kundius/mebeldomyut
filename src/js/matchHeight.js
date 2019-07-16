import forEach from 'lodash/forEach'

forEach(document.querySelectorAll('[data-match-height]'), function(wrap) {
  const selectors = JSON.parse(wrap.dataset.matchHeight)
  forEach(selectors, function(selector) {
    const items = document.querySelectorAll(selector)
    let rowTop = null
    let rowElements = []
    let max = 0
    forEach(items, function(item) {
      const { top } = item.getBoundingClientRect()
      if (rowTop && rowTop === Math.round(top)) {
        rowElements.push(item)
        if (item.offsetHeight > max) {
          max = item.offsetHeight
        }
        forEach(rowElements, function(rowElement) {
          rowElement.style.minHeight = `${max}px`
        })
      } else {
        rowTop = Math.round(top)
        rowElements = [item]
      }
    })
  })
})
