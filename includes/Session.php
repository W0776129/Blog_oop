<?php

class Session{
    private $user;

    /**
     *
     */
    public function __construct()
    {
        session_start();
        if(isset($_SESSION['user'])){
            $this->user = $_SESSION['user'];
        }
    }

    /**
     * @return false|mixed
     */
    public function isLoggedIn(){
        if($this->user){
            return $this->user;
        }else{
            return false;
        }
    }

    /**
     * @return mixed
     */
    public function getUser(){
        return $this->user;
    }

    /**
     * @param $user
     * @return $this
     */
    public function setUser($user): Session
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @param $userObj
     */
    public function login($userObj){
        $this->user = $userObj;
        $_SESSION['user'] = $userObj;
    }

    /**
     *
     */
    public function logout(){
        $this->user = false;
        $_SESSION['user'] = "";
        session_destroy();
    }
}
$session = new Session();
?>