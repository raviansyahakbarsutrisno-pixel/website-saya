<?php
$servername = "localhost";
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "website_pribadi"; // Ganti dengan nama database yang Anda buat

// Buat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars(trim($_POST['nama']));
    $email = htmlspecialchars(trim($_POST['email']));
    $pesan = htmlspecialchars(trim($_POST['pesan']));

    if (!empty($nama) && !empty($email) && !empty($pesan)) {
        // Persiapkan dan bind statement untuk mencegah SQL Injection
        $stmt = $conn->prepare("INSERT INTO pesan (nama, email, pesan) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nama, $email, $pesan);

        if ($stmt->execute()) {
            echo "Pesan Anda berhasil terkirim! Terima kasih.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Mohon lengkapi semua kolom.";
    }
} else {
    echo "Metode request tidak valid.";
}

$conn->close();
?>