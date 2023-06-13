<?php
// Langkah 1: Menghubungkan ke database
$con = mysqli_connect('localhost', 'id20904942_tirzafebiana', '@12Tirza', 'id20904942_keytopiacustomdatabase');
if (!$con) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Inisialisasi variabel
$email = $password = '';

// Langkah 2: Memproses data yang dikirimkan melalui formulir
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil nilai dari input
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Langkah 3: Memeriksa kecocokan data login dengan data di database
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Langkah 4: Mengarahkan pengguna ke index.html setelah berhasil login
        header("Location: index.html");
        exit();
    } else {
        echo "Email atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Custom Keycaps For You! ʚ(´◡`)ɞ</title>
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
</head>
<body>

<!-- header -->
<header class="header">
    <div class="nav-section">
        <div class="brand-and-navBtn">
            <span class="brand-name">
                KEYTOPIA
            </span>
            <span class="navBtn flex">
                <i class="fas fa-bars"></i>
            </span>
        </div>

        <!-- navigation menu -->
        <nav class="top-nav">
            <ul>
                <li><a href="login.php" class="active">Login</a></li>
            </ul>
        </nav>
    </div>

    <div class="container about">
        <div class="about-content">
            <div class="about-img flex">
                <img src="foto gallery/keycaps/Pink Funky Design Logo.jpg">
            </div>
            <h2>KEYTOPIA CUSTOM</h2>
        </div>
        <div class="container">
            <form action="" method="POST" class="login-email">
                <div class="input-group">
                    <input type="email" placeholder="Email" name="email" value="<?php echo htmlspecialchars(isset($email) ? $email : ''); ?>" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Password" name="password" value="" required>
                </div>
                <div class="input-group">
                    <button name="submit" class="btn">Login</button>
                </div>
                <p class="login-register-text">Tidak Punya akun <a href="register.php">Buat Akun</a>.</p>
            </form>
        </div>
    </div>
</header>
</body>
</html>
