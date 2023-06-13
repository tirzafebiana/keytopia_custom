<?php
// Langkah 1: Menghubungkan ke database
$con = mysqli_connect('localhost', 'id20904942_tirzafebiana', '@12Tirza', 'id20904942_keytopiacustomdatabase');
if (!$con) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Inisialisasi variabel
$username = $email = $password = $cpassword = '';

// Langkah 2: Memproses data yang dikirimkan melalui formulir
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil nilai dari input
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    // Langkah 3: Validasi input
    if ($password !== $cpassword) {
        echo "Konfirmasi password tidak sesuai.";
    } else {
        // Langkah 4: Menyimpan data pengguna baru ke dalam database
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if (mysqli_query($con, $sql)) {
            // Langkah 5: Mengarahkan pengguna ke halaman login setelah berhasil mendaftar
            header("Location: login.php");
            exit();
        } else {
            echo "Terjadi kesalahan: " . mysqli_error($con);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Register Form</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <h1 style="text-align: center;"><b>Register</b><h1>
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword" value="" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Register</button>
            </div>
            <h3 style="text-align: center;" class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</h3>
        </form>
    </div>
</body>
</html>
