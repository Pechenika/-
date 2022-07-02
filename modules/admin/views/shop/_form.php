<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Shop */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shop-form" style="text-align: left;  background: #fff; padding-left: 40px; padding-bottom: 40px;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'adress')->textInput(['maxlength' => true])->label('Адрес'); ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true])->widget(\yii\widgets\MaskedInput::className(), [
  'mask' => '+7 (999) 999 - 99 - 99',
])->label('Телефон'); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Добавить магазин'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
