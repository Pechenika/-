<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\Category;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form" style="padding-left: 40px; padding-right: 40px; background: #fff;">

    <?php $form = ActiveForm::begin(); 
        $params = [
            //'prompt' => 'not select',
            'multiple' => 'multiple'
        ];
    ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder'=> 'Название товара *'])->label(false) ?>
	<p>Обложка категории* :</p>
    <?= $form->field($model, 'url')->fileInput()->label(false) ?>
	<br>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Создать категорию'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
