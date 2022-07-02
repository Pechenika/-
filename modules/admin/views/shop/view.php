<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Shop */

$this->title = $model->adress;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shops'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="" style="text-align: left;  background: #fff; padding-left: 40px; padding-bottom: 40px;">
    <a  href="/admin/shop">Назад</a><br><br>
    <h3><?= Html::encode($this->title) ?></h3><br><br>
    <p>
        <?= Html::a(Yii::t('app', 'Редактировать'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Вы уверены, что хотите удалить этот магазин?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>
<div class="shop-view" style="text-align: left;  background: #fff; padding-left: 40px; padding-bottom: 40px;">

    <?= DetailView::widget([
        'model' => $model,
		 'attributes' => [
		 [
                'label' => 'Магазин',
                'attribute' => 'adress',
                'value' => function ($data) {
                    return $data->adress;
                },
                'format' => 'raw',
            ],
			 [
                'label' => 'Телефон',
                'attribute' => 'phone',
                'value' => function ($data) {
                    return $data->phone;
                },
                'format' => 'raw',
            ],
		],
        
    ]) ?>

</div><br><br>
