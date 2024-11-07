<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mystyle.css" />
    <link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.css" />
    <title>NotesMate</title>
</head>

<body>
    <?php
    // Include Navbar and db.php file is required
    include("Navbar.php"); 
    require "db.php";

    echo '<div class="row" style="height: 100vh;width: 100%">
        <div class="container mt-4">';

    $db = new DbHandler(); // objects of DbHandler clas for database operations

    // Fetch post data using GET method from query string
    // call the method from db handler class to retrieve post data
    $data = $db->getPost($_GET['id']);  
    if ($data == NULL) {
        // No post data
        header("Location: index.php"); // return empty to index page
        exit;
    }

    // display post data
    echo "<h3>" . $data['title'] . "</h3><br><hr><br>"; // display title
    echo "<pre>" . htmlspecialchars($data['content'])  . "<pre>"; // display content

    echo '<br><br>';

    // Check if user is logged in, display update and delete buttons if user is logged in
    if(session_status() == PHP_SESSION_NONE) {
        session_start();  // Start session if not started yet
    }

    // Display update and delete buttons if user is logged in  - PHP code
    if (isset($_SESSION['user'])) {
        // Display update and delete buttons
        echo '<button type="button" onclick="btnUpdate()" name="btnUpdate" class="btn btn-success mt-5">Update Note</button>';
        echo '<button type="button" onclick="btnDelete()" name="btnDelete" class="btn mt-5">Delete Note</button>';        
    }

    echo "</div></div>";

    ?>
    <script>
        function btnUpdate() {
            // Redirect to updatePost.php page with post id as query parameter
            window.location.href = "updatePost.php?id=" + <?php echo $_GET['id'];?>;
        }
        
        function btnDelete() {
            // Confirmation message before deleting the note
            if (confirm("Are you sure you want to delete this note?")) {
                // Redirect to deletePost.php page with post id as query parameter
                window.location.href = "deletePost.php?id=" + <?php echo $_GET['id'];?>;
            }
        }
    </script>
</body>

</html>