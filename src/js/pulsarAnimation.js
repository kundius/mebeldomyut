import { TimelineLite, Power2 } from 'gsap'

export default el => {
    const first = el.querySelector('span:nth-child(1)')
    const second = el.querySelector('span:nth-child(2)')
    const third = el.querySelector('span:nth-child(3)')
    const fourth = el.querySelector('span:nth-child(4)')

    const tl = new TimelineLite()

    tl.fromTo(first, .4, {
        width: 0,
        height: 0
    }, {
        width: 4,
        height: 4
    })

    tl.fromTo(second, .6, {
        scale: 0,
        opacity: 1
    }, {
        scale: 1,
        opacity: 1
    })

    tl.fromTo(second, .2, {
        opacity: 1
    }, {
        opacity: 0
    }, '-=.2')

    tl.fromTo(third, .4, {
        scale: 0,
        opacity: 1
    }, {
        scale: .5,
        opacity: 1
    }, '-=.6')

    tl.fromTo(third, .3, {
        opacity: 1
    }, {
        opacity: 0
    }, '-=.1')

    tl.fromTo(second, .6, {
        scale: 0,
        opacity: 1
    }, {
        scale: 1,
        opacity: 1
    })

    tl.fromTo(second, .2, {
        opacity: 1
    }, {
        opacity: 0
    }, '-=.2')

    tl.fromTo(third, .4, {
        scale: 0,
        opacity: 1
    }, {
        scale: .5,
        opacity: 1
    }, '-=.6')

    tl.fromTo(third, .3, {
        opacity: 1
    }, {
        opacity: 0
    }, '-=.1')

    tl.fromTo(second, .4, {
        scale: 0,
        opacity: 1
    }, {
        scale: .5,
        opacity: 1
    })

    tl.fromTo(third, .4, {
        scale: 0,
        opacity: 1
    }, {
        scale: .3,
        opacity: 1
    }, '-=.4')

    tl.fromTo(fourth, .8, {
        width: 0,
        opacity: 0
    }, {
        width: 60,
        opacity: 1,
        ease: Power2.easeOut
    }, '+=.2')

    return tl
}