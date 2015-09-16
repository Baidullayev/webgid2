
<h1>Выберите пожалуйста справку</h1>
<?php 
use yii\bootstrap\Nav;
echo Nav::widget([
    'items' => [

        [
            'label' => 'Локомотивы бригады',
            'url' => ['site/index'],
            'linkOptions' => ["sas"],
        ],
        [
            'label' => 'Местная работа',
            'url' => ['site/index'],
            'linkOptions' => ["sas"],
        ],
        [
            'label' => 'Транзит',
            'url' => ['site/index'],
            'linkOptions' => ["sas"],
        ],
                [
            'label' => 'Наличие брошенных поездов на участке',
            'url' => ['site/index'],
            'linkOptions' => ["sas"],
        ],
                [
            'label' => 'Справка участковая и техническая скорость за смену',
            'url' => ['site/index'],
            'linkOptions' => ["sas"],
        ],
                [
            'label' => 'Книга приема и сдачи чужих вагонов по стыку',
            'url' => ['site/index'],
            'linkOptions' => ["sas"],
        ],
                [
            'label' => 'Состояние путей ПОП парка',
            'url' => ['site/index'],
            'linkOptions' => ["sas"],
        ],
                [
            'label' => 'Весовые нормы и длина поезда',
            'url' => ['site/index'],
            'linkOptions' => ["sas"],
        ],
                        [
            'label' => 'Перечень отправленных грузовых поездов со станции',
            'url' => ['site/index'],
            'linkOptions' => ["sas"],
        ],
                        [
            'label' => 'Сведения о работе по станции',
            'url' => ['site/index'],
            'linkOptions' => ["sas"],
        ],
    ],
    
    'options' => ['class' =>'nav nav-pills nav-stacked'], // set this to nav-tab to get tab-styled navigation
]);
?>