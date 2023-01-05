<?php
session_start();

require_once(__DIR__ . "/../Class/Akun.php");
$akun = new Akun;

$username = strip_tags(trim($_POST['username']));
$password = strip_tags(trim($_POST['password']));

if (isset($_POST['btnLogin'])) {
    if (isset($username) && isset($password)) {
        $result = $akun->checkAccount($username, $password);
    
        if ($result) {
            // session by name
            foreach ($result as $row) :
                $username = $row['username'];
                $nama = $row['nama_kasir'];
                $nama = explode(" ", $nama); 
            endforeach;

            $_SESSION['nama_kasir'] = $nama[0]; // ambil nama depan
            $_SESSION['username'] = $username;
            header('location:../../dashboardkasir.php');
        } else {
            header('location:../../dashboardkasir.php');
        }
    }
}
