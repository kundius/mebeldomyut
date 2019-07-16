import map from 'lodash/map'
import forEach from 'lodash/forEach'

function createCards(items, checked) {
	let output = map(items, (item, i) => (`
<div class="quiz-cards__item">
<input type="radio" value="${i}" name="options" data-title="${item.title}" id="option-${i}" class="quiz-cards__input" ${checked == i ? 'checked' : ''} />
<label for="option-${i}" class="quiz-card">
<div class="quiz-card__image">
<img src="${item.image}" />
</div>
<div class="quiz-card__foot">
<div class="quiz-card__check"></div>
<div class="quiz-card__title">${item.title}</div>
</div>
</label>
</div>
`))

	return `
<div class="quiz-cards">
${output.join('')}
</div>
`
}

function createRows(items, checked) {
	let output = map(items, (item, i) => (`
<input type="radio" value="${i}" data-title="${item.title}" name="options" id="option-${i}" class="quiz-rows__input" ${checked == i ? 'checked' : ''} />
<label for="option-${i}" class="quiz-row">
<div class="quiz-row__check"></div>
<div class="quiz-row__title">${item.title}</div>
</label>
`))

	return `
<div class="quiz-rows">
<div class="quiz-rows__items">
${output.join('')}
</div>
<div class="quiz-rows__title">
Выберите вариант ответа слева
</div>
</div>
`
}

const quiz = document.querySelector('#quiz')
if (quiz) {
	let form = {}
	let selected = {}
	let step = null
	let question = null
	const data = JSON.parse(quiz.dataset.furniture)
	const steps = quiz.querySelector('.quiz__steps')
	const finish = quiz.querySelector('.quiz-finish')
	const input = quiz.querySelector('input[name="your-options"]')
	const body = steps.querySelector('.quiz-body')
	const title = steps.querySelector('.quiz__title')
	const prev = steps.querySelector('.quiz-nav__prev')
	const next = steps.querySelector('.quiz-nav__next')
	const updateInput = () => {
		let str = []
		for (let i = -1; i <= step; i++) {
			if (form[i]) {
				str.push(`${form[i].question}: ${form[i].answer}`)
			}
		}
		input.value = str.join('; ')
	}
	const showNext = () => {
		if (typeof selected[step] !== 'undefined') {
			next.disabled = false
		} else {
			next.disabled = true
		}
	}
	const addInputEvents = () => {
		forEach(quiz.querySelectorAll('input[name="options"]'), input => {
			input.addEventListener('change', (el) => {
				selected[step] = el.target.value
				form[step] = {
					question,
					answer: el.target.dataset.title
				}
				updateInput()
				showNext()
			})
		})
	}
	const setQuestion = (text) => {
		question = text
		title.innerHTML = text
	}
	const setProgress = (percent) => {
		steps.querySelector('.quiz-progress__text>span').innerHTML = `${percent}%`
		steps.querySelector('.quiz-progress__scale-fq').style.width = `${percent}%`
	}
	const setDiscount = (progress) => {
		let percent = 0
		if (progress > 0 && progress < 30) {
			percent = 2
			steps.querySelector('.quiz-catalog-first').classList.remove('quiz-catalog_unlocked')
		}
		if (progress > 30 && progress < 50) {
			percent = 4
			steps.querySelector('.quiz-catalog-first').classList.add('quiz-catalog_unlocked')
		}
		if (progress > 50 && progress < 70) {
			percent = 6
			steps.querySelector('.quiz-catalog-second').classList.remove('quiz-catalog_unlocked')
			steps.querySelector('.quiz-discount').classList.remove('quiz-discount_full')
		}
		if (progress > 70 && progress < 90) {
			percent = 8
			steps.querySelector('.quiz-catalog-second').classList.add('quiz-catalog_unlocked')
			steps.querySelector('.quiz-discount').classList.add('quiz-discount_full')
		}
		if (progress > 90) {
			percent = 10
		}
		steps.querySelector('.quiz-discount__count').innerHTML = `${percent}%`
	}
	const goStep = (index) => {
		step = index
		prev.disabled = step === -1
		if (step === -1) {
			setQuestion('Какую мебель вы выбираете?')
			body.innerHTML = createCards(data, selected[step] || null)
			setProgress(0)
			setDiscount(0)
		} else {
			if (!data[selected['-1']].questions || !data[selected['-1']].questions[step]) {
				steps.style.display = 'none'
				finish.style.display = 'flex'
			} else {
				let obj = data[selected['-1']].questions[step]
				let progress = (step+1)/(data[selected['-1']].questions.length+1)*100
				setQuestion(obj.title)
				if (obj.options_cards) {
					body.innerHTML = createCards(obj.options_cards, selected[step] || null)
				}
				if (obj.options_rows) {
					body.innerHTML = createRows(obj.options_rows, selected[step] || null)
				}
				setProgress(progress)
				setDiscount(progress)
			}
		}
		addInputEvents()
		showNext()
	}
	const goPreviousStep = () => {
		goStep(step-1)
	}
	const goNextStep = () => {
		goStep(step+1)
	}
	prev.addEventListener('click', goPreviousStep)
	next.addEventListener('click', goNextStep)
	goStep(-1)
	console.log(data)
}