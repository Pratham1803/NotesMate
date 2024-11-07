<!DOCTYPE html>
<html lang="en"></html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.css" />
    <title>NotesMate</title>
</head>

<body>
    <?php
    include("Navbar.php");
    ?>
    <div class="container mt-3">
        <!-- collecting user name from cookie to show user name in page -->
        <h3> Hello, <?php echo "" . $_COOKIE["username"]; ?> 👋 </h3>
    </div>
    <center>
        <div class="col-md-6">
            <table class="mt-3 table-responsive">
                <!-- Boxes list of subjects -->
                <tr>
                    <th width="150" height="150">
                        <div class="card p-3 m-1" style="height: 150px !important">
                            <center> <a href="notes.php?sub=php">Web Development Using Php</a></center>
                        </div>
                    </th>
                    <th width="150" height="150">
                        <div class="card p-3 m-1" style="height: 150px !important">
                            <center><a href="notes.php?sub=java">JAVA EE</a></center>
                        </div>
                    </th>
                    <th width="150" height="150">
                        <div class="card p-3 m-1" style="height: 150px !important">
                            <center><a href="notes.php?sub=rdbms">Relation Database</a></center>
                        </div>
                    </th>
                    <th width="150" height="150">
                        <div class="card p-3 m-1" style="height: 150px !important">
                            <center><a href="notes.php?sub=nosql">NoSql</a></center>
                        </div>
                    </th>
                    <th width="100">
                        <div class="card p-3 m-1" style="height: 150px !important">
                            <center> <a href="notes.php?sub=flutter">Android Development using Flutter</a></center>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th width="150" height="150">
                        <div class="card p-3 m-1" style="height: 150px !important">
                            <center> <a href="notes.php?sub=cloudcomputing">Cloud Computing</a></center>
                        </div>
                    </th>
                    <th width="150" height="150">
                        <div class="card p-3" style="height: 150px !important">
                            <center><a href="notes.php?sub=asps">Acedemic Speaking and Writting</a></center>
                        </div>
                    </th>
                    <th width="150" height="150">
                        <div class="card p-3 m-1" style="height: 150px !important">
                            <center><a href="notes.php?sub=dotnet">ASP.NET</a></center>
                        </div>
                    </th>
                    <th width="150" height="150">
                        <div class="card p-3 m-1" style="height: 150px !important">
                            <center><a href="notes.php?sub=android_java">Android Development Using Java</a></center>
                        </div>
                    </th>
                    <th width="150" height="150">
                        <div class="card p-3" style="height: 150px !important">
                            <center><a href="notes.php?sub=dsa">Data Structure And Algorithm</a></center>
                        </div>
                    </th>
            </table>
        </div>
    </center>
</body>

</html>