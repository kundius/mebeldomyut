<div class="departure-order">
    <form action="/wp-json/contact-form-7/v1/contact-forms/6/feedback" class="departure-order__form js-form">
        <div class="departure-order__title">
            Выезд<span>*</span> <svg class="js-svg-text"><text x="50%" y="50%">дизайнера</text></svg> на&nbsp;дом
        </div>
        <div class="departure-order__grid">
            <div class="departure-order__cell">
                <label class="form-input">
                    <span class="form-input__label">Ваше имя</span>
                    <span class="form-input__placeholder">Как вы хотите, чтоб к вам обращались</span>
                    <input type="text" class="form-input__value" name="your-name">
                </label>
            </div>
            <div class="departure-order__cell">
                <label class="form-input">
                    <span class="form-input__label">Ваш телефон</span>
                    <span class="form-input__mask">+ 7 (___) ___-__-__</span>
                    <input type="text" class="form-input__value" data-imask="+{7} (000) 000-00-00" name="your-phone">
                </label>
            </div>
            <div class="departure-order__cell">
                <button class="form-submit">
                    <span class="form-submit__inner">
                        <span>Хочу, чтобы</span>
                        <span class="form-submit__arrow"></span>
                        <span>дизайнер&nbsp;приехал<span>
                    </span>
                </button>
            </div>
        </div>
        <label class="departure-order__rights">
            <input type="checkbox" class="form-checkbox" name="rules" value="1"> Прочитал(-а) <a href="<?php the_permalink(3) ?>" target="_blank">Пользовательское соглашение</a> и соглашаюсь с <a href="<?php the_permalink(14) ?>" target="_blank">Политикой обработки персональных данных</a>
        </label>
    </form>
</div>
