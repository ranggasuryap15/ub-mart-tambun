<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- NANTI PAGENYA GAUSAH INISIALISASI LINK2NYA, SCRIPTNYA, METANYA, DLL DIDALEM HEAD SELAIN TITLE AJA YAA!!. Contohnya kyk page home -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- SCRIPT -->
    <script src="assets/js/jquery-3.6.1.min.js" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- NAVIGATION BAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow p-3">
        <div class="container justify-content-center">
            <a class="navbar-brand" href="#">
                <img class="" src="assets/images/ubmart.png" alt="" height="30">
            </a>
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
        include($pages_dir . '/login.php');
    }    
    ?>

    <!-- FOOTER -->
    <footer class="footer text-bg-dark fixed-bottom">
        <div class="container mt-4">
            <div class="row py-4">
                <div class="col-md-12 text-center">
                    <img class="" src="assets/images/ubmart.png" alt="" height="30">
                    <p class="mt-3">© 2022 copyright all right reserved | Designed with by EBS Student</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- <script src="assets/js/main.js"></script> -->
    <script src="assets/js/autocalc.js" crossorigin="anonymous"></script>
</body>

</html>