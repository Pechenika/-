<?php

use yii\helpers\Html;
use yii\grid\GridView;
use  yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\SubategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Подкатегории');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="" style="text-align: left; padding-left: 40px;">
<a  href="/admin/admin/index">Назад</a><br>
<h1><?= Html::encode($this->title) ?></h1><br><br>
    <p>
        <?= Html::a(Yii::t('app', 'Создать подкатегорию'), ['create'], ['class' => 'btn btn-success']) ?><br><br>
    </p>
</div>
<div class="subcategory-index" style="background: #fff; padding-left: 40px;">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
           [
                'label' => 'Название',
                'attribute' => 'name',
                'value' => function ($data) {
                    return $data->name;
                },
                'format' => 'raw',
            ],
            [
				'label' => 'Категория',
                'attribute' => 'id_parent',
                'value' => function ($model, $key, $index, $widget) {
                    return $model->category->name;
                },
                'format' => 'raw',
            ],
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
