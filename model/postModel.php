<?php
// Post Model class, represent the Data table of tblPost in MySQL database
class PostModel
{
    private $id; // store the id of the post
    private $title; // the title of the post
    private $content; // the content of the post
    private $author; // the author of the post
    private $subject; // the parent subject of the post

    // getter method to return the id of the post
    public function getId()
    {
        return $this->id;
    }

    // setter method to set the id of the post
    public function setId($id)
    {
        $this->id = $id;
    }

    // getter method to return the Title of the post
    public function getTitle()
    {
        return $this->title;
    }

    // setter method to set the title of the post
    public function setTitle($title)
    {
        $this->title = $title;
    }

    // getter method to return the Content of the post
    public function getContent()
    {
        return $this->content;
    }

    // setter method to set the content of the post
    public function setContent($content)
    {
        $this->content = $content;
    }

    // getter method to return the Author of the post
    public function getAuthor()
    {
        return $this->author;
    }

    // setter method to set the Author of the post
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    // getter method to return the parent Subject of the post
    public function getSubject()
    {
        return $this->subject;
    }

    // setter method to set the parent subject of the post
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }
}
?>