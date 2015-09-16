<?php
namespace app\controllers;

use yii\web\controller;
use app\models\Users;

class UsersController extends Controller{
	public function actionIndex(){
		$users = Users::find()->All();
		return $this->render('index', ['users'=>$users]);

	}
}
?>