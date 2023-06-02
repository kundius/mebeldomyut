<?php
$isWardrobe = in_array(wp_get_post_categories(3, get_the_ID(), ['fields' => 'ids']));
$isKitchen = in_array(wp_get_post_categories(2, get_the_ID(), ['fields' => 'ids']));

// $isWardrobe = 
// kitchen
// $views = [];
// $materials = [];
// $title = "Заявка на расчет стоимости";
// $title = "Заявка на расчет стоимости";

?>

<div id="calculate" class="calculate"> <!-- data-element-class="slbContentEl" -->
  <div class="calculate__title">
    <?php if ($isWardrobe) : ?>
      Стоимость изготовления шкафа
    <?php elseif ($isKitchen) : ?>
      Стоимость изготовления кухни
    <?php else : ?>
      Заявка на расчет
    <?php endif; ?>
  </div>

  <form action="/wp-json/contact-form-7/v1/contact-forms/1122/feedback" data-reach-goal="otpravka_stoimost" method="post" class="calculate-form js-form">
    <div class="calculate-info">
      <div class="calculate-info__title">
        Выберите параметры
      </div>
      <div class="calculate-info__desc">
        стоимость за погонный метр измениться от выбора вида шкафа, материала фасада и выбранных метров!
      </div>
    </div>

    <div class="calculate-main">
      <?php if (count($views) > 0) : ?>
        <div class="calculate-main__row">
          <div class="calculate-field">
            <div class="calculate-field__label">
              Вид шкафа
            </div>
            <div class="calculate-field__control">
              <select name="view" class="calculate-select">
                <?php foreach ($views as $view) : ?>
                  <option value="<?php echo $view ?>"><?php echo $view ?></option>
                <?php endforeach; ?>
                <!-- <option value="Шкаф на петлях">Шкаф на петлях</option> -->
              </select>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <?php if (count($material) > 0) : ?>
        <div class="calculate-main__row">
          <div class="calculate-field">
            <div class="calculate-field__label">
              Материал фасада
            </div>
            <div class="calculate-field__control">
              <select name="material" class="calculate-select">
                <?php foreach ($materials as $material) : ?>
                  <option value="<?php echo $material ?>"><?php echo $material ?></option>
                <?php endforeach; ?>
                <!-- <option value="Зеркальный">Зеркальный</option>
              <option value="С пленкой Oracal">С пленкой Oracal</option>
              <option value="МДФ в пленке ПВХ">МДФ в пленке ПВХ</option> -->
              </select>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <div class="calculate-main__row">
        <div class="calculate-field">
          <div class="calculate-field__label">
            Метраж мебели
          </div>
          <div class="calculate-field__control">
            <select name="footage" class="calculate-select">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
            </select>
          </div>
        </div>
      </div>
    </div>

    <div class="calculate-result">
      <div class="calculate-result__cost">
        Стоимость Вашего шкафа от: <span class="calculate-result__cost__price">36 900</span> руб.
      </div>
      <div class="calculate-result__desc">
        Цена за погонный метр измениться от выбора вида шкафа, материала фасада и выбранных метров!
      </div>
    </div>

    <div class="calculate-contacts">
      <div class="calculate-contacts__row">
        <div class="calculate-field">
          <div class="calculate-field__label">
            Ваш телефон:
          </div>
          <div class="calculate-field__control">
            <span class="wpcf7-form-control-wrap your-phone">
              <input type="text" class="calculate-input" name="your-phone">
            </span>
          </div>
        </div>
      </div>

      <div class="calculate-contacts__row">
        <div class="calculate-field">
          <div class="calculate-field__label">
            Эл. почта:
          </div>
          <div class="calculate-field__control">
            <input type="text" class="calculate-input" name="your-email">
          </div>
        </div>
      </div>
    </div>

    <div class="calculate-end">
      <div class="calculate-end__title">
        Окончательная стоимость изготовления зависит от материалов, крепежа, фурнитуры и т. д.
      </div>
      <div class="calculate-end__desc">
        Свяжитесь с нами для выбора материалов!
      </div>
    </div>

    <div class="calculate-submit">
      <button class="calculate-submit__button">
        Отправить заявку на просчет
      </button>
    </div>

    <div class="calculate-form-result wpcf7-form-result">
      <div class="calculate-form-result__message wpcf7-form-result-message"></div>
      <button type="button" class="calculate-form-result__reset wpcf7-form-result-reset">Закрыть</button>
    </div>
  </form>
</div>