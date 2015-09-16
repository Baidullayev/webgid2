<?php
use yii\helpers\Html;
?>


<?=$this->registerJsFile('@web/js/easeljs-0.7.0.min.js',['position'=>$this::POS_BEGIN],'easeljs');?>

<button onclick="init()" class="btn btn-primary" >Отрисовать</button>



<canvas id="demoCanvas" width="1080" height="1200" >

</canvas>



  <script>
    var stage;
    function init() {
      stage = new createjs.Stage("demoCanvas");
      stage.enableMouseOver(10);
      
      var label1 = new createjs.Text("text without hitArea", "48px Arial", "#F00");
      label1.x = label1.y = 10;
      label1.alpha = 0.5;
      
      var label2 = new createjs.Text("text with hitArea", "48px Arial", "#00F");
      label2.x = 10;
      label2.y = 80;
      label2.alpha = 0.5;
      
      // create a rectangle shape the same size as the text, and assign it as the hitArea
      // note that it is never added to the display list.
      var hit = new createjs.Shape();
      hit.graphics.beginFill("#000").drawRect(0, 0, label2.getMeasuredWidth(), label2.getMeasuredHeight());
      label2.hitArea = hit;
       
      label1.on("mouseover", handleInteraction);
      label2.on("mouseover", handleInteraction);
      
      label1.on("mouseout", handleInteraction);
      label2.on("mouseout", handleInteraction);     

      label1.on("click", handleClick);  
      label2.on("click", handleClick);
      
      stage.addChild(label1, label2);
      stage.update();   
      createjs.Ticker.addEventListener("tick", stage);      
    }
     function handleClick(event) {

      alert(event.target.text);
      // Click happened.
    }
    function handleInteraction(event) {
        event.target.alpha = (event.type == "mouseover") ? 1 : 0.5; 
    }
  </script>

<script>

/*
//переменные
var u = 5;
var u1 = 20;
var dlst = 60;
var dobst = 35;
var per_iod = 12;
var dg = 72;
var kol = 13;

var g_reg_stan = 13;
var UvGrNa=1.5;

var glb_mas_shtab = Math.trunc(12/per_iod);
//


//массивы
var dlin_stan = [0,24,26,30,28,22,26,26,22,24,30,24,22,28,22,26,26,];
var massta = [];
//

//мои переменные
var mainCanvasWidth=1105;
var mainCanvasHeight=1300;


//




function drawTheGrid()
{  

       alert("saas");


var mainCanvas = document.getElementById('mainCanvas');
var mainContext = mainCanvas.getContext('2d');


  for (var i = 1; i <=dlin_stan.length; i++) {
     mainCanvasHeight = mainCanvasHeight + Math.trunc(dlin_stan[i]*Math.round(100*UvGrNa)/dlst);      
   }
mainCanvasHeight=1300;
   mainCanvas.width=mainCanvasWidth;
   mainCanvas.height=mainCanvasHeight;
   alert(mainCanvas.width + "  "  + mainCanvas.height + "  " + mainCanvasHeight);
 
  //mainContext.lineWidth=2; 

  mainContext.beginPath(); 
  mainContext.moveTo(u, 0);
  mainContext.lineTo(u, mainCanvasHeight);
  mainContext.stroke();

  k=0;
  k=Math.trunc((mainCanvas.width-u-u1)/(Math.trunc(dg/(glb_mas_shtab*6))));
  
  mainContext.lineWidth=2;  
  for (var i = 1; i <= Math.trunc(dg/(glb_mas_shtab*6)); i++) {
    mainContext.beginPath();
    mainContext.moveTo(u+k*i, dobst-5);
    mainContext.lineTo(u+k*i, mainCanvasHeight-dobst+5);
    mainContext.stroke();
  };

  mainContext.lineWidth=1;
  //рисование путей
  k=0;
  s=0;
  for (var i = 0; i < kol; i++) {

    k=Math.trunc((dlin_stan[i]*Math.round(100*UvGrNa))/dlst)+k; 

    mainContext.beginPath();  
    mainContext.moveTo(u,(k+dobst));
    mainContext.lineTo(mainCanvasWidth-u1, (k+dobst));
    mainContext.stroke();

    s=Math.trunc((mainCanvasWidth-u-u1)/(Math.trunc(dg/glb_mas_shtab)));
   for(var j=1; j<=(Math.trunc(dg/glb_mas_shtab)-1); j++){
      
      if((j%3)==0 && (j%6)!=0)
      {
        mainContext.beginPath();  
        mainContext.moveTo(u+(j*s),(k+dobst+1));
        mainContext.lineTo(u+(j*s),(k+dobst+6));
        mainContext.stroke();   
      } 
      else
      {
        if ((j%6)!=0) 
        {
          mainContext.beginPath();  
          mainContext.moveTo(u+(j*s),(k+dobst+1));
          mainContext.lineTo(u+(j*s),(k+dobst+3));
          mainContext.stroke();
        };
      };

   }


  };





}
*/
</script>


