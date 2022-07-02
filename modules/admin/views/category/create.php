<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */

$this->title = Yii::t('app', 'Создать категорию');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="" style="text-align: left; padding-left: 40px; padding-right: 40px; background: #fff;">
<a  href="/admin/category">Назад</a><br>
<br>
 <h1><?= Html::encode($this->title) ?></h1>
</div>
<br><br>
<div class="category-create" style="text-align: left; padding-left: 40px; padding-right: 40px; background: #fff; padding-bottom: 40px;">
    <?= $this->render('_form', [  //убрать ид подкатегории\множественный выбор
        'model' => $model,
    ]) ?>

</div>
