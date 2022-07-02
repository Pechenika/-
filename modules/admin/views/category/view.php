<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use  yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="" style="text-align: left; padding-left: 40px; padding-right: 40px; background: #fff;">
    <a  href="/admin/category">Назад</a><br><br>
    <h1><?= Html::encode($this->title) ?></h1><br><br>
    <p>
        <?= Html::a(Yii::t('app', 'Редактировать'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Вы уверены, что хотите удалить категорию?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>
<div class="category-view" style="padding-left: 40px; padding-right: 40px; background: #fff;">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           [
            'label' => 'Название',
            'attribute' => 'name',
            ],
            [
            'label' => 'Обложка',
            'format' => 'raw',
            'value' => function($data){
                return Html::img(Url::toRoute($data->url),[
                    'alt'=>'',
                    'style' => 'width:115px;'
                ]);
            },
        ],
        ],
    ]) ?>

</div>с
