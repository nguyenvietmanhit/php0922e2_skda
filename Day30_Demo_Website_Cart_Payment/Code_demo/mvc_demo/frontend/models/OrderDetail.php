<?php
require_once 'models/Model.php';
class OrderDetail extends Model {
	public function insertData($order_id, $product_name,
	$product_price, $quantity) {
		$sql_insert = "INSERT INTO order_details(order_id, product_name,
product_price,quantity) VALUES(:order_id,:product_name,:product_price,
:quantity)";
		$obj_insert = $this->connection->prepare($sql_insert);
		$inserts = [
			':order_id' => $order_id,
			':product_name' => $product_name,
			':product_price' => $product_price,
			':quantity' => $quantity,
		];
		return $obj_insert->execute($inserts);
	}
}
