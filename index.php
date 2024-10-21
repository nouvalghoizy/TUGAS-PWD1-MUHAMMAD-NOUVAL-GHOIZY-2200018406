<!DOCTYPE html>
<html>
<head>
    <title>Registrasi Seminar</title>
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
    <h2>Form Registrasi Peserta Seminar</h2>
    <form method="post" action="koneksi.php">
        Email: <input type="email" name="email" required><br>
        Nama: <input type="text" name="name" required><br>
        Institusi: <input type="text" name="institution" required><br>
        Negara: <input type="text" name="country" required><br>
        Alamat: <textarea name="address" required></textarea><br>
        <input type="submit" value="Daftar">
    </form>
</body>
</html>