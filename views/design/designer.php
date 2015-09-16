
<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\components\CssMenu;
use yii\bootstrap\Collapse;
use yii\widgets\Pjax;
$this->registerJsFile('@web/js/easeljs-0.7.0.min.js',['position'=>$this::POS_BEGIN],'easeljs');
$this->registerJsFile('@web/js/drawTheGrid.js',['position'=>$this::POS_BEGIN],'drawTheGrid');
$this->registerCssFile('@web/css/graph.css',['depends' => ['app\assets\AppAsset']]);
$count;
?>





<script type="text/javascript">
var stationArray = <?php echo json_encode($stations);?>;
var stationLengthArray = <?php echo json_encode($lengthes);?>;



/*
<?php foreach ($stations as $station): ?> 

 stationArray.push=<?=$station?> 

  <?php endforeach;?> 

  <?php foreach ($lengthes as $length): ?> 

  stationLengthArray.push=<?=$length?> 

  <?php endforeach;?> 
  */
</script>

<script type="text/javascript">
document.addEventListener("DOMContentLoaded", drawTheGrid);
</script>

<script>
  var h_hght = 60; // высота шапки
  var h_mrg = 50;    // отступ когда шапка уже не видна
  $(function(){
   $(window).scroll(function(){
      var top = $(this).scrollTop();
      var elem = $('.topTimeStyle');
      if (top+h_mrg < h_hght) {
       elem.css('top', (h_hght-top));
      } else {
       elem.css('top', h_mrg);
      }
    });
  });
</script>

<div class="stationListStyle">            
<canvas id="stationListCanvas" width="120" height="1">
</canvas>
</div>

<div class="topTimeStyle">
<canvas id="topTimeCanvas"  width="1080" height="5" >
</canvas>
</div>

<div class="mainCanvasStyle">
<canvas id="mainCanvas"  width="1080" height="1">
</canvas>
</div>

<div class="bottomTimeStyle">
<canvas id="bottomTimeCanvas" width="1080" height="5">
</canvas>
</div>
<ul>
<?php foreach ($stations as $station): ?> 
  <li>
      <?= Html::encode("{$station}()")?>
    </li>
    <?php endforeach;?>
  

  </ul>

