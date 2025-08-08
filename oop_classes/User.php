<?php 

class User {
    private $username;
    private $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    public function authenticate(){
        $users = json_decode(file_get_contents("users.json"), true);

        foreach( $users as $user ){
            if ($user['username'] == $this->username && $user['password'] == $this->password){
                return true;
            }
        }
        return false;
    }
}




?>