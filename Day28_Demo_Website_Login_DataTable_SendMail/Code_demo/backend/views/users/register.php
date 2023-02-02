<?php
//views/users/register.php
?>
<h2>Form đky user</h2>
<form action="" method="post">
	<div class="form-group">
		<label for="username">Username</label>
		<input type="text" name="username" id="username"
			   class="form-control" />
	</div>
	<div class="form-group">
		<label for="password">Mật khẩu</label>
		<input type="password" name="password" id="password"
			   class="form-control" />
	</div>
	<div class="form-group">
		<label for="password_confirm">Nhập lại mk</label>
		<input type="password" name="password_confirm"
			   id="password_confirm" class="form-control" />
	</div>
	<div class="form-group">
        <input type="submit" name="submit" value="Đky"
               class="btn btn-success">
    </div>
</form>
