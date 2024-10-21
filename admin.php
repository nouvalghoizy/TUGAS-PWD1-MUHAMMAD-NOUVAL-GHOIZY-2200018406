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

// Proses delete (soft delete)
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "UPDATE registration SET is_deleted = 1 WHERE id = $id";
    $conn->query($sql);
}

// Proses penambahan peserta
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $institution = $_POST['institution'];
    $country = $_POST['country'];
    $address = $_POST['address'];

    $sql = "INSERT INTO registration (email, name, institution, country, address) VALUES ('$email', '$name', '$institution', '$country', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: green;'>Peserta berhasil ditambahkan!</p>";
    } else {
        echo "<p style='color: red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}

// Ambil data peserta
$sql = "SELECT * FROM registration WHERE is_deleted = 0";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Pendaftaran Seminar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        h3 {
            color: #555;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
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
    <h2>Data Peserta Seminar</h2>

    <!-- Form untuk menambahkan peserta baru -->
    <h3>Tambah Peserta Baru</h3>
    <form method="post" action="">
        Email: <input type="email" name="email" required><br>
        Nama: <input type="text" name="name" required><br>
        Institusi: <input type="text" name="institution" required><br>
        Negara: <input type="text" name="country" required><br>
        Alamat: <textarea name="address" required></textarea><br>
        <input type="submit" value="Tambah Peserta">
    </form>

    <table>
        <tr>
            <th>Email</th>
            <th>Nama</th>
            <th>Institusi</th>
            <th>Negara</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['institution']; ?></td>
            <td><?php echo $row['country']; ?></td>
            <td><?php echo $row['address']; ?></td >
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="?delete=<?php echo $row['id']; ?>">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>