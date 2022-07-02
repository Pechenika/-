<?php

namespace app\modules\admin\models;
use Yii;
use yii\base\Model;

use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class Payment extends ActiveRecord
{
public static function tableName(){
	return 'payment';
}
}
?>