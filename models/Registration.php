<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class Registration extends ActiveRecord
{
    public $confirm_password;
  
    public static function tableName(){
        return 'users';
    }
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['password', 'login', 'confirm_password'], 'required'],
            [['password', 'login', 'confirm_password'], 'string'],
           
            ['login', 'unique'],
        ];
    }

    
    public function validateConfirmPassword($attribute, $params)
    {
        if (!$this->hasError()) {
            if($this->confirm_password != $this->password){
                $this->addError($attribute, 'пароли не совпадают');
            }
        }
    }

}