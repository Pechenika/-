<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Subcategory */

$this->title = Yii::t('app', 'Создать подкатегорию');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Subcategories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="" style="text-align: left;">
<a  href="/admin/subcategory">Назад</a><br>
<br>
 <h1><?= Html::encode($this->title) ?></h1>
</div>
<br><br>
<div class="subcategory-create" style="text-align: left;">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
