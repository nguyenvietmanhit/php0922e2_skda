<?php
require_once 'controllers/Controller.php';
require_once 'models/User.php';

class UserController extends Controller {
	// index.php?controller=user&action=register
	public function register() {
		// Controller xử lý submit form
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';
		if (isset($_POST['submit'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$password_confirm = $_POST['password_confirm'];
			if ($password != $password_confirm) {
				$this->error = 'Mật khẩu chưa trùng';
			}
			if (empty($this->error)) {
				// Controller gọi Model
				$user_model = new User();
				// Mã hóa mật khẩu trc khi lưu:
				$password_hash = password_hash($password,
					PASSWORD_BCRYPT);
				$is_insert = $user_model
					->registerUser($username, $password_hash);
				var_dump($is_insert);
			}
		}

		// Controller gọi View:
		$this->page_title = 'Form đky user';
		$this->content =
			$this->render('views/users/register.php');
		// Cần tạo 1 layout khác, copy file main->main_user.php
		// ,
		require_once 'views/layouts/main_user.php';
//		require_once 'views/layouts/main.php';
	}
}
