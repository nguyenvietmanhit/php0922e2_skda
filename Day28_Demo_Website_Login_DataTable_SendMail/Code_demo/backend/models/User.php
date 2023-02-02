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

	public function getUser($username) {
		// B1:
		$sql_select_one = "SELECT * FROM users WHERE username=:username";
		// B2:
		$obj_select_one = $this->connection->prepare($sql_select_one);
		// B3:
		$selects = [
			':username' => $username
		];
		// B4:
		$obj_select_one->execute($selects);
		// B5:
		return $obj_select_one->fetch(PDO::FETCH_ASSOC);
	}
}
