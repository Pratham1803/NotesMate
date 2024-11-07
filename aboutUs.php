<!DOCTYPE html>
<html lang="en">

<!-- display the about us page -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NotesMate - About Us</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.css" />
</head>

<body>
    <?php
    include("Navbar.php");
    ?>
    <div class="container mt-3">
        <h3><?php echo "Hello, " . $_COOKIE["username"] . "!! Let's See our team..." ?> </h3>
        <br>
        <hr><br>
        <ul>
            <li>
                <h5>24MCA021 Hinal Gajjar</h5>
            </li>
            <li>
                <h5>24MCA022 Vivek Ganatra</h5>
            </li>
            <li>
                <h5>24MCA093 Akshat Shah</h5>
            </li>
            <li>
                <h5>24MCA143 Pratham Rathod</h5>
            </li>
            <li>
                <h5>24MCA151 Shruti Mehata</h5>
            </li>
        </ul>

        <p>
            This is website is use to manage the notes with your clasmates according to the subjects, also you can
            create your user account and add notes by your self.
        </p>
    </div>

</body>

</html>