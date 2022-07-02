<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\captcha\Captcha;

?>
<div class="site-contact">
        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin([
                'options'=> ['enctype'=> 'multipart/form-data'],
                'id' => 'registr-form'
                ]); 
                ?>
                    <?= $form->field($model, 'login')->textInput(['autofocus' => true]) ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                    <?= $form->field($model, 'confirm_password')->passwordInput() ?>
                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>

            </div>
        </div>
</div>