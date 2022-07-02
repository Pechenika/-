<?php

namespace app\models;

use Yii;
use yii\base\Model;

use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class Category extends ActiveRecord
{
public static function tableName(){
	return 'category';
}
 public function rules()
    {
        return [
            [['name', 'url'], 'required'],
            ['url', 'image'],
        ];
    }
}
?>