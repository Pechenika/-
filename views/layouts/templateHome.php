<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use app\components\MenuWidget;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\ActiveForm;
use app\models\SearchForm;
use yii\bootstrap4\Modal;
AppAsset::register($this);

$model = new SearchForm();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header style="">
    <div class="container" style="padding: 20px; display: flex;">
        <?php
    NavBar::begin([
        'brandLabel' => 'Garden.',
        'brandUrl' => '/home/index',
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-green bg-white fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'col-lg-11 navbar-nav'],
        'items' => [
            ['label' => 'О нас', 'url' => ['/site/about']],
            [
            'label' => 'Магазины',
            'items' => [
                 ['label' => 'поселок Романовка', 'options'=> ['id' => '1'], 'url' => '#'],
                 ['label' => 'Поселок Мурино','options'=> ['id' => '2'], 'url' => '#'],
                 ['label' => 'Ж/Д ДУНАЙ', 'options'=> ['id' => '3'], 'url' => '#'],
                 ['label' => 'Правобережный рынок', 'options'=> ['id' => '4'], 'url' => '#'],
            ],
        ],

            ['label' => 'Контакты', 'url' => ['/site/contact']],
            [
                'label' => 'Войти', 
                'url' => ['/site/login'],
                'visible' => Yii::$app->user->isGuest
            ],
            ['label' => 'Админ-панель', 'url' => ['/admin'], 'visible' => !Yii::$app->user->isGuest],
            [
                'label' => 'Выйти', 
                'url' => ['/site/logout'],
                'options' => ['class'=>'nav-item logout'],
                'linkOptions'=>['class'=>'nav-link logout'],
                'visible' => !Yii::$app->user->isGuest
            
            ],
            
        ],
    ]);
    ?>
    <?=  app\components\BascketWidget::widget() ?>
    <?php NavBar::end(); ?>
   
    </div>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container" style="">
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container footercont" style="text-align: left;">
        <div class="row">
            <div class= "col">
                <b><p class="">О нас</p></b>
                <a class="footer_link" href="">О нас</a>
            </div>
            <div class= "col">
                <b><p class="">Свяжитесь с нами</p></b>
                <a class="footer_link" href="">Обратная связь</a><br>
                <a class="footer_link" href="">Контакты</a><br>
                <a class="footer_link" href="">Магазины</a><br>
            </div>
            <div class= "col">
                <b><p class="">Полезная информация</p></b>
                <a class="footer_link" href="">Помощь в выборе</a>
            </div><br>
        </div>
        <hr style="margin-top: 70px;">
            <a class="footer_link" href="">Положение об обработке и защите персональных данных </a>
            <a class="footer_link float-right" href="">Политика ответственного раскрытия информации</a>
    </div>
</footer>
<?php
    Modal::begin([
        'id' => 'bascket',
        'size'=> 'model-lg',
        'title'=> '<h2>Корзина</h2>',
        'footer' => '<a href="/order/index" class="btn btn-success">Оформить заказ</a>
        <a href="#" class="btn btn-danger clear">Очистить корзину</a>',
    ]);
    Modal::end();
?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>