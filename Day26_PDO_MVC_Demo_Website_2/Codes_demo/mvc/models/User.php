<?php
//models/User.php
require_once 'models/Model.php';

class User extends Model {
    public function insertUser($name, $age, $avatar) {
        // B1: Viết truy vấn dạng tham số:
        $sql_insert = "INSERT INTO users(name,age,avatar)
        VALUES(:name,:age,:avatar)";
        // B2: Cbi obj truy vấn:
        $obj_insert = $this->connection->prepare($sql_insert);
        // B3: Tạo mảng
        $inserts = [
            ':name' => $name,
            ':age' => $age,
            ':avatar' => $avatar
        ];
        // B4: Thực thi
        return $obj_insert->execute($inserts);

    }

    public function getUsers() {
        // B1:
        $sql_select_all =
            "SELECT * FROM users ORDER BY created_at DESC";
        // B2:
        $obj_select_all = $this->connection->prepare($sql_select_all);
        // B3: Tạo mảng, bỏ qua
        // B4:
        $obj_select_all->execute();
        // B5:
        return $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
    }
}