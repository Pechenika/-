<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Subcategory */

$this->title = Yii::t('app', 'Редактирование подкатегории: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Subcategories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Редактировать');
?>
<div class="" style="text-align: left; background: #fff; padding-left: 40px;">
<a  href="/admin/subcategory">Назад</a><br><br>
</div>
<div class="subcategory-update" style="text-align: left; background: #fff; padding-left: 40px; padding-bottom: 40px;">

    <h3><?= Html::encode($this->title) ?></h3><br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
