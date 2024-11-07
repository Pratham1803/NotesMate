<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NotesMate - Profile</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.css" />
</head>

<body>
    <?php
    include("Navbar.php");
    ?>
    <div class="container mt-3">
        <h3>Name: <?php echo "" . $_COOKIE["username"]; ?> </h3>
    </div>    

</body>

</html>