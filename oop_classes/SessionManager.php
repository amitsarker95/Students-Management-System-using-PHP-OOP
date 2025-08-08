<?php

class SessionManager{
    public static function start(){
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
    }
    public static function is_logged_in(){
        return isset($_SESSION['username']);
    }

    public static function login($username){
        $_SESSION['username'] = $username;
    }
    public static function logout(){
        session_destroy();
    }
    public static function protect(){
        self::start();
        if(!self::is_logged_in()){
            header('Location: index.php');
            exit();
        }
    }
}

?>