<?php
// Koneksi ke database (ganti dengan informasi database Anda)
$host = "localhost";
$username = "root";
$password = "";
$database = "db_toko";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}

// Proses Form Pendaftaran
if(isset($_POST['submit'])) {
    $username = $_POST["username"];
    $password = md5($_POST["password"]); // Gunakan MD5 untuk tujuan pembelajaran, sebaiknya hindari untuk keamanan yang sebenarnya

    // echo  $username;
    // Query untuk menyimpan data ke dalam database
    $sql = "INSERT INTO `login` (user, pass, id_member) VALUES ('$username', '$password', 1)";
    
    if ($conn->query($sql) === TRUE) {
        echo "<p>Pendaftaran berhasil!</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Tutup koneksi ke database
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<form method="post" action="">
    <h2>Registrasi</h2>

    <label for="username">Username:</label>
    <input type="text" name="username" required>

    <label for="password">Password:</label>
    <input type="password" name="password" required>

    <input type="submit" name="submit" value="Register">
    <a href="login.php">LOGIN</a>
</form>

</body>
</html>
