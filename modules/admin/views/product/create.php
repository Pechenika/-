<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */

$this->title = Yii::t('app', 'Создать товар');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="" style="text-align: left; padding-left: 40px; padding-right: 40px; background: #fff;">
<a  href="/admin/product">Назад</a><br>
<br>
 <h1><?= Html::encode($this->title) ?></h1>
</div>
<br><br>
<div class="product-create" style="text-align: left; padding-left: 40px; padding-right: 40px; background: #fff;">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
