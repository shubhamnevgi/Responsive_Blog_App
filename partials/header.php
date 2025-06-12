<?php
require 'config/database.php';

// fetch current user from database
if(isset($_SESSION['user-id'])) {
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar FROM users WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $avatar = mysqli_fetch_assoc($result);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP & MYSQL Blog Application with Admin Panel</title>
  <link rel="icon" type="image/x-icon" href="<?= ROOT_URL?>images/fav.png">
  <link rel="stylesheet" href="<?= ROOT_URL ?>css/styles.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="container nav__container">
            <a href="<?= ROOT_URL ?>" class="nav__logo"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0,0,256,256"
style="fill:#000000;">
<g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M9,4c-2.74952,0 -5,2.25048 -5,5v32c0,2.74952 2.25048,5 5,5h32c2.74952,0 5,-2.25048 5,-5v-32c0,-2.74952 -2.25048,-5 -5,-5zM9,6h32c1.66848,0 3,1.33152 3,3v32c0,1.66848 -1.33152,3 -3,3h-32c-1.66848,0 -3,-1.33152 -3,-3v-32c0,-1.66848 1.33152,-3 3,-3zM20,11c-4.94546,0 -9,4.05454 -9,9v5v5c0,4.94546 4.05454,9 9,9h10c4.94546,0 9,-4.05454 9,-9v-6c0,-1.64497 -1.35503,-3 -3,-3h-1c-0.56503,0 -1,-0.43497 -1,-1c0,-4.94546 -4.05455,-9 -9,-9zM20,13h5c3.85455,0 7,3.14545 7,7c0,1.64497 1.35503,3 3,3h1c0.56503,0 1,0.43497 1,1v6c0,3.85455 -3.14545,7 -7,7h-10c-3.85455,0 -7,-3.14545 -7,-7v-5v-5c0,-3.85455 3.14545,-7 7,-7zM20,17c-1.64545,0 -3,1.35455 -3,3c0,1.64545 1.35455,3 3,3h5c1.64545,0 3,-1.35455 3,-3c0,-1.64545 -1.35455,-3 -3,-3zM20,19h5c0.55455,0 1,0.44545 1,1c0,0.55455 -0.44545,1 -1,1h-5c-0.55455,0 -1,-0.44545 -1,-1c0,-0.55455 0.44545,-1 1,-1zM20,27c-1.64545,0 -3,1.35455 -3,3c0,1.64545 1.35455,3 3,3h10c1.64545,0 3,-1.35455 3,-3c0,-1.64545 -1.35455,-3 -3,-3zM20,29h10c0.55455,0 1,0.44545 1,1c0,0.55455 -0.44545,1 -1,1h-10c-0.55455,0 -1,-0.44545 -1,-1c0,-0.55455 0.44545,-1 1,-1z"></path></g></g>
</svg>logSpot</a>
            <ul class="nav__items">
                <li><a href="<?= ROOT_URL ?>blog.php">Blog</a></li>
                <li><a href="<?= ROOT_URL ?>about.php">About</a></li>
                <li><a href="<?= ROOT_URL ?>services.php">Services</a></li>
                <li><a href="<?= ROOT_URL ?>contact.php">Contact</a></li>
                <?php if(isset($_SESSION['user-id'])) :?>
                <li class="nav__profile">
                    <div class="avatar">
                    <img src="<?= ROOT_URL ?>images/<?= $avatar['avatar'] ?>">
                    </div>
                        <ul>
                            <li><a href="<?= ROOT_URL ?>admin/index.php">DashBoard</a></li>
                            <li><a href="<?= ROOT_URL ?>logout.php">Logout</a></li>
                        </ul>
                </li>
                <?php else :?>
                <li><a href="<?= ROOT_URL ?>signin.php">Signin</a></li>
                <?php endif ?>
            </ul>
            <button id="open__nav-btn"><i class="uil uil-bars"></i></button>
            <button id="close__nav-btn"><i class="uil uil-multiply"></i></button>
        </div>
    </nav>
    <!--======================= END OF NAV ==========================-->