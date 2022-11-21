<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark sticky-top py-0 px-2">
        <div class="container-fluid">
            <a href="dashboardadmin.php?p=home" class="navbar-brand"><img src="./img/logoheader.png" alt="" class="m-3 w-50"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="dashboardadmin.php?p=home" class="nav-link text-white">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboardadmin.php?p=exploreadmin" class="nav-link text-white">Explore</a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboardadmin.php?p=requestedlist" class="nav-link text-white">Requested List</a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboardadmin.php?p=userlist" class="nav-link text-white">User List</a>
                    </li>
                </ul>
            </div>
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle rounded-circle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"></a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li name="setting"><a class="dropdown-item" href="dashboardadmin.php?p=profilesettings&userid="<?php echo $objUser->userid; ?>">Profile Settings</a></li>
                    <li><a class="dropdown-item text-danger" href="dashboardadmin.php?p=logout">Log Out</a></li>
                </ul>
            </div>
            <a href="dashboardadmin.php?p=profilesettings"><img src="./img/default.png" alt="" class="w-25"></a>
        </div>
    </nav>

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
        include($pages_dir . '/home.php');
    }
    ?>

    <footer class="bg-dark text-white pt-5">
        <div class="footer-top mt-20 container">
            <div class="row gy-4">
                <div class="col-lg-3">
                    <img class="logo w-50" src="./img/logofooter.png" alt="">
                </div>
                <div class="col-lg-2">
                    <h3 class="text-white">Brand</h3>
                    <ul class="list-unstyled">
                        <li><a href="dashboardadmin.php?p=home" style="color: #fff; text-decoration: none;">Home</a></li>
                        <li><a href="dashboardadmin.php?p=explore" style="color: #fff; text-decoration: none;">Explore</a></li>
                        <li><a href="dashboardadmin.php?p=contact" style="color: #fff; text-decoration: none;">Contact</a></li>
                        <li><a href="dashboardadmin.php?p=requestlist" style="color: #fff; text-decoration: none;">Contact</a></li>
                        <li><a href="dashboardadmin.php?p=userlist" style="color: #fff; text-decoration: none;">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h3 class="text-white">Contact</h3>
                    <ul class="list-unstyled">
                        <li>Address: Jl. TB Simatupang</li>
                        <li>Email: chiekal.mulia@students.esqbs.ac.id</li>
                        <li>Email: khaira.isyara@students.esqbs.ac.id</li>
                        <li>Email: mohamad.reyhand.f@students.esqbs.ac.id</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-0">© 2022 copyright all right reserved | Designed with by TUBIRIT</p>
                    </div>
                    <div class="col-md-6">
                        <div class="social-icons">
                            <a href="#"><i class='bx bxl-facebook'></i></a>
                            <a href="#"><i class='bx bxl-twitter'></i></a>
                            <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                        </div>
                    </div>
                </div>
            </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>