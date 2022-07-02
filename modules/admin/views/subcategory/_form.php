<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\Category;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Subcategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subcategory-form" style="text-align: left; background: #fff; padding-left: 40px;">

    <?php $form = ActiveForm::begin(); ?>

    <!--?= $form->field($model, 'id')->textInput() ?-->

    <?= $form->field($model, 'name')->textInput(['rows' => 6, 'placeholder'=> 'Название *'])->label(false); ?>
    
    <?= $form->field($model, 'id_parent')->dropDownList(ArrayHelper::map(Category::find()->all(), 'id', 'name'))->label('Категория * '); ?>
	
	<br>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Создать подкатегорию'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
