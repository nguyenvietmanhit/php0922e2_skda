<?php
require_once 'models/Model.php';
class User extends Model {

	public function registerUser($username, $password_hash) {
		$sql_insert = "INSERT INTO users(username, password)
VALUES (:username,:password)";
		$obj_insert = $this->connection->prepare($sql_insert);
		$inserts = [
			':username' => $username,
			':password' => $password_hash
		];
		return $obj_insert->execute($inserts);
	}
}
