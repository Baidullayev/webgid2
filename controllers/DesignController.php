<?php

namespace app\controllers;

use Yii;

use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\UserForm;
//use app\models\Stationlistofregion;
use app\models\Stations;
use app\models\Approaches;
use app\models\Stationsoftheregion;
use app\models\Nonstandartways;

class DesignController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],

           'access'=>[ 
            'class'=>AccessControl::classname(),
            'only'=>['designer'], // только авторизованные могут смотреть график
            'rules'=>[
                    [
                    'allow'=>true,
                    'roles'=>['@'] 
                    ],
                  ]
               ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionDesigner()
    {
        //$stations = new Stationslistofregion;
        //$approaches = new Approaches();
        $nonstandartways = new Nonstandartways();
        $allStationlist = Stationsoftheregion::find()->orderBy("p_nom DESC")->all();
       
        $stationsNameToDraw = array();
        $stationsLengthToDraw = array();
        //$stations = $model->getStationList();
        $request = Yii::$app->request;
        $openedStationList = $request->post('openedStations');
        if ($request->isAjax)
        {
            foreach ($allStationlist as $station) 
            {
                if(in_array($station->name, $openedStationList))//in_array($station, $openedStationList)
                {
                    if($station->podhod=='1') 
                    {
                        $approaches = Approaches::find()->where('st_sov > :kodstan', [':kodstan'=>$station->kod_stan])->oderBy('n_pod')->all();
                        foreach ($approaches as $approache) {
                            if($approache->n_pod==('-1'))
                            {
                                if(!empty($stationsLengthToDraw))
                                {
                                    array_push($stationsLengthToDraw, $station->rast);
                                }

                                array_push($stationsNameToDraw, $approache->st_prim);
                                array_push($stationsLengthToDraw, '25');
                            }
                            elseif ($approache->n_pod==('1')) {
                                array_push($stationsNameToDraw, $station->name);
                                if($station->kput!='0')
                                {
                                    $waysNumber = (int)$station->kput;
                                    for ($i=1; $i < $waysNumber; $i++) { 
                                        # code...
                                       array_push($stationsNameToDraw, (string)(i+1)); 
                                       array_push($stationsLengthToDraw, '5');
                                    }

                                }
                                array_push($stationsLengthToDraw, '25');
                                array_push($stationsNameToDraw, $approache->st_prim);
                                # code...
                            }
                            
                            # code...
                        }
                    }
                    else //если нет подхода
                    {
                        if($station->kput!='0')
                        {
                            $waysNumber = (int)$station->kput;
                            for ($i=1; $i < $waysNumber; $i++) { 
                                        # code...
                            array_push($stationsNameToDraw, (string)($i+1)); 
                            array_push($stationsLengthToDraw, '5');
                            }

                        }
                    }         
                }
                else 
                {
                    array_push($stationsNameToDraw, $station->name);
                    array_push($stationsLengthToDraw, $station->rast);
                   
                }

            # code...
            }
            return $this->render('designer', ['stations' => $stationsNameToDraw, 'lengthes'=>$stationsLengthToDraw]);
        }
        else
        {

            foreach ($allStationlist as $oneStation) 
            {
                array_push($stationsNameToDraw, $oneStation->name);
                array_push($stationsLengthToDraw, $oneStation->rast);
                # code...
            }
             return $this->render('designer', ['stations' => $stationsNameToDraw, 'lengthes'=>$stationsLengthToDraw]);
            //return $this->render('designer', ['stations'=>$stationsNameToDraw,'stationsLength'=>$stationsLengthToDraw]);
        } 
            
        
    }


}
