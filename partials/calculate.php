<?php
$isWardrobe = in_array(3, wp_get_post_terms(get_the_ID(), 'product_category', ['fields' => 'ids']));
$isKitchen = in_array(2, wp_get_post_terms(get_the_ID(), 'product_category', ['fields' => 'ids']));

$prices = [
  'Шкаф-купе | Зеркальный' => 26600,
  'Шкаф-купе | С пленкой Oracal' => 31400,
  'Шкаф-купе | МДФ в пленке ПВХ' => 51200,

  'Шкаф на петлях | Зеркальный' => 27600,
  'Шкаф на петлях | С пленкой Oracal' => 32400,
  'Шкаф на петлях | МДФ в пленке ПВХ' => 52200,

  'МДФ в пленке ПВХ' => 44400,
  'В пластике ALVIC' => 49600,
  'Эмаль' => 63800,
];
?>

<div id="calculate" class="calculate js-calc-form" data-prices='<?php echo json_encode($prices) ?>'> <!-- data-element-class="slbContentEl" -->
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

    <?php if ($isWardrobe || $isKitchen) : ?>
      <div class="calculate-info">
        <div class="calculate-info__title">
          Выберите параметры
        </div>
        <div class="calculate-info__desc">
          <?php if ($isWardrobe) : ?>
            стоимость за погонный метр измениться от выбора вида шкафа, материала фасада и выбранных метров!
          <?php endif; ?>
          <?php if ($isKitchen) : ?>
            стоимость за погонный метр измениться от выбора материала фасада кухни и выбранных метров!
          <?php endif; ?>
        </div>
      </div>

      <div class="calculate-main">
        <?php if ($isWardrobe) : ?>
          <div class="calculate-main__row">
            <div class="calculate-field">
              <div class="calculate-field__label">
                Вид шкафа
              </div>
              <div class="calculate-field__control">
                <select name="view" class="calculate-select js-calc-form-view">
                  <option value="Шкаф-купе">Шкаф-купе</option>
                  <option value="Шкаф на петлях">Шкаф на петлях</option>
                </select>
              </div>
            </div>
          </div>
        <?php endif; ?>

        <?php if ($isWardrobe) : ?>
          <div class="calculate-main__row">
            <div class="calculate-field">
              <div class="calculate-field__label">
                Материал фасада
              </div>
              <div class="calculate-field__control">
                <select name="material" class="calculate-select js-calc-form-material">
                  <option value="Зеркальный">Зеркальный</option>
                  <option value="С пленкой Oracal">С пленкой Oracal</option>
                  <option value="МДФ в пленке ПВХ">МДФ в пленке ПВХ</option>
                </select>
              </div>
            </div>
          </div>
        <?php endif; ?>

        <?php if ($isKitchen) : ?>
          <div class="calculate-main__row">
            <div class="calculate-field">
              <div class="calculate-field__label">
                Материал фасада
              </div>
              <div class="calculate-field__control">
                <select name="material" class="calculate-select js-calc-form-material">
                  <option value="МДФ в пленке ПВХ">МДФ в пленке ПВХ</option>
                  <option value="В пластике ALVIC">В пластике ALVIC</option>
                  <option value="Эмаль">Эмаль</option>
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
              <select name="footage" class="calculate-select js-calc-form-footage">
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
          <?php if ($isWardrobe) : ?>
            Стоимость Вашего шкафа от:
          <?php endif; ?>
          <?php if ($isKitchen) : ?>
            Стоимость Вашей кухни от:
          <?php endif; ?>
          <span class="calculate-result__cost__price js-calc-form-price"></span> руб.
          <input type="hidden" name="price" value="" />
        </div>
        <div class="calculate-result__desc">
          <?php if ($isWardrobe) : ?>
            Цена за погонный метр измениться от выбора вида шкафа, материала фасада и выбранных метров!
          <?php endif; ?>
          <?php if ($isKitchen) : ?>
            Цена за погонный метр измениться от выбора материала фасада кухни и выбранных метров!
          <?php endif; ?>
        </div>
      </div>
    <?php endif; ?>

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