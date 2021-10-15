<?php

class Comment{
    private $id;
    private $blog_id;
    private $date;
    private $name;
    private $comment;

    public static function find($sql,$bindVal = null){
        global $dbc;
        $comments = $dbc->fetchArray($sql, $bindVal);
        if(!$comments){
            return [];
        }
        foreach ($comments as $comment){
            $commentObjArray[] = new self($comment['id'],$comment['blog_id'],$comment['date'],$comment['name'],$comment['comment']);
        }
        return $commentObjArray;
    }

    public function __construct($id,$blog_id,$date,$name,$comment){
        $this->id = $id;
        $this->comment =$comment;
        $this->blog_id = $blog_id;
        $this->date = $date;
        $this->name = $name;
    }

    public function create(){
        global $dbc;
        $sql = "INSERT INTO `comments` (blog_id,date,name,comment) VALUES(:blog_id ,NOW(),:name ,:comment); ";
        $bindVal = ['blog_id'=>$this->blog_id,
                        'name'=>$this->name,
                        'comment'=>$this->comment];
        return $dbc->sqlQuery($sql,$bindVal);

    }

    public function getId(){
        return $this->id;
    }
    public function setId($id): Comment
    {
        $this->id = $id;
        return $this;
    }

    public function getBlog_id(){
        return $this->blog_id;
    }
    public function setBlog_id($blog_id): Comment
    {
        $this->blog_id = $blog_id;
        return $this;
    }
    public function getDate(){
        return $this->date;
    }
    public function setDate($date): Comment
    {
        $this->date = $date;
        return $this;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name): Comment
    {
        $this->name = $name;
        return $this;
    }
    public function getComment(){
        return $this->comment;
    }
    public function setComment($comment): Comment
    {
        $this->comment=$comment;
        return $this;
    }

}

?>