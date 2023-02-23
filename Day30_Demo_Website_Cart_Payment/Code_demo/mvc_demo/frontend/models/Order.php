<?php
require_once 'models/Model.php';
class Order extends Model {
	public function insertData($fullname, $address,
	$mobile, $email, $note, $price_total, $payment_status) {
		$sql_insert = "INSERT INTO orders(fullname,address,mobile,email
,note,price_total,payment_status) VALUES(:fullname,:address,:mobile,
:email,:note,:price_total,:payment_status)";
		$obj_insert = $this->connection->prepare($sql_insert);
		$inserts = [
			':fullname' => $fullname,
			':address' => $address,
			':mobile' => $mobile,
			':email' => $email,
			':note' => $note,
			':price_total' => $price_total,
			':payment_status' => $payment_status,
		];
		$obj_insert->execute($inserts);
		$order_id = $this->connection->lastInsertId();
		return $order_id;
	}
}
