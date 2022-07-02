<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Shop */

$this->title = Yii::t('app', 'Добавить магазин');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shops'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="" style="text-align: left; background: #fff; padding-left: 40px;">
<a  href="/admin/shop">Назад</a><br>
<br>
 <h1><?= Html::encode($this->title) ?></h1>
</div>
<br><br>
<div class="shop-create" style="text-align: left; background: #fff; padding-left: 40px; padding-bottom: 40px;">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
