<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Admin;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class AdminController extends Controller
{
	public function actionIndex(){
		//return $this->render('index');
		return $this->redirect('/admin/completed-order');
	}
}