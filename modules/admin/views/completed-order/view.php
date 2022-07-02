<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\CompletedOrder */

$this->title = 'Номер заказа №'. $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Completed Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="" style="padding-left: 40px; padding-right: 40px; padding-bottom: 40px; background: #fff;">
    <a  href="/admin/completed-order">Назад</a><br>
    <h1><?= Html::encode($this->title) ?></h1>
     <p>
        <?= Html::a(Yii::t('app', 'Редактировать'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Вы уверены, что хотите удалить заказ?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>
<div class="completed-order-view" style="padding-left: 40px; padding-right: 40px; background: #fff; padding-bottom: 40px;">

    <?= DetailView::widget([
        'model' => $model,
        
        'attributes' => [
		    [
				'label' => 'Способ оплаты',
                'attribute' => 'id_payment',
                'value' => function ($model) {
                    return $model->payment->type;
                },
                'format' => 'raw',
            ],
            //'id_product',
            //'count',
            /*[
				'label' => 'Товар',
                'attribute' => 'id_product',
                'value' => function ($model) {
                $id_product =[];
                $i=0;
                foreach ($model['productOrder'] as $item) {
                                $id_product[$i] = $item['product']['name'];
                                $i++;
                                
                }//return $id_product;
                return implode('<br>', $id_product);
                },
                'format' => 'raw',
            ],*/
           /* [
				'label' => 'Товар',
                'attribute' => 'id_product',
                'value' => function ($model) {
                $id_product =[];
                 $count = [];
                 $str1 = [];
                $i=0;
                foreach ($model->productOrder as $item) {
                               // $id_product[$i] = $item['product']['name'];
                               // $count[$i] = $item['count'];
                               
                                $str1[$i] =  $item['product']['name'].'('.$item['count'].' шт)' ;
                                $i++;
                }//return $id_product;
               // $str1 = implode('<br>', $id_product);
                //$str2 = implode('<br>', $count);
                return implode('<br>', $str1);
                },
                'format' => 'raw',
            ],
            [
				'label' => 'Количество',
                'attribute' => 'count',
                'value' => function ($model) {
                $count = [];
                $i = 0;
                foreach ($model['productOrder'] as $item) {
                                $count[$i] = $item['count'];
                                $i++;
                                
                }//return $id_product;
                return implode('<br>', $count);
                },
                'format' => 'raw',
            ],*/
           /* [
				'label' => 'Магазин',
                'attribute' => 'id_shop',
                'value' => function ($model) {
                    return $model->shop->adress;
                },
                'format' => 'raw',
            ],*/
			[
                'label' => 'Итоговая сумма',
                'attribute' => 'total_price',
                'value' => function ($data) {
                    return $data->total_price;
                },
                'format' => 'raw',
            ],
			[
                'label' => 'Имя',
                'attribute' => 'name_user',
                'value' => function ($data) {
                    return $data->name_user;
                },
                'format' => 'raw',
            ],
			[
                'label' => 'Фамилия',
                'attribute' => 'surname_user',
                'value' => function ($data) {
                    return $data->surname_user;
                },
                'format' => 'raw',
            ],
			[
                'label' => 'Дата',
                'attribute' => 'date',
                'value' => function ($data) {
                    return $data->date;
                },
                'format' => 'raw',
            ],
             [
				'label' => 'Тип доставки',
                'attribute' => 'id_delivery',
                'value' => function ($model) {
                    return $model->delivery->type;
                },
                'format' => 'raw',
            ],
			[
                'label' => 'Заметки',
                'attribute' => 'note',
                'value' => function ($data) {
                    return $data->note;
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
			[
                'label' => 'Адрес',
                'attribute' => 'adress',
                'value' => function ($model) {
               if(!empty($model->adress)){
                 return $model->adress;
               }  
               else return $model->shop->adress;
                },
                'format' => 'raw',
            ],
            
        ],
    ]) ?>
  <h3 style="font-weight: 600;font-size: 24px;color: #121010;">Наполнение заказа</h3><br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
       // 'filterModel' => $searchModel,
        'columns' => [
            //'id',
           // 'id_product',
            [
				'label' => 'Изображение',
                'attribute' => 'id_product',
                'value' => function ($model) {
                    return '<img style="width: 200px;" src="'.$model->product->image.'"></img>';
                },
                'format' => 'raw',
            ],
            [
				'label' => 'Товар',
                'attribute' => 'id_product',
                'value' => function ($model) {
                    return '<a href="/admin/product/view?id='.$model->product->id.'">'.$model->product->name.'</a>';
                },
                'format' => 'raw',
            ],
            
           [
				'label' => 'Количество',
                'attribute' => 'count',
                'value' => function ($model) {
                    return $model->product->count;
                },
                'format' => 'raw',
            ],
            
            
           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);  
    ?>
</div>
