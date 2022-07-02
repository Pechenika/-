<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\models\Payment;
use app\modules\admin\models\Product;
use app\modules\admin\models\Shop;
use app\modules\admin\models\Delivery;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\CompletedOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="completed-order-form" style="text-align: left; padding-left: 40px; padding-right: 40px; background: #fff;">

    <?php $form = ActiveForm::begin(); ?>
 
    <?= $form->field($model, 'adress')->textInput(['maxlength' => true])->label('Адрес'); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
