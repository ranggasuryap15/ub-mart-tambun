<?php

class Util {
    // Method of input value sanitazion 
    public function testInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = strip_tags($data);

        return $data;
    }

    public function rupiah($angka) {
        $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
        return $hasil_rupiah;
    }

    // Method for displaying success and error message
    public function showMessage($type, $message) {
        return '<div class="alert alert-' . $type . ' alert-dismissible fade-show" 
        role="alert">
            <strong>' . $message . '</strong>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
}