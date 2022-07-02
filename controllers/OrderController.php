<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\Controller;
use app\models\Order;
use app\models\Product;
use app\modules\admin\models\ProductOrder;


class OrderController extends Controller
{
	public function actionIndex(){
	
		$model = new Order();
		$session = Yii::$app->session;
		$session->open();
		$model->date = date("Y-m-d H:i:s");
		$model->agree = 1;
		
		//$model->note = " ";
		$model->total_price = $_SESSION['bascket.sum'];

		if ($model->load($this->request->post()) && $model->validate()) {
		
			$model->save();
			$id_order = $model->id;
		}	
		
		if ($model->load($this->request->post()) && $model->validate()) {	
			if (!empty($session['bascket'])){
					foreach ($session['bascket'] as $id=>$item){
						if($item['name'] != null && $item['name'] != ' '){
							$model2 = new ProductOrder(); 
							$model2->id_product = $item['id_product'] ;
							$model2->count =$item['count'];
							$model2->id_order = $id_order;
							$model2->save();

							$model3 = Product::findOne($item['id_product']);
							
							$model3->count -= $item['count'];
							$model3->total_sales += $item['count'];
							$model3->save();
						}
					}
			}

			$order = ProductOrder::find()->where(['id_order'=> $id_order])->all();

			$email = $model->order_email;
			$emailSender = 'dlyavsekhrassada@mail.ru';

			$body = 'инф';
			$charset="utf8";
            //$subject= "Content-type: text/plain; charset={$charset}\r\n";            
            //$headers.="From: {$model->email}\r\nReply-To: {$model->email}"; 
			$subject = "=?utf-8?B?".base64_encode('Информация о заказе на сайте Garden.')."?=";

		    $mail = Yii::$app->mailer->compose(
						'order_inform',
						['model' => $model, 'order' => $order]
			);
			
			try{
				//$mail->CharSet = 'UTF-8'; // Кодировка текста
			//$mail->encoding = 'base64'; // 
				$mail->setFrom($emailSender)
					->setTo($email)
					->setSubject($subject)
					->setTextBody($body)
					->send();
				//return true;
			}
			catch (\Swift_TransportException $e){
				//обработка ошибки
				print_r('error');
			}

			//$model->sendMail($order, $model);
			session_destroy();
			return $this->render('order_inform', compact('model', 'order'));
		}
			
		return $this->render('order', compact('model', 'session'));
	}

}
?>