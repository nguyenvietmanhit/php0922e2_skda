<?php
// backend/controllers/UserController.php
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

	// index.php?controller=user&action=login
	public function login() {
		// Xử lý submit form
		if (isset($_POST['submit'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			if (empty($username) || empty($password)) {
				$this->error = 'Phải nhập username/password';
			}
			if (empty($this->error)) {
				// Xử lý login:
				// - Lấy user dựa theo username
				$user_model = new User();
				$user = $user_model->getUser($username);
//				echo '<pre>';
//				print_r($user);
//				echo '</pre>';
				if (empty($user)) {
					$this->error = 'Username ko tồn tại';
				} else {
					// - Nếu user tồn tại thì lấy mật khẩu đã mã hóa của user đó
					// và so khớp với mật khẩu gửi từ form
					$password_hash = $user['password'];
					// Sử dụng hàm PHP để so khớp pass
					$is_login = password_verify($password, $password_hash);
					var_dump($is_login);
					if ($is_login) {
						$_SESSION['user'] = $user;
						$_SESSION['success'] = 'Login thành công';
						header('Location: index.php?controller=product');
						exit();
					}
					$this->error = 'Sai tk/mk';
				}

			}
		}

		// Controller gọi View
		$this->page_title = 'Form login';
		$this->content = $this->render('views/users/login.php');
		//Gọi layout để hiển thị:
		require_once 'views/layouts/main_user.php';
	}
}
