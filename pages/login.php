<?php
require_once (__DIR__ . "/../App/Class/Akun.php");
require_once (__DIR__ . "/../App/Util.php");

if (isset($_POST['btnLogin'])) {

	$username = $_POST['username'];
	$password = $_POST['password'];

	$objAkun = new Akun();
	$objAkun->ValidateAkun($username);

	if ($objAkun->hasil) {

		$ismatch = password_verify($password, $objAkun->password);

		if ($ismatch) {
			if (!isset($_SESSION)) {
				session_start();
			}

			$_SESSION["username"] = $objAkun->username;
			$_SESSION["nama_kasir"] = $objAkun->nama_kasir;
			$_SESSION["no_hp"] = $objAkun->no_hp;
			$_SESSION["role"] = $objAkun->role;

			echo "<script>alert('Login sukses');</script>";

			if ($objAkun->role == 'admin') {
				echo '<script>window.location = "dashboardadmin.php";</script>';
			} else if ($objAkun->role == 'kasir') {
				echo '<script>window.location = "dashboardkasir.php";</script>';
			}
		} else {
			echo "<script>alert('Password tidak match');</script>";
		}
	} else {
		echo "<script>alert('Email tidak terdaftar');</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
</head>

<body>
    <div>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h1 class="title pb-5 text-center"><strong>LOGIN</strong></h1>
                    <form action="" class="row g-3 justify-content-center" method="POST">
                        <div class="col-md-10">
                            <label for="email">Username: </label>
                            <input type="text" class="form-control mt-2" placeholder="Enter Username" name="username" required>
                        </div>
                        <div class="col-md-10">
                            <label for="password">Password: </label>
                            <input type="password" class="form-control mt-2" placeholder="Password" name="password" required><br>
                        </div>
                        <div class="col-md-3 d-grid">
                            <button class="btn btn-primary" name="btnLogin" type="submit" value="Login">Login</button>
                        </div>
                        <div class="col-md-3 d-grid">
                            <button class="btn btn-danger" name="btnCancel"><a href="index.php" style="color: #fff; text-decoration: none;">Cancel</a></button>
                        </div>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>

</html>