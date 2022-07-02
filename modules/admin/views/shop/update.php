<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Shop */

$this->title = Yii::t('app', 'Редактирование магазина: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shops'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="" style="text-align: left; background: #fff; padding-left: 40px;">
<a  href="/admin/shop">Назад</a><br>
</div>
<div class="shop-update" style="text-align: left; background: #fff; padding-left: 40px; padding-bottom: 40px;">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
