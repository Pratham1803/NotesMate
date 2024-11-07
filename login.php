<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.css" />
    <title>NotesMate - Sign In</title>
</head>

<body>
    <?php
    include("Navbar.php");
    ?>
    <center>
        <br><br><br>
        <div class="col-md-5">
            <div class="container bg-warning p-2  mt-1">
                <div class="card-primary mt-3">
                    <div class="card-title">
                        <center>
                            <h5>Login</h5>
                        </center>
                    </div>
                    <hr />
                    <div class="card-body">
                        <!-- Login form -->
                        <form action="#" class="form-group" method="POST">
                            <input type="text" name="txtUsername" class="form-control"
                                placeholder="Enter User Name Here" />
                            <input type="password" name="txtPassword" class="form-control mt-4"
                                placeholder="Enter Password Here" />
                            <button type="submit" name="submit" class="btn btn-primary mt-5 form-control">Sign
                                In</button>
                            Don't have an account? <a href="signup.php" class="mt-3">Sign Up</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </center>
</body>
<?php
if (isset($_POST['submit'])) { // submitting form
    require "model/userModel.php"; // require "model/userModel.php file 
    require "db.php"; // require "db.php file

    $user = new UserModel(); // create user model ibject to store user information
    $user->setUsername($_POST['txtUsername']); // set username from textbox of username using post method
    $user->setPassword($_POST['txtPassword']); // set password from textbox of password using post method

    if (validate($user)) { // calling validate method to check user information
        $db = new DbHandler(); // creating object of DbHandle class, for data base operations

        // if user exist in database then set session and cookies, and redirect to index.php page
        if ($db->getUser($user)) { 
            setcookie("username", $_POST['txtUsername'], time() + (86400 * 30)); // set username in cookie
            header("Location:index.php"); // redirect to index page
        }
    }
}

// function to validate user information
function validate($user)
{
    // check if username and password are not empty, if empty than show alert message
    if ($user->getUsername() == '') {
        echo "<script>alert('Username cannot be empty')</script>";
        return false;
    }
    if ($user->getPassword() == '') {
        echo "<script>alert('Password cannot be empty')</script>";
        return false;
    }
    return true;
}
?>

</html>