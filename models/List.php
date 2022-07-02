<?php

namespace app\models;

class List extends Models
{ 

	
	public function usersList($page){
		$sql = $this->sql_connect();
		$sql->set_charset('utf8');
		$str_query = "SELECT * FROM `category` ";
		$res = $sql->query($str_query); 
		if($res->num_rows){
			while($row = $res->fetch_assoc()){ 
				$data['page'][] = [ //запись в массив
					'id' => $row['id'], 
					'name' => $row['name'], 
				];
			}
		}
		return $data; 
	}


}