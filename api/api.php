<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "antrian";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Pastikan menggunakan metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari POST dan validasi
    $no_antrian =$_POST['data'] ?? '';

    // Ambil tanggal sekarang secara otomatis
    $tanggal = date("Y-m-d");

        // Siapkan statement untuk menghindari SQL Injection
        $stmt = $conn->prepare("INSERT INTO tbl_antrian (tanggal, no_antrian) VALUES (?, ?)");
        
        if ($stmt) {
            $stmt->bind_param("si", $tanggal, $no_antrian); // "s" untuk string (tanggal), "i" untuk integer (no_antrian)
            if ($stmt->execute()) {
                echo "Data berhasil dimasukkan";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo "Data tidak boleh kosong";
    }

$conn->close();
?>
