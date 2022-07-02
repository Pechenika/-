<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use app\modules\admin\models\Shop;
use app\modules\admin\models\Subcategory;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form" style="text-align: left; padding-left: 40px; padding-right: 40px; background: #fff;">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder'=> 'Название *'])->label(false);  ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true, 'placeholder'=> 'Описание *'])->label(false);  ?>

    <?= $form->field($model, 'price')->textInput(['placeholder'=> 'Стоимость *'])->label(false);  ?>
	<?= $form->field($model, 'price_opt')->textInput(['placeholder'=> 'Стоимость при покупке от 100 штук *'])->label(false);  ?>
	<?= $form->field($model, 'count')->textInput(['placeholder'=> 'Количество *'])->label(false);  ?>
	<?= $form->field($model, 'opt_count')->textInput(['placeholder'=> 'Оптовое количество *'])->label(false);  ?>
	<p>Изображение * :</p>
    <?= $form->field($model, 'image')->fileInput()->label(false);  ?>
	
	<?= $form->field($model, 'id_shop')->RadioList(ArrayHelper::map(Shop::find()->all(), 'id', 'adress'), ['separator' => '<br>'],)->label('Магазин *');?>
   
    <!--?= $form->field($model, 'id_shop')->dropDownList(ArrayHelper::map(Shop::find()->all(), 'id', 'adress'))->label('Магазин *');  ?-->
    <?= $form->field($model, 'id_subcategory')->dropDownList(ArrayHelper::map(Subcategory::find()->all(), 'id', 'name'))->label('Категория *'); ?>
	<br>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
