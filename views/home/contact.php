<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\captcha\Captcha;

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
.site-contact {
        display: flex;
    }
@media (max-width: 767px) {
    .site-contact {
        display: block;
    }
}
</style>
<h1 style="margin-bottom: 23px; padding-left: 40px;"><?= Html::encode($this->title) ?></h1>
<div class="site-contact" style="padding-left: 40px; padding-right: 40px;
    text-align: justify;
    padding-bottom: 100px; background-color: #fff;">
   

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        

       
          <p style="margin-right: 85px;">
       Адреса торговых площадок:<br>
1. Ленинградская область, Всеволожский район ,поселок. Романовка, шоссе Дорога Жизни, д. 63.<br>
тел.:8(905)219-55-22 Ирина,  8(911)199-90-99 Света.<br>
Площадка работает с 25 апреля до 1 июля с 8.00 до 20.00<br>
без обеда и выходных<br><br>
2.Садово-фермерский центр «Дача-сервис»в Девяткино, Привокзальная пл., д. 3  Метро «Девяткино»<br>
Пос. Мурино.<br>
тел.:8(911)910-50-25 Татьяна.<br>
Площадка работает с 25 апреля до 1 июля  с 10.00 до 18.00<br>
без обеда и выходных.<br><br>
3. Ж/Д ДУНАЙ. <br>
тел.:8(905)267-12-77 Валера.<br>
Площадка работает с 9 мая до 1 июля с 8.00 до 20.00<br>
без обеда и выходных.<br><br>
4. г. Санкт-Петербург, Правобережный рынок, ул. Дыбенко 16<br>
тел.:8(921)444-49-09 Наташа.<br>
Площадка работает с 8 мая до 10 июня с 9.00 до 18.00<br>
без обеда и выходных.<br>
    </p>
       

    <?php else: ?>

        <p style="margin-right: 85px;">
       Адреса торговых площадок:<br>
1. Ленинградская область, Всеволожский район ,поселок. Романовка, шоссе Дорога Жизни, д. 63.<br>
тел.:8(905)219-55-22 Ирина,  8(911)199-90-99 Света.<br>
Площадка работает с 25 апреля до 1 июля с 8.00 до 20.00<br>
без обеда и выходных<br><br>
2.Садово-фермерский центр «Дача-сервис»в Девяткино, Привокзальная пл., д. 3  Метро «Девяткино»<br>
Пос. Мурино.<br>
тел.:8(911)910-50-25 Татьяна.<br>
Площадка работает с 25 апреля до 1 июля  с 10.00 до 18.00<br>
без обеда и выходных.<br><br>
3. Ж/Д ДУНАЙ. <br>
тел.:8(905)267-12-77 Валера.<br>
Площадка работает с 9 мая до 1 июля с 8.00 до 20.00<br>
без обеда и выходных.<br><br>
4. г. Санкт-Петербург, Правобережный рынок, ул. Дыбенко 16<br>
тел.:8(921)444-49-09 Наташа.<br>
Площадка работает с 8 мая до 10 июня с 9.00 до 18.00<br>
без обеда и выходных.<br>
    </p>

    <?php endif; ?>
    <!--iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A4d2857461847afa11b73251e52772dab077e0c11a8d9068b4e2b782a4ca9ba69&amp;source=constructor" class="col-lg-4"  height="393" frameborder="0"></iframe-->
    <iframe style="padding: 0px;
    border: 1px solid #ddd;" src="https://yandex.ru/map-widget/v1/?um=constructor%3A4d2857461847afa11b73251e52772dab077e0c11a8d9068b4e2b782a4ca9ba69&amp;source=constructor" class="col-lg-4"  height="393" frameborder="0"></iframe>
</div>
