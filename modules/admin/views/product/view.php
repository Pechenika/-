<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use  yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Товары'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="" style="text-align: left; padding-left: 40px; padding-right: 40px; background: #fff;">
    <a  href="/admin/product">Назад</a><br><br>
    <h1><?= Html::encode($this->title) ?></h1><br><br>
    <p>
        <?= Html::a(Yii::t('app', 'Редактировать'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Вы уверены, что хотите удалить этот товар?'),
                'method' => 'post',
            ],
        ]) ?>
    </p><br><br>
</div>
<div class="product-view" style="padding-left: 40px; padding-right: 40px; padding-bottom: 40px; background: #fff;">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
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
                'label' => 'Стоимость (₽)',
                'attribute' => 'price',
                'value' => function ($data) {
                    return $data->price;

                },
                'format' => 'raw',
            ],

            [
				'attribute' => 'count',
                'label' => 'Общее количество',
                'format' => 'raw',
                'value' => function($data){
                    return $data->count;
                },
            ],
            [
                'label' => 'Оптовая стоимость (₽)',
                'attribute' => 'price_opt',
                'value' => function ($data) {
                    return $data->price_opt;

                },
                'format' => 'raw',
            ],

            [
				'attribute' => 'opt_count',
                'label' => 'Оптовое количество',
                'format' => 'raw',
                'value' => function($data){
                    return $data->opt_count;
                },
            ],
            [
				'label' => 'Изображение',
                'attribute' => 'image',
                'value' => function ($model) {
                    return Html::img(Url::toRoute($model->image),[
                        'alt'=>'',
                        'style' => 'width:115px;'
                    ]);
                },
                'format' => 'raw',
            ],
           /* [
				'label' => 'В наличии в магазине',
                'attribute' => 'Магазин',
                'value' => function ($model) {
                    return $model->shop->adress;
                },
                'format' => 'raw',
            ],*/
            [
				'label' => 'Подкатегория',
                'attribute' => 'subcategory',
                'value' => function ($model) {
                    return $model->subcategory->name;
                },
                'format' => 'raw',
            ],
            
        ],
    ]) ?>

</div><br><br>
