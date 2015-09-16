<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>    

 
</head>
<body>


<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'АО НК КТЖ',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [                    
                    ['label' => 'Домой', 'url' => ['/site/index']],
                    ['label' => 'График', 'url' => ['/design/designer']],
                    ['label' => 'Справки', 'url' => ['/site/inquiries']],    
                    ['label' => 'О нас', 'url' => ['/site/about']],
                    ['label' => 'Контакты', 'url' => ['/site/contact']],
                    Yii::$app->user->isGuest ?
                        ['label' => 'Войти', 'url' => ['/site/login']] :
                        ['label' => 'Выйти (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],

                         
                ],
            ]);
           //
            echo Nav::widget([
    'items' => [

        [
            'label' => 'График',
            'items' => [
                 ['label' => 'Ввод даты начало открытия графика', 'url' => 'asdasd'],
                 '<li class="divider"></li>',
                 //'<li class="dropdown-header">Dropdown Header</li>',
                 ['label' => 'Дополнительное деление сетки графика', 'url' => '#'],
                 '<li class="divider"></li>',
                 ['label' => 'Рисовать окна', 'url' => '#'],
                 '<li class="divider"></li>',
                 ['label' => 'Рисовать Предупреждения', 'url' => '#'],
                  '<li class="divider"></li>',
                 ['label' => 'Пометки', 'url' => '#'],
                  '<li class="divider"></li>',
                 ['label' => 'дополнительные элементы', 'url' => '#'],
                 '<li class="divider"></li>',
                 ['label' => 'Печать графика', 'url' => '#'],
                  '<li class="divider"></li>',
                 ['label' => 'дополнительные элементы', 'url' => '#'],
                  '<li class="divider"></li>',
                 ['label' => 'прогнозный график', 'url' => '#'],
                  '<li class="divider"></li>',
                 ['label' => 'Нарисовать дополнительные линии', 'url' => '#'],
                  '<li class="divider"></li>',
                 ['label' => 'дополнительные элементы', 'url' => '#'],

            ],
        ],
    ],
    'options' => ['class' =>'navbar-nav navbar-right'], // set this to nav-tab to get tab-styled navigation
]);
NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; ЦЛР - Актобе <?= date('Y') ?></p>
            <p class="pull-right">Разработано отделом РИУС</p>
        </div>
    </footer>

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
