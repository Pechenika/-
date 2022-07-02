<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\CompletedOrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="completed-order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_payment') ?>

    <?= $form->field($model, 'id_product') ?>

    <?= $form->field($model, 'count') ?>

    <?= $form->field($model, 'id_shop') ?>

    <?php // echo $form->field($model, 'total_price') ?>

    <?php // echo $form->field($model, 'name_user') ?>

    <?php // echo $form->field($model, 'surname_user') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'id_delivery') ?>

    <?php // echo $form->field($model, 'note') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'adress') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
