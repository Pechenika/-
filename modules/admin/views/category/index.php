<?php

use yii\helpers\Html;
use yii\grid\GridView;
use  yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Категории');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="" style="text-align: left; padding-left: 40px; padding-right: 40px; background: #fff;">
<a  href="/admin/admin/index">Назад</a><br>
<h1><?= Html::encode($this->title) ?></h1><br><br>
    <p>
        <?= Html::a(Yii::t('app', 'Создать категорию'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div> 
<div class="category-index" style="padding-left: 40px; padding-right: 40px; background: #fff;">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            [
                'label' => 'Название',
                'attribute' => 'name',
                'value' => function ($data) {
                    return $data->name;
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'image',
                'label' => 'Изображение',
                'format' => 'raw',
                'value' => function($data){
                    return Html::img(Url::toRoute($data->url),[
                        'alt'=>'',
                        'style' => 'width:115px;'
                    ]);
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
