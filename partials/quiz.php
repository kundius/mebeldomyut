<div id="quiz" class="quiz" data-element-class="slbQuiz" data-furniture='<?php echo json_encode(get_field('furniture', 477)) ?>'>
	<div class="quiz__steps">
		<div class="quiz__left">
			<div class="quiz__title">
				Выберите стиль
			</div>
			<div class="quiz-progress">
				<div class="quiz-progress__text">
					Готово: <span>0%</span>
				</div>
				<div class="quiz-progress__scale-bg">
					<div class="quiz-progress__scale-fq"></div>
				</div>
			</div>
			<div class="quiz-body">
				<div class="quiz-cards">
					<div class="quiz-cards__item">
						<input type="radio" value="1" name="check" id="check-1" class="quiz-cards__input" />
						<label for="check-1" class="quiz-card">
							<div class="quiz-card__image">
								<img src="/wp-content/uploads/2019/02/2-1-300x300.jpg" />
							</div>
							<div class="quiz-card__foot">
								<div class="quiz-card__check"></div>
								<div class="quiz-card__title">Кухня</div>
							</div>
						</label>
					</div>
					<div class="quiz-cards__item">
						<input type="radio" value="2" name="check" id="check-2" class="quiz-cards__input" />
						<label for="check-2" class="quiz-card">
							<div class="quiz-card__image">
								<img src="/wp-content/uploads/2019/02/7-1-300x300.jpg" />
							</div>
							<div class="quiz-card__foot">
								<div class="quiz-card__check"></div>
								<div class="quiz-card__title">Шкаф</div>
							</div>
						</label>
					</div>
					<div class="quiz-cards__item">
						<input type="radio" value="3" name="check" id="check-3" class="quiz-cards__input" />
						<label for="check-3" class="quiz-card">
							<div class="quiz-card__image">
								<img src="/wp-content/uploads/2019/02/7-1-300x300.jpg" />
							</div>
							<div class="quiz-card__foot">
								<div class="quiz-card__check"></div>
								<div class="quiz-card__title">Шкаф</div>
							</div>
						</label>
					</div>
					<div class="quiz-cards__item">
						<input type="radio" value="4" name="check" id="check-4" class="quiz-cards__input" />
						<label for="check-4" class="quiz-card">
							<div class="quiz-card__image">
								<img src="/wp-content/uploads/2019/02/7-1-300x300.jpg" />
							</div>
							<div class="quiz-card__foot">
								<div class="quiz-card__check"></div>
								<div class="quiz-card__title">Шкаф</div>
							</div>
						</label>
					</div>
				</div>

				<div class="quiz-rows">
					<div class="quiz-rows__items">
						<input type="radio" value="1" name="check-2" id="check-2-1" class="quiz-rows__input" />
						<label class="quiz-row" for="check-2-1">
							<div class="quiz-row__check"></div>
							<div class="quiz-row__title">Купе</div>
						</label>
						<input type="radio" value="2" name="check-2" id="check-2-2" class="quiz-rows__input" />
						<label class="quiz-row" for="check-2-2">
							<div class="quiz-row__check"></div>
							<div class="quiz-row__title">Распашной</div>
						</label>
						<input type="radio" value="3" name="check-2" id="check-2-3" class="quiz-rows__input" />
						<label class="quiz-row" for="check-2-3">
							<div class="quiz-row__check"></div>
							<div class="quiz-row__title">Встроенный</div>
						</label>
					</div>
					<div class="quiz-rows__title">
						Выберите вариант ответа слева
					</div>
				</div>
			</div>
			<div class="quiz-nav">
				<button class="quiz-nav__prev">
					<div>
						<span></span>Назад
					</div>
				</button>
				<button class="quiz-nav__next">
					<div>
						Дальше<span></span>
					</div>
				</button>
			</div>
		</div>
		<div class="quiz__right">
			<div class="quiz-discount">
				<div class="quiz-discount__text">
					Ваша скидка:
				</div>
				<div class="quiz-discount__count">
					0%
				</div>
			</div>
			<div class="quiz-catalog quiz-catalog-first">
				<div class="quiz-catalog__text">Каталог мебели <span><?php echo (date('Y') - 1) ?></span></div>
				<div class="quiz-catalog__image"></div>
				<div class="quiz-catalog__lock"></div>
			</div>
			<div class="quiz-catalog quiz-catalog-second">
				<div class="quiz-catalog__text">Каталог мебели <span><?php echo date('Y') ?></span></div>
				<div class="quiz-catalog__image"></div>
				<div class="quiz-catalog__lock"></div>
			</div>
		</div>
	</div>
	<div class="quiz-finish">
		<div class="quiz-finish__left">
			<div class="quiz-finish__title">
				Мы подобрали мебель для вас.
			</div>
			<div class="quiz-progress">
				<div class="quiz-progress__text">
					Готово: <span>95%</span>
				</div>
				<div class="quiz-progress__scale-bg">
					<div class="quiz-progress__scale-fq quiz-progress__scale-fq_arrow" style="width: 95%"></div>
				</div>
			</div>
			<div class="quiz-finish__desc">
				Остался всего 1 шаг:
			</div>
			<div class="grid">
				<div class="quiz-finish__contacts">
					Свяжитесь с нами по тел: <strong><?php the_field('phone', 'option') ?></strong><br>
					или оставьте контактные данные для связи: 
				</div>
				<div class="quiz-finish__form">
					<form action="/wp-json/contact-form-7/v1/contact-forms/518/feedback" class="quiz-form js-form">
						<input type="hidden" name="your-options" value="" />
						<div class="grid">
							<div class="quiz-form__cell">
								<label class="form-input">
									<span class="form-input__label">Ваш телефон</span>
									<span class="form-input__mask">+ 7 (___) ___-__-__</span>
									<input type="text" class="form-input__value" data-imask="+{7} (000) 000-00-00" name="your-phone">
								</label>
							</div>
							<div class="quiz-form__cell">
								<button class="form-submit form-submit_red">
									<span class="form-submit__inner">
										<span>получить&nbsp;расчет,<br>скидку&nbsp;и&nbsp;каталоги</span>
										<span class="form-submit__arrow"></span>
									</span>
								</button>
							</div>
						</div>
						<label class="quiz-form__rights">
							<input type="checkbox" class="form-checkbox form-checkbox_light" name="rules" value="1"> Прочитал(-а) <a href="/privacy-policy" target="_blank">Пользовательское соглашение</a> и соглашаюсь с <a href="/polzovatelskoe-soglashenie" target="_blank">Политикой обработки персональных данных</a>
						</label>
					</form>
				</div>
			</div>
		</div>
		<div class="quiz-finish__right">
			<div class="quiz-finish__bonus">
				Ваши бонусы:
			</div>
			<div class="quiz-discount quiz-discount_full">
				<div class="quiz-discount__text">
					Cкидка:
				</div>
				<div class="quiz-discount__count">
					20%
				</div>
			</div>
			<div class="quiz-catalog quiz-catalog_unlocked">
				<div class="quiz-catalog__text">Каталог мебели <span><?php echo (date('Y') - 1) ?></span></div>
				<div class="quiz-catalog__image"></div>
				<div class="quiz-catalog__lock"></div>
			</div>
			<div class="quiz-catalog quiz-catalog_unlocked">
				<div class="quiz-catalog__text">Каталог мебели <span><?php echo date('Y') ?></span></div>
				<div class="quiz-catalog__image"></div>
				<div class="quiz-catalog__lock"></div>
			</div>
		</div>
	</div>
</div>