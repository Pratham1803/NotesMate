<?php
session_start(); // start the session
if (!isset($_SESSION['user'])) { // if the user is not logged in, user value is undefined
    header("Location: login.php"); // redirect to login page
}
?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="mystyle.css" />
    <link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.css" />
</head>

<body>
    <?php
    include("Navbar.php"); // include the navbar to present the menu items
    ?>
    <div class="container mt-3">
        <!-- display simple hello and user name message, user name is store in cookie when user is logged in -->
        <h3> Hello, <?php echo "" . $_COOKIE["username"]; ?> 👋, Let's Create Some new Notes </h3>
    </div>
    <div class="container mt-4" style="height: 100vh">
        <div class="row">
            <div class="col-md-8">
                <h6>Write that you Learn...</h6>
                <div class="bg-primary">
                    <form method="post" action="#" class="table-responsive p-3">
                        <select class="form-control" name="subjects" id="subjects">
                            <option value="">Select The Subject</option>
                            <option value="php">Web Development in PHP</option>
                            <option value="java">Java Programming</option>
                            <option value="rdbms">Relation Database</option>
                            <option value="nosql">NoSql</option>
                            <option value="flutter">Android Development using flutter</option>
                            <option value="cloudcomputing">Cloud Computing</option>
                            <option value="asps">Acedemic Writting and Speaking</option>
                            <option value="dotnet">ASP.NET</option>
                            <option value="android_java">Android Development using Java</option>
                            <option value="dsa">Data Structure and Algorithms</option>
                        </select><br>

                        <input type="text" class="form-control" name="title" placeholder="Add title">
                        <textarea name="content" rows="20" class="mt-4 form-control"
                            placeholder="Add description"></textarea>

                        <input type="submit" name="submit" class="mt-4 btn btn-success" name="post_button"
                            value="Add Note">
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php
    if (isset($_POST['submit'])) { // check if form is submitted successfully
        require "model/postModel.php"; // postModel.php file is required for executing
        require "db.php"; // db.php file is required for executing
        $post = new PostModel(); // object of postModel class to store the post data in local

        $post->setTitle($_POST['title']); // setting post title in post object
        $post->setAuthor($_COOKIE['username']); // setting author name in post object
        $post->setContent($_POST['content']); // setting content in post object
        $post->setSubject($_POST['subjects']); // setting parent subject in post object

        try {
            $db = new DbHandler(); // object of DbHandler class for data base operations

            // calling addPost function to add the post to the database and handle any exceptions that might occur
            if ($db->addPost($post)) { // if post added succsfully
                echo "<script>alert('Note Added')</script>"; // alert message
                header("Location: index.php"); // redirect to index.php
            } else { // if post not added succsfully
                echo "<script>alert('Failed to add note.')</script>"; // alert message
            }
        } catch (Exception $e) { // if exception occures
            echo "Error: " . $e->getMessage(); // print the error message on screen
        }
    }
    ?>
</body>

</html>