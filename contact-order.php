<?php
// Menghubungkan ke database
$con = mysqli_connect('localhost', 'id20904942_tirzafebiana', '@12Tirza', 'id20904942_keytopiacustomdatabase');

// Memeriksa apakah tombol Submit Photo telah ditekan
if(isset($_POST['submitPhoto'])) {
    // Mendapatkan informasi file gambar
    $file = $_FILES['photo-input'];

    // Memeriksa apakah ada kesalahan saat mengunggah gambar
    if($file['error'] === 0) {
        // Mengambil nama file gambar
        $fileName = $file['name'];

        // Memindahkan file gambar ke folder tujuan
        move_uploaded_file($file['tmp_name'], 'foto_gallery/' . $fileName);

        // Memasukkan data ke dalam tabel order
        $tipeKeycaps = $_POST["tipe_keycaps"];
        $jumlah = $_POST["jumlah"];
        $namaPengguna = $_POST["nama_pengguna"];
        $alamatPengiriman = $_POST["alamat_pengiriman"];
        $message = $_POST["message"];

        $query = "INSERT INTO `order` (`tipe_keycaps`, `gambar`, `jumlah`, `nama_pengguna`, `alamat_pengiriman`, `message`) VALUES ('$tipeKeycaps', '$fileName', '$jumlah', '$namaPengguna', '$alamatPengiriman', '$message')";
        mysqli_query($con, $query);
    }
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Custom Keycaps For You! ʚ(´◡`)ɞ</title>
        <meta name = "viewport" content = "width=device-width, intial-scale=1.0">
        <link rel="stylesheet" href="css.css">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
    </head>
    <body>
        
        <!-- header -->
        <header class = "header">
            <div class = "nav-section">
                <div class = "brand-and-navBtn">
                    <span class = "brand-name">
                        KEYTOPIA
                    </span>
                    <span class = "navBtn flex">
                        <i class = "fas fa-bars"></i>
                    </span>
                </div>

                <!-- navigation menu -->
                <nav class = "top-nav">
                    <ul>
                        <li><a href = "login.php" >Login</a></li>
                        <li><a href = "Profile.html">Profile</a></li>
                        <li><a href = "index.html"  >Home</a></li>
                        <li><a href = "gallery.html"  >Gallery</a></li>
                        <li><a href = "contact-order.php" class = "active" >Order</a></li>
                    </ul>
                </nav>
            
            </div>

            <div class = "container about">
                <div class = "about-content">
                    <div class = "about-img flex">
                        <img src = "foto gallery/keycaps/Pink Funky Design Logo.jpg" alt = "photographer img">
                    </div>
                    <h2>KEYTOPIA CUSTOM</h2>
                    <blockquote>
                        "Customisation is not just about making something unique, it's about making something that truly represents who you are."
                        <span>-KEYTOPIA</span>
                    </blockquote>
                </div>

                <div class = "social-icons">
                    <ul>
                        <li>
                            <a href = "#"><i class = "fab fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href = "#"><i class = "fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href = "#"><i class = "fab fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href = "#"><i class = "fab fa-pinterest"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <!-- end of header -->

        <!-- main -->
        <section class = "section-five">
            <div class = "container">
                <div class = "contact-top">
                    <h3>CONTACT US</h3>
                    <p>For more information you can follow us.</p>
                </div>

                <div class = "contact-middle">
                    <div>
                        <span class = "contact-icon">
                            <i class = "fas fa-map-signs"></i>
                        </span>
                        <span>Address</span>
                        <p>Jl. Kampus Unsrat</p>
                    </div>

                    <div>
                        <span class = "contact-icon">
                            <i class = "fas fa-phone"></i>
                        </span>
                        <span>Contact Number</span>
                        <p>0822 2445 6789</p>
                    </div>

                    <div>
                        <span class = "contact-icon">
                            <i class = "fas fa-paper-plane"></i>
                        </span>
                        <span>Email Address</span>
                        <p>keytopiacustomforu@gmail.com</p>
                    </div>

                    <div>
                        <span class = "contact-icon">
                            <i class = "fas fa-globe"></i>
                        </span>
                        <span>Website</span>
                        <p>keytopiacustom.000webhostapp.com </p>
                    </div>
                </div>

                <div class = "contact-bottom">
                    <form class = "form">
                        <label for="Tipe-keycaps">Tipe Keycaps    </label>
                        <select id="Tipe-keycaps" name="tipe_keycaps">
                            <option value="Clay">Clay</option>
                                <option value="Akrilik">Akrilik</option>
                                <option value="3D print">3D print</option>
                        </select><br>
                        <label for="Contoh-gambar-custom">Contoh Gambar Custom    </label>
                            <input type="file" id="photo-input">
                            <button type="button" onclick="submitPhoto()">Submit Photo</button>
                        <div id="photo-preview"></div>
                        <?php
                            // Menampilkan gambar yang telah diunggah jika ada
                            $query = "SELECT `gambar` FROM `order`";
                            $result = mysqli_query($con, $query);

                            if(mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo '<img src="foto_gallery/' . $row['gambar'] . '" alt="Uploaded Photo">';
                                }
                            }
                            ?>
                        <input type="text" placeholder="Jumlah" name="jumlah">
                        <input type = "text" placeholder="Nama Pengguna" name="nama_pengguna">
                        <input type = "text" placeholder="Alamat Pengiriman" name="alamat_pengiriman">
                        <textarea rows = "9" placeholder="Message" name="message"></textarea>
                        <input type = "submit" class = "btn" value = "Send Message" name="proses">
                    </form> 

                    <!-- Map -->
                    <div>
                        <iframe src="foto gallery/keycaps/keycaps12.jpg" width="85%" height="500px" frameborder="10" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of main -->


   <!-- footer -->
   <footer class = "footer">
    <div class = "footer-container container">
        <div>
            <h2>KEYTOPIA</h2>
            <p> From minimalist to extravagant, our customisation options offer endless possibilities to express your style and make a statement. Browse our collection and let your creativity flow - the perfect keycaps are just a few clicks away!</p>
        </div>
        <div>
            <h3>Hey, any suggestions ? </h3>
            <p>Please, if you have suggestions and opinions regarding our product.</p>

            <div class = "text">
                <i class = "fas fa-envelope"></i>
                <input type = "text" id = "text" placeholder="comment">
                <button type = "submit">SEND</button>
            </div>
        </div>
    </div>
    <p> ❁ Kelompok 5 ❁</p>
</footer>
<!-- end of footer -->

        <script src="script.js"></script>
    </body>
</html>