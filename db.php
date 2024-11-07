<?php
// DbHandler clas to manage all the database processes, and handle all crud operations
class DbHandler
{
    private $con = null; // connection object

    // constructor to make connection with data base
    public function __construct()
    {
        $dsn = "mysql:host=localhost;dbname=notesmate"; // data base location
        $this->con = new PDO($dsn, 'root', ''); // connecting with database
    }

    // method to add new user to the database, collecting the user details from UserModel class object
    public function registerUser(UserModel $newUser)
    {
        try {
            $query = "INSERT INTO tblUser(username,psw) values(:uname, :psw)"; // insert query
            $stmt = $this->con->prepare($query); // prepare statement
            $stmt->bindValue(':uname', $newUser->getUsername()); // set username in query
            $stmt->bindValue(':psw', $newUser->getPassword()); // set password in query
            $stmt->execute(); // executing the query
            if ($stmt->rowCount() == 0) // if effected rows are 0 means, not any thing work
                return false; // return false, means insertion failed
            else
                return true; // return true, means insertion successed
        } catch (PDOException $pDOException) { // throw the exception
            throw new Exception($pDOException->getMessage());
        }
    }

    // method to authenticate user, collecting the user details from UserModel class object
    public function getUser(UserModel $newUser)
    {
        try {
            $query = "select * from tblUser where username=:uname and psw=:psw"; // Select query string
            $stmt = $this->con->prepare($query); // Prepare the query string
            $stmt->bindValue(':uname', $newUser->getUsername()); // Set the username to the new user object
            $stmt->bindValue(':psw', $newUser->getPassword()); // Set the password to the new user object
            $stmt->execute(); // execute the query
            $data = $stmt->fetch(PDO::FETCH_ASSOC); // fetch the record
            if ($data == false) { // if data is not fetched means, user with user name and password does not exists
                return false; // return false means, not user found
            } else { // user found, login success
                session_start(); // start the session to store details of user logged in
                $_SESSION['user'] = $data['id']; // store user id in session
                return true; // return true for sucessfull logged in
            }
        } catch (PDOException $pDOException) { // throw exception 
            throw new Exception($pDOException->getMessage());
        }
    }

    // collect post data from PostModel object and insert new post in database
    public function addPost(PostModel $post)
    {
        try {
            $query = "INSERT INTO tblPost(author,title,content,subject) values(:author, :title,:content,:subject)"; // insert query
            $stmt = $this->con->prepare($query); // prepare statement
            $stmt->bindValue(':author', $post->getAuthor()); // bind the author with the post author in query string
            $stmt->bindValue(':title', $post->getTitle());  // bind the title with the post author in query string
            $stmt->bindValue(':content', $post->getContent()); // bind the content with the post author in query string
            $stmt->bindValue(':subject', $post->getSubject()); //  bind the content with the subject author in query string

            $stmt->execute(); // execute the query
            if ($stmt->rowCount() == 0) // if record inserted
                return false; // return false, that record is not inserted
            else
                return true; // return true, that record is inserted
        } catch (Exception $e) { // throw exception
            throw new Exception($e->getMessage());
        }
    }

    // collect all the post from database related to given subject, the subject name is passed from argument  
    public function getAllPost($sub)
    {
        try {
            $query = "select * from tblPost where subject = '$sub'"; // select query to get all post from database according to subject
            $stmt = $this->con->query($query); // get all post from database

            return $stmt->fetchAll(PDO::FETCH_ASSOC); // return all data/posts
        } catch (Exception $e) { // throw an exception
            throw new Exception($e->getMessage());
        }
    }

    // get post details by id, the id is passed from argument
    public function getPost($id)
    {
        try {
            $query = "select * from tblPost where id=:id"; // select query to get single post details
            $stmt = $this->con->prepare($query); // prepare the statement
            $stmt->bindValue(':id', $id); // bind the value of id in query
            $stmt->execute(); // execute the query
            return $stmt->fetch(PDO::FETCH_ASSOC); // return the row data
        } catch (Exception $e) {// exception is thrown
            throw new Exception($e->getMessage());
        }
    }

    // delete post by id, the id is passed from argument
    public function deletePost($id)
    {
        try {
            $query = "DELETE FROM tblPost WHERE id = :id"; // delete query
            $stmt = $this->con->prepare($query); // prepare the statemnt
            $stmt->bindValue(':id', $id); // bind the id in query
            $stmt->execute(); // execute the query
            if ($stmt->rowCount() == 0) // row is not deleted
                return false;
            else // row is deleted
                return true;
        } catch (Exception $e) { // throw an exception
            throw new Exception($e->getMessage());
        }
    }

    // update post details by id, the id is passed from argument and other details are passed from PostModel object
    public function updatePost(PostModel $post)
    {
        try {
            $query = "UPDATE tblPost SET title=:title, content=:content,author=:author , subject=:subject WHERE id=:id"; // update query string
            $stmt = $this->con->prepare($query); // prepare statement
            $stmt->bindValue(':title', $post->getTitle()); // bind value of title to post title in query string
            $stmt->bindValue(':content', $post->getContent()); // bind value of content to post content in query string
            $stmt->bindValue(':author', $post->getAuthor()); // bind value of author to post author in query string
            $stmt->bindValue(':subject', $post->getSubject()); // bind value of subject to post subject in query string
            $stmt->bindValue(':id', $post->getId()); // bind value of id to post id in query string

            $stmt->execute(); // execute the query
            if ($stmt->rowCount() == 0) // post is not updated
                return false;
            else // post is updated
                return true;
        } catch (Exception $e) { // throw an exception
            throw new Exception($e->getMessage());
        }
    }
}
?>