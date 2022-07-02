<?php
namespace app\modules\admin;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;


class Module extends \yii\base\Module {

public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            
        ];
    }

	public function init(){
		parent::init();
	}
	
}
?>