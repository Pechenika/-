<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'login')->textInput(['autofocus' => true])->label('Логин'); ?>

        <?= $form->field($model, 'password')->passwordInput()->label('Пароль'); ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"offset-lg-1 col-lg-3 custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>

        <div class="form-group">
            <div class="offset-lg-1 col-lg-11">
                <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

    
</div-->
<div class="htc__login__register bg__white ptb--130">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <ul class="login__register__menu" role="tablist">
                            <li role="presentation" class="login active"><a href="#login" role="tab" data-toggle="tab">Авторизация</a></li>
                            
                        </ul>
                    </div>
                </div>
                <!-- Start Login Register Content -->
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="htc__login__register__wrap">
                            <!-- Start Single Content -->
                            <div id="login" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
                                 <?php $form = ActiveForm::begin([
                                    'id' => 'login-form',
                                    'layout' => 'horizontal',
                                   
                                    'fieldConfig' => [
                                       
                                        //'labelOptions' => ['class' => 'col-lg-1 col-form-label'],
                                    ],
                                ]); ?>
                                 <?= $form->field($model, 'login')->textInput(['placeholder' => 'Логин*', 'class'=>false])->label(false); ?>

                                <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Пароль*'])->label(false); ?>

                                
                               
                                <div class="tabs__checkbox">
                                   
                                   <?= $form->field($model, 'rememberMe')->checkbox([
                                    
                                ]) ?>
                                </div>
                                <div class="htc__login__btn mt--30">
                                    <?= Html::submitButton('Войти', ['class' => 'btn loginbtn', 'name' => 'login-button']) ?>
                                </div>
                                <?php ActiveForm::end(); ?>
                                
                            </div>
                            <!-- End Single Content -->
                            <!-- Start Single Content -->
                           
                            <!-- End Single Content -->
                        </div>
                    </div>
                </div>
                <!-- End Login Register Content -->
            </div>
        </div>