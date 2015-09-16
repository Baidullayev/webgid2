

<?php

use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\UserForm;
use yii\bootstrap\Carousel;
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'АРМ ГИД веб версия';
?>

<script>

</script>

<div class="site-index">

    <div class="jumbotron">
        <h1>МП АСДЦ - АРМ ГИД!</h1>

        <p class="lead">Добро пожаловать в веб версию АРМ ГИД</p>
        <?php 
           echo Html::a("Просмотр графика", ["/design/designer"], ['class' => 'btn btn-lg btn-success']);
        ?>    


       
    </div>

    <div align="center">
<?php
    echo Carousel::widget ( [
    'items' => [
        [
            'content' => '<img  src="img/g20407925_8b1070717ff6e3faaddcd6a7e36abff6.jpg"/>',
            'caption' => '<h2></p>',
            'options' => [ ]
        ],
 
        [
            'content' => '<img  src="img/8d3941178af9a63cac2b71278de.png"/>',
            'caption' => '<h2></p>',
            'options' => [ ]
        ],
 
        [
            'content' => '<img  src="img/20140418_10_54_04876.jpg"/>',
            'caption' => '<h2></p>',
            'options' => [ ]
        ],


    ],
    'options' => [
        'style' => 'width:630px;' // set the width of the container if you like
    ]
] );
?>
</div>

</div>
