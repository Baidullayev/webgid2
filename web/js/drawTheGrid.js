
//переменные
/* старые названия
var u = 5;
var u1 = 20;
var dg = 72;
var kol = 13;
var dlst = 60;
var TopAndBottomIndent = 20;
var UgVrNa=1.5;
var per_iod = 12;
var g_reg_stan = 13;  
var glb_chas_begin=9;

*/

var leftIndent = 5;
var rightIndent = 20;
var maxNumberOfTenMinutes = 72; //6(ten minutes)*12(hours)=72(ten minutes)
var amountOfStations = 13;
var stationHeightAvrgRatio = 60;
var TopAndBottomIndent = 20;
var scaleCoefficient = 1.5;
var hourPeriod = 12;  
var initialTime = 9;

//


//массивы
//var dlin_stan = [0,24,26,30,28,22,26,26,24,30,24,22,28,22,26,26];
//var massta = ["Жайсан","РЗД33","Шаруа","Мартук","Жамансу","РЗД36","Каратогай","Камыссай","РЗД38","Курайлы","Кызгалдакты","Жинишке","Актобе"];
//var stationLengthArray = [0,24,26,30,28,22,26,26,24,30,24,22,28,22,26,26];
//var stationArray = ["Жайсан","РЗД33","Шаруа","Мартук","Жамансу","РЗД36","Каратогай","Камыссай","РЗД38","Курайлы","Кызгалдакты","Жинишке","Актобе"];
//

//мои переменные
var mainCanvasWidth=1105;
var mainCanvasHeight=1300;

//context for drawing station list using easeljs


//
var stage; 
var stations  =  new Object;
var hitStationShapes  = new Object;
var openedStations = [];


function drawTheGrid()
{  
stage = new createjs.Stage("stationListCanvas");


//col=col2;
//g_reg_stan=col2;

 //stationLengthArray = stationLengthArray2;
 //stationArray = stationArray2;

stage.enableMouseOver(10);
//stage.clear();

//stage.updateCache();

/*
var period = document.getElementById('period');
parseInt(period);
if (period.value!=0 && period.value<12)
{
  hourPeriod=parseInt(period.value);
}
else
{
  hourPeriod=12;
};
*/

var glb_mas_shtab = Math.trunc(12/hourPeriod);

var mainCanvas = document.getElementById('mainCanvas');
var mainContext = mainCanvas.getContext('2d');

var stationListCanvas = document.getElementById('stationListCanvas');
var stationListContext = stationListCanvas.getContext('2d');
stationListContext.clearRect(0, 0, stationListCanvas.width, stationListCanvas.height);
var topTimeCanvas = document.getElementById('topTimeCanvas');
var topTimeContext = topTimeCanvas.getContext('2d');

var bottomTimeCanvas = document.getElementById('bottomTimeCanvas');
var bottomTimeContext = bottomTimeCanvas.getContext('2d');

  //определение высоты конвы
   mainCanvasHeight = 0;
   for (var i = 0; i <amountOfStations; i++) {     
     mainCanvasHeight=mainCanvasHeight+(Math.trunc((stationLengthArray[i]*Math.round(100*scaleCoefficient))/stationHeightAvrgRatio));
   };
 
   mainCanvasHeight = mainCanvasHeight+(TopAndBottomIndent*2);
  //конец определение высоты канвы
   mainCanvas.width = mainCanvasWidth;
   mainCanvas.height = mainCanvasHeight;
   
   stationListCanvas.height = mainCanvasHeight;

   topTimeCanvas.width = mainCanvasWidth;
   topTimeCanvas.height = 20;

   bottomTimeCanvas.width = mainCanvasWidth;
   bottomTimeCanvas.height = 20;
   //alert(mainCanvas.width + "  "  + mainCanvas.height + "  " + mainCanvasHeight);
 
  
 //рисование вертикальных линий
  mainContext.beginPath(); 
  mainContext.moveTo(leftIndent, 0);
  mainContext.lineTo(leftIndent, mainCanvasHeight);
  mainContext.stroke();

  k=0;
  k=Math.trunc((mainCanvas.width-leftIndent-rightIndent)/(Math.trunc(maxNumberOfTenMinutes/(glb_mas_shtab*6))));
  
  mainContext.lineWidth=2;  
  for (var i = 1; i <= Math.trunc(maxNumberOfTenMinutes/(glb_mas_shtab*6)); i++) {
    mainContext.beginPath();
    mainContext.moveTo(leftIndent+k*i, TopAndBottomIndent-5);
    mainContext.lineTo(leftIndent+k*i, mainCanvasHeight-TopAndBottomIndent+5);
    mainContext.stroke();
  };
  // конец рисование вертикальных линиий
  
  //рисование путей и названия станции 
  mainContext.lineWidth=1;
      topTimeContext.font = "14px Arial";
      bottomTimeContext.font = "14px Arial";
  //проставление часов
  var temp;
  k = Math.trunc((mainCanvasWidth-leftIndent-rightIndent)/(Math.trunc(maxNumberOfTenMinutes/(glb_mas_shtab*6))));
  rectWidth=mainCanvas.width;
  topTimeContext.fillStyle="white";
  topTimeContext.rect(0,0,1105,20);
  topTimeContext.fill();
  for (var i = 0; i <= Math.trunc(maxNumberOfTenMinutes/(glb_mas_shtab*6)); i++) {
    temp = initialTime+i;
    if (temp>23) {temp=temp-24;};
    if (temp<10) {
      topTimeContext.fillStyle="black";
      topTimeContext.fillText(temp, leftIndent+k*i-2, 14);
      bottomTimeContext.fillText(temp, leftIndent+k*i-2, 14);
    } else{
      topTimeContext.fillStyle="black";
      topTimeContext.fillText(temp, leftIndent+k*i-9, 14);
      bottomTimeContext.fillText(temp, leftIndent+k*i-9, 14);
    };
  };
  //

  k=0;
  s=0;
  for (var i = 0; i < amountOfStations; i++) {

    k=Math.trunc((stationLengthArray[i]*Math.round(100*scaleCoefficient))/stationHeightAvrgRatio)+k; 
    
    //рисования названия станций
    if (stationArray[i].length>4) {
        stations[stationArray[i]] = new createjs.Text(stationArray[i], "16px Arial", "#00F");
        stations[stationArray[i]].x = 5;
        stations[stationArray[i]].y = (k-7+2+TopAndBottomIndent+5);
        stations[stationArray[i]].alpha = 0.5;


        hitStationShapes[stationArray[i]] = new createjs.Shape();
        hitStationShapes[stationArray[i]].graphics.beginFill("#000").drawRect(0, 0, stations[stationArray[i]].getMeasuredWidth(), stations[stationArray[i]].getMeasuredHeight());
        
        stations[stationArray[i]].hitArea = hitStationShapes[stationArray[i]];
        
        stations[stationArray[i]].on("mouseover", handleInteraction);
        stations[stationArray[i]].on("mouseout", handleInteraction);
        stations[stationArray[i]].on("click", handleClick);       
        stage.addChild(stations[stationArray[i]]);
        stage.update(); 

    } else{
        stations[stationArray[i]] = new createjs.Text(stationArray[i]+'--', "16px Arial", "#00F");
        stations[stationArray[i]].x = 5;
        stations[stationArray[i]].y = (k-7+2+TopAndBottomIndent+15);
        stations[stationArray[i]].alpha = 0.5;             
        stage.addChild(stations[stationArray[i]]);
        stage.update();   
    };

    //конец рисования названия станций
    mainContext.beginPath();  
    mainContext.moveTo(leftIndent,(k+TopAndBottomIndent));
    mainContext.lineTo(mainCanvasWidth-rightIndent, (k+TopAndBottomIndent));
    mainContext.stroke();

    s=Math.trunc((mainCanvasWidth-leftIndent-rightIndent)/(Math.trunc(maxNumberOfTenMinutes/glb_mas_shtab)));
   for(var j=1; j<=(Math.trunc(maxNumberOfTenMinutes/glb_mas_shtab)-1); j++){
      
      if((j%3)==0 && (j%6)!=0)
      {
        mainContext.beginPath();  
        mainContext.moveTo(leftIndent+(j*s),(k+TopAndBottomIndent+1));
        mainContext.lineTo(leftIndent+(j*s),(k+TopAndBottomIndent+6));
        mainContext.stroke();   
      } 
      else
      {
        if ((j%6)!=0) 
        {
          mainContext.beginPath();  
          mainContext.moveTo(leftIndent+(j*s),(k+TopAndBottomIndent+1));
          mainContext.lineTo(leftIndent+(j*s),(k+TopAndBottomIndent+3));
          mainContext.stroke();
        };
      };

   }
    createjs.Ticker.addEventListener("tick", stage);
   //stage.update(); 
  


  };
  //alert(Object.keys(stations).length);  
  //конец рисование путей и названия станции 
  stations=[];
  hitStationShapes=[];
  


}
/*
    function sss()
    {

      alert();
    }
*/
var count=0;
    function handleClick(event) {
      //stage.removeAllEventListeners();
      stage.removeAllChildren();
      stage.update();
     drawTheGrid(); 
     alert(event.target.text);
    if(openedStations.indexOf(event.target.text)==-1)
    {
      openedStations.push(event.target.text);
    }
    else
    {
       openedStations.splice(openedStations.indexOf(event.target.text),1);
       //http://localhost/basic/web/index.php?r=design%2Fdesigner
    }
    $.ajax(
    {
        type:"POST",
        data:{openedStations:openedStations},
        //dataType: "json",
        url:'http://localhost/basic/web/index.php?r=design%2Fdesigner',
        success: function(result)
        {
            
            drawTheGrid(); 
        console.log(result)
        }
    }
    );


      // Click happened.
    }
    function handleInteraction(event) {
        event.target.alpha = (event.type == "mouseover") ? 1 : 0.5; 
    }



