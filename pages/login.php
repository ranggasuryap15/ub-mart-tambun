<?php
session_start();
require_once (__DIR__ . "/../App/Class/Akun.php");
$akun = new Akun;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
</head>

<body>
    <div class="container">
        <form method="post" id="formLogin" action="/ub-mart-tambun/App/Util/check-login.php">
            <div class="mb-1 row">
                <label for="username" class="col-form-label fs-5">Username</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                </div>
            </div>

            <div class="mb-1 row">
                <label for="password" class="col-form-label fs-5">Password</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="username" placeholder="Password" name="password">
                </div>
            </div>
            <input class="btn btn-primary btn-lg rounded-pill my-4" type="submit" value="Login" id="btnLogin" name="btnLogin">
        </form>
    </div>
</body>

</html>