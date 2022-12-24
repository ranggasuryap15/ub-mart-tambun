<?php
session_start();

require_once(__DIR__ . "/../Class/Akun.php");
$akun = new Akun;

$username = strip_tags(trim($_POST['username']));
$password = strip_tags(trim($_POST['password']));

if (isset($_POST['btnLogin'])) {
    $result = $akun->checkAccount($username, $password);

    // session by name
    foreach ($result as $row) :
        $username = $row['username'];
        $nama = $row['nama_kasir'];
        $nama = explode(" ", $nama); // pisahkan nama
        $_SESSION['nama_kasir'] = $nama[0]; // ambil nama depan
        $_SESSION['username'] = $username;
    endforeach;

    $_SESSION['nama_kasir'] = $nama[0]; // ambil nama depan
    $_SESSION['username'] = $username;
    header('location:../../index.php');

    // $_SESSION['nama_kasir'] = $namaKasir;
    // $_SESSION['username'] = $username;
    // if (!isset($result)) {
        
    // } else {
    //     header('location:../../pages/login.php');
    // }
}
