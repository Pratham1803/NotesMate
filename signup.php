<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.css" />
    <title>NotesMate - Sign Up</title>
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
                            <h5>Registration</h5>
                        </center>
                    </div>
                    <hr />
                    <div class="card-body">
                        <!-- Sign Up form -->
                        <form action="#" class="form-group" method="POST">
                            <input type="text" name="txtUsername" class="form-control"
                                placeholder="Enter User Name Here" />
                            <input type="password" name="txtPassword" class="form-control mt-4"
                                placeholder="Enter Password Here" />
                            <input type="password" name="confirm_password" class="form-control mt-4"
                                placeholder="Confirm Password" />
                            <button type="submit" name="submit" class="btn btn-primary mt-5 form-control">Create
                                Account</button>
                            Already have an account? <a href="login.php" class="mt-5">Login</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </center>
    <?php

    if (isset($_POST['submit'])) { // check that form is submitted
        require "model/userModel.php";  // usermodel.php is required
        require "db.php"; // database.php is required

        $user = new UserModel(); // creating object of user model class to store user information
        $user->setUsername($_POST['txtUsername']); // set username from text input field using post function
        $user->setPassword($_POST['txtPassword']); // set password from text input field using post function
        $confirm_password = $_POST['confirm_password']; // set confirmation password from text input field using post function

        // validate the user input using validate function
        if (validate($user, $confirm_password)) { // check that the user input is correct
            // if user input is valid, register the user using the registerUser function from database.php  
            // inset the user information in database
            $db = new DbHandler(); // create object of DbHandler clas for database operations

            // try-catch block to handle any exceptions that may occur during database operations
            try {
                // register the user if no exceptions occur
                if ($db->registerUser($user)) { 
                    // if user registration is successful, start a session and set the user cookie
                    session_start();

                    // set the user id in session and set the username cookie
                    $_SESSION['user'] = $user->getId();
                    setcookie("username", $_POST['txtUsername'], time() + (86400 * 30));
                    header("Location:index.php");
                } else {
                    // user not registered, shor alert message
                    echo "<script>alert('Failed to register user')</script>";
                }
            } catch (Exception $exception) {
                // if user registration is unsuccessful, handle the exception
                if ($exception->getCode() == 23000) {
                    echo "<script>alert('Username already exists')</script>";
                } else {
                    echo "<script>alert('Failed to register user')</script>";
                    echo $exception->getMessage();
                }
                return false;
            }
        }
    }

    // function to validate user input
    function validate($user, $confirm_password)
    {
        // check if password and confirm password fields are not empty
        if ($confirm_password == '') {
            echo "<script>alert('Password cannot be empty')</script>";
            return false;
        }

        // check if username field is not empty
        if ($user->getUsername() == '') {
            echo "<script>alert('Username cannot be empty')</script>";
            return false;
        }

        // check if password and confirm password fields match
        if ($user->getPassword() == '') {
            echo "<script>alert('Password cannot be empty')</script>";
            return false;
        }

        // check if password and confirm password fields match
        if ($user->getPassword() != $confirm_password) {
            echo "<script>alert('Passwords do not match..')</script>";
            echo "password = " . $user->getPassword();
            echo "confirm password = " . $confirm_password;
            return false;
        }
        return true;
    }
    ?>
</body>

</html>