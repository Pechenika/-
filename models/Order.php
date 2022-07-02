<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\modules\admin\models\ProductOrder;
use app\modules\admin\models\Product;
use app\modules\admin\models\Shop;
use app\modules\admin\models\Payment;
use app\modules\admin\models\Delivery;
use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class Order extends ActiveRecord
{
   

    public static  function tableName(){
	    return 'completed_order';
    }

    public function getProductOrder()
    {
        return $this->hasMany(ProductOrder::className(), ['id_order' => 'id']);
    }
    public function getProduct()
    {
    $product = Product::find();
        return $product;
    }
    public function getShop()
    {
        return $this->hasOne(Shop::className(), ['id' => 'id_shop']);
    }
    public function getPayment()
    {
        return $this->hasOne(Payment::className(), ['id' => 'id_payment']);
    }
    public function getDelivery()
    {
        return $this->hasOne(Delivery::className(), ['id' => 'id_delivery']);
    }
    public function rules()
        {
            return [
                [['name_user', 'surname_user', 'phone', 'id_payment', 'id_delivery', 'order_email', 'agree'], 'required', 'message' =>'Поле не должно быть пустым'],
                [['name_user', 'surname_user'], 'string'],
               // [['phone'],'match', 'pattern' => '/^\+7\s\([0-9]{3}\)\s[0-9]{3}\-[0-9]{2}\-[0-9]{2}$/', 'message'=> 'Номер телефона заполнен некорректно'],
               // [['name_user'], 'possibleMaximum'],
		['order_email', 'email'],
               // [['id_payment', 'adress', 'id_shop', 'note'], 'safe'], 
                [['id_payment', 'adress', 'id_shop', 'note'], 'safe'], 
            ];
        }
        public function sendMail($model, $order) {
        
        $email = $order->order_email;
        $emailSender = 'rassada.dlya.vsekh.00@mail.ru';

        $body = 'инф';
        $subject = "Информация о заказе на сайте Garden. ";

       /* $mail = Yii::$app->mailer->compose(
                    'order_inform',
                    ['model' => $model, 'order' => $order]
        );*/
        
        try{
            Yii::$app->mailer->compose()
                ->setFrom($emailSender)
                ->setTo($email)
                ->setSubject($subject)
                ->setTextBody($body)
                ->send();
            return true;
        }
        catch (\Swift_TransportException $e){
            //обработка ошибки
            print_r('error');
        }
        }
}
?>