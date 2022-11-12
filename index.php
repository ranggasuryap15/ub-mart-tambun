<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- NANTI PAGENYA GAUSAH INISIALISASI LINK2NYA, SCRIPTNYA, METANYA, DLL DIDALEM HEAD SELAIN TITLE AJA YAA!!. Contohnya kyk page home -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-7mQhpDl5nRA5nY9lr8F1st2NbIly/8WqhjTp+0oFxEA/QUuvlbF6M1KXezGBh3Nb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <!-- NAVIGATION BAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow p-3">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img class="" src="images/ubmart.png" alt="" height="30">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-5">
                    <li class="nav-item mx-5">
                        <a class="nav-link" href="index.php?p=transaksi">Transaksi</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link" href="index.php?p=barang">Barang</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link" href="index.php?p=laporan">Laporan</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="">Keluar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- BODY -->
    <?php
    $pages_dir = 'pages';
    if (!empty($_GET['p'])) {
        $pages = scandir($pages_dir, 0);
        unset($pages[0], $pages[1]);

        $p = $_GET['p'];
        if (in_array($p . '.php', $pages)) {
            include($pages_dir . '/' . $p . '.php');
        } else {
            echo 'Halaman tidak ditemukan! :(';
        }
    } else {
        include($pages_dir . '/barang.php');
    }
    ?>

    <!-- FOOTER -->
    <footer class="footer text-bg-dark">
        <div class="container mt-5">
            <div class="row py-4">
                <div class="col-md-12 text-center">
                    <img class="" src="images/ubmart.png" alt="" height="30">
                    <p class="mt-3">© 2022 copyright all right reserved | Designed with by EBS Student</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>