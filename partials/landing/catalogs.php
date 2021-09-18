<div class="catalogs">
    <div class="catalogs__title">Хотите посмотреть каталоги?</div>
    <div class="catalogs__desc">Введите Вашу электронную почту, и мы пришлем Вам каталоги с мебелью</div>
    <form action="/wp-json/contact-form-7/v1/contact-forms/8/feedback" class="catalogs__form">
        <div class="catalogs__grid">
            <div class="catalogs__cell">
                <label class="form-input">
                    <span class="form-input__label">Ваше имя</span>
                    <input type="text" class="form-input__value" name="your-name">
                </label>
            </div>
            <div class="catalogs__cell">
                <label class="form-input">
                    <span class="form-input__label">Ваш mail</span>
                    <span class="form-input__mask">___________@_____</span>
                    <input type="text" class="form-input__value" name="your-email">
                </label>
            </div>
            <div class="catalogs__cell">
                <button class="form-submit form-submit_red">
                    <span class="form-submit__inner">
                        <span>Получить<br>каталоги</span>
                        <span class="form-submit__arrow"></span>
                    </span>
                </button>
            </div>
        </div>
        <label class="catalogs__rights">
            <input type="checkbox" class="form-checkbox form-checkbox_light" name="rules" value="1"> Прочитал(-а) <a href="<?php the_permalink(3) ?>" target="_blank">Пользовательское соглашение</a> и соглашаюсь с <a href="<?php the_permalink(14) ?>" target="_blank">Политикой обработки персональных данных</a>
        </label>
    </form>
</div>
