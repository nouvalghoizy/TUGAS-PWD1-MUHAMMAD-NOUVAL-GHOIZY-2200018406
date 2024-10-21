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

// Ambil ID peserta dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data peserta berdasarkan ID
    $sql = "SELECT * FROM registration WHERE id = $id AND is_deleted = 0";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
}

// Proses update data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $institution = $_POST['institution'];
    $country = $_POST['country'];
    $address = $_POST['address'];

    $sql = "UPDATE registration SET email='$email', name='$name', institution='$institution', country='$country', address='$address' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: green;'>Data berhasil diperbarui!</p>";
    } else {
        echo "<p style='color: red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Peserta Seminar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Edit Data Peserta Seminar</h2>
    <form method="post" action="">
        Email: <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>
        Nama: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>
        Institusi: <input type="text" name="institution" value="<?php echo $row['institution']; ?>" required><br>
        Negara: <input type="text" name="country" value="<?php echo $row['country']; ?>" required><br>
        Alamat: <textarea name="address" required><?php echo $row['address']; ?></textarea><br>
        <input type="submit" value="Perbarui">
    </form>
</body>
</html>