<?php

include (__DIR__ . "/../Config/Config.php");

class Akun extends Config {
    public function checkAccount($username, $password) {
        $sql = "SELECT * FROM kasir_ub_mart.akun WHERE username=:username && password=:password LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('username', $username);
        $stmt->bindParam('password', $password);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
}
?>