<?php
//models/Model.php
// Model cha, chứa 1 thuộc tính kết nối dùng chung
//cho mọi model con
require_once 'configs/Database.php';
class Model {
    public $connection; //obj kết nối CSDL

    public function __construct() {
        try {
            $this->connection = new PDO(Database::DB_DSN,
            Database::DB_USERNAME,
                Database::DB_PASSWORD);
        } catch (PDOException $e) {
            die('Lỗi kết nối: ' . $e->getMessage());
        }
    }
}