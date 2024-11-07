<?php
session_start(); // start the session

// check that user is logged in or not
if (!isset($_SESSION['user'])) {
    // if not logged in, redirect to login page
    header("Location: login.php");
}

require "model/postModel.php"; // post model file is require
require "db.php"; // database file is require
$post = new PostModel(); // object of post model
$db = new DbHandler(); // object of DbHandler for databse operatins

// get the post details for the specific post by its id
$existingPost = $db->getPost($_GET['id']);

// store title and description for later
$title = htmlspecialchars($existingPost['title'], ENT_QUOTES, 'UTF-8'); 
$title = json_encode($title); // encode the title

$content = htmlspecialchars($existingPost['content'],ENT_QUOTES);
$content = json_encode($content); // encode the content

// check if the user has submitted the form for updation
if (isset($_POST['submit'])) {
    // if form is submitted, store the post data in PostModel Object
    $post->setId($_GET['id']); // set post id from query string
    $post->setTitle($_POST['title']); // set post title from textfield
    $post->setAuthor($_COOKIE['username']); // set author name for user name stored in cookie
    $post->setContent( $_POST['content']); // set content form textfield
    $post->setSubject($_POST['subjects']); // set subject name from drop box

    // try to update the post in database and handle any exceptions that may occur
    try {
        // call update method to update the post from DbHandler class
        if ($db->updatePost($post)) {
            // post was successfully updated
            echo "<script>alert('Note Updated')</script>";
            header("Location: singlePost.php?id=" . $post->getId()); // redirect to post page
            exit();
        } else {
            // post was not updated
            echo "<script>alert('Failed to add note.')</script>";
        }
    } catch (Exception $e) {
        // display any exceptions that may occur
        echo "Error: " . $e->getMessage();
    }
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
    include("Navbar.php");
    ?>
    <div class="container mt-3">
        <h3> Hello, <?php echo "" . $_COOKIE["username"]; ?> 👋, Let's Update Existing Note </h3>
    </div>
    <div class="container mt-4" style="height: 100vh">
        <div class="row">
            <div class="col-md-8">
                <h6>Write that you want to change...</h6>
                <div class="bg-primary">
                    <!-- Post form -->
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

                        <input type="text" class="form-control" name="title" id="title" placeholder="Add title">
                        <textarea name="content" rows="20" id="content" class="mt-4 form-control"
                            placeholder="Add description"></textarea>

                        <input type="submit" name="submit" class="mt-4 btn btn-success" name="post_button"
                            value="Update Note">
                    </form>
                </div>
            </div>
        </div>
        <script>
            // set the selected subject from post data to the drop box
            // data is collected fromt the database
            var subjects = document.getElementById('subjects');
            var selectedSubject = "<?php echo $existingPost['subject'] ?>";
            subjects.value = selectedSubject;

            // set the title and content from post data to the text fields
            document.getElementById('title').value = <?php echo $title ?>;
            document.getElementById('content').value = <?php echo $content ?>;
        </script>
    </div>
    </div>
</body>

</html>