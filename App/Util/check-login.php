<?php
require_once(__DIR__ . "/../Class/Akun.php");

if (isset($_POST['btnLogin'])) {
    $akun = new Akun;

    $username = strip_tags(trim($_POST['username']));
    $password = strip_tags(trim($_POST['password']));

    if (isset($username) && isset($password)) {
        $result = $akun->checkAccount($username, $password);

        if ($result) {
            // session by name
            foreach ($result as $row):
                $username = $row['username'];
                $nama = $row['nama_kasir'];
                $nama = explode(" ", $nama);
            endforeach;

            $_SESSION['nama_kasir'] = $nama[0]; // ambil nama depan
            $_SESSION['username'] = $username;

            echo "<script>alert('Login sukses');</script>";
            echo '<script> window.location="../../dashboardkasir.php"; </script>';
        } else {
            echo "<script> alert('Akun yang anda masukkan salah'); </script>";
            echo '<script> window.location="../../index.php"; </script>';
        }
    }
}