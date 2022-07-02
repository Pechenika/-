<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\CompletedOrder */

$this->title = Yii::t('app', 'Create Completed Order');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Completed Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="" style="text-align: left; padding-left: 40px; padding-right: 40px; background: #fff;">
<a  href="/admin/completed-order">Назад</a><br>
</div>
<div class="completed-order-create" style="padding-left: 40px; padding-right: 40px; background: #fff;">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
