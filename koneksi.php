<?php
$servername = "localhost";
$username = "root"; // ganti dengan username database Anda
$password = ""; // ganti dengan password database Anda
$dbname = "seminar"; // ganti dengan nama database Anda

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Proses pendaftaran
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $institution = $_POST['institution'];
    $country = $_POST['country'];
    $address = $_POST['address'];

    $sql = "INSERT INTO registration (email, name, institution, country, address) VALUES ('$email', '$name', '$institution', '$country', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: green;'>Pendaftaran berhasil!</p>";
    } else {
        echo "<p style='color: red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}

$conn->close();
?>

