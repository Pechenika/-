<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ShopSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Магазины');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="" style="text-align: left; background: #fff; padding-left: 40px;">
<a  href="/admin/admin/index">Назад</a><br>
<h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Добавить магазин'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
<div class="shop-index" style="text-align: left; background: #fff; padding-left: 40px; padding-bottom: 40px;">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
