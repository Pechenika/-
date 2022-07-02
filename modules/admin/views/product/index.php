<?php

use yii\helpers\Html;
use yii\grid\GridView;
use  yii\grid\DataColumn;
use \yii\web\UrlManager;
use  yii\helpers\Url;
use app\modules\admin\models\Shop;
$this->title = Yii::t('app', 'Товары');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="bg__white" style="padding-left: 40px; padding-right: 40px; background: #fff;">
<div class="container">
<div class="row">

<div class="" style=" padding-left: 40px; padding-right: 40px; background: #fff;">
<a  href="/admin/admin/index">Назад</a><br>
<h1 style="margin-bottom: 20px;"><?= Html::encode($this->title) ?></h1>

   
        <?= Html::a(Yii::t('app', 'Создать товар'), ['create'], ['class' => 'btn btn-success']) ?><br><br>
    
</div>
<div class="product-index" style="padding-left: 40px;text-align: left;padding-right: 40px;background: #fff;">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
       // 'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],
           
            [
                'label' => 'Название',
                'attribute' => 'name',
                'value' => function ($data) {
                    return $data->name;
                },
                'format' => 'raw',
            ],
            [
                'label' => 'Описание',
                'attribute' => 'description',
                'value' => function ($data) {
                    return $data->description;
                },
                'format' => 'raw',
            ],
            [
                'label' => 'Стоимость',
                'attribute' => 'price',
                'value' => function ($data) {
                    return $data->price;

                },
                'format' => 'raw',
            ],
            [
            'label' => 'Изображение',
            'format' => 'raw',
            'value' => function($data){
                return Html::img(Url::toRoute($data->image),[
                    'alt'=>'',
                    'style' => 'width:115px;'
                ]);
            },
        ],
            [
            'label' => 'Адрес',
                'attribute' => 'id_shop',
                'value' => function ($model, $key, $index, $widget) {
                    return $model->shop->adress;
                },
                'format' => 'raw',
            ],
            [
                'label' => 'Подкатегория',
                'attribute' => 'id_subcategory',
                'value' => function ($model, $key, $index, $widget) {
                    return $model->subcategory->name;
                },
                'format' => 'raw',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
</div>
