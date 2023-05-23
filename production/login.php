<?php
// panggil koneksi
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    // Mengenkripsi password menggunakan MD5
    $password = md5($_POST["password"]);

    // Anda perlu mengganti ini dengan query yang sesuai untuk database Anda
    $sql = "SELECT * FROM tb_admin WHERE username='$username' AND password='$password'";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        // login berhasil
        // anda mungkin ingin memulai sesi, menyimpan beberapa data di dalamnya, dll.
        echo "Login berhasil!";
        
        // Redirect ke halaman dashboard
        header("Location: dashboard.php");
    } else {
        // login gagal
        echo "Username atau password salah.";
    }
}
?>
