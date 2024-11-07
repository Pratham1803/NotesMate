<!DOCTYPE html>
<html>

<head>
    <title>NotesMate</title>
    <link rel="stylesheet" href="mystyle.css" />
    <link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.css" />
</head>

<body>
    <?php
    include("Navbar.php");
    ?>
    <div class="row" style="height: 100vh;width: 100%">

        <div class="container mt-4">
            <!-- get the subject name from query string -->
            <h3><?php echo $_GET['sub'] . "'s Notes" ?></h3>
            <?php
            // include the database handler class
            require "db.php";
            $db = new DbHandler(); // create the object of DbHandler class

            // get all posts of the selected subject from the database
            // and display them in a grid layout
            // the getAllPost method returns an array of associative arrays containing all the posts of the selected subject
            foreach ($db->getAllPost($_GET['sub']) as $rows) {
                ?>
                <div class="col-md-12">
                    <div class="card mt-4 p-2">
                        <div class="title">
                            <!-- display the author name from the row data -->
                            <small class="d-flex justify-content-end"><?php echo "" . $rows['author'] ?></small>
                            
                            <!-- display the title of post -->
                            <h4 class="card-title"><?php echo "" . $rows['title'] ?></h4>

                            <!-- display first 30 words of content -->
                            <p>
                                <?php
                                // split the content into words and limit it to first 30 words using array_slice and implode functions
                                $var = explode(" ", $rows['content']);
                                $shortDesc = array_slice($var, 0, 30);
                                $data = implode(" ", $shortDesc) . "...";
                                echo htmlspecialchars($data);
                                ?>
                            </p>
                            <button type="button" onclick="btnClicked()" name="submit" class="btn btn-success mt-5">Show
                                More</button>
                            <script>
                                function btnClicked() {
                                    window.location.href = "singlePost.php?id=<?php echo $rows['id'] ?>";
                                }
                            </script>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</body>

</html>