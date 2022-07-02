<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\widgets\ActiveField;

$form = ActiveForm::begin([
	'id' => 'form-id',
    'method'=> 'post',
	'options' => ['class' => 'form-class'],
]
) ?>

<?= $form->field($model, 'surname')->textInput()?>
<?= $form->field($model, 'name')->textInput(); ?>
<?= $form->field($model, 'middle_name')->textInput(); ?>
<?= $form->field($model, 'document_seria')->textInput(); ?>
<?= $form->field($model, 'document_number')->textInput(); ?>
<?= $form->field($model, 'date_burn')->input('date')?>
<?= $form->field($model, 'gender')->radioList([
        'a' => 'woman',
        'b' => 'man',
    ]);?>
<?= $form->field($model, 'phone')->textInput(); ?>
<?= $form->field($model, 'agree')->checkboxList([
        '1' => 'I agree to the processing of personal data',
    ])->label('');?>
<?= Html::submitButton('OK', ['class' => 'btn btn-primary'])?>
<?php ActiveForm::end() ?>