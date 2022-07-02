<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use  yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Subcategory */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Subcategories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="" style="text-align: left;background: #fff; padding-left: 40px;">
    <a  href="/admin/subcategory">Назад</a><br><br>
    <h1><?= Html::encode($this->title) ?></h1><br><br>
    <p>
        <?= Html::a(Yii::t('app', 'Изменить'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Вы уверены, что хотите удалить подкатегорию?'),
                'method' => 'post',
            ],
        ]) ?>
    </p><br><br>
</div>
<div class="subcategory-view" style="text-align: left; background: #fff; padding-left: 40px; padding-bottom: 40px;">
    
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
                'attribute' => 'category',
                'value' => function ($model) {
                    return $model->category->name;
                },
                'format' => 'raw',
            ],
            
        ],
    ]) ?>

</div><br><br>
