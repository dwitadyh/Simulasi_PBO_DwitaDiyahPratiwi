<?php
// database.php

$host = "localhost";
$username = "root";
$password = ""; // Kosongkan jika menggunakan XAMPP bawaan
// Sesuaikan dengan nama database Anda dari Tahap 1
$database = "db_simulasi_pbo_ti1c_dwitadiyahpratiwi"; 

try {
    // Menggunakan PDO untuk koneksi database berorientasi objek
    $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $username, $password);
    
    // Mengatur mode error PDO ke Exception untuk mempermudah debugging
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    // Jika koneksi gagal, tampilkan pesan error
    die("Koneksi database gagal: " . $e->getMessage());
}
?>