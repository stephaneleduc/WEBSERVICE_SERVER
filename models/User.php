<?php

class User extends Model implements JsonSerializable {

    private $username;
    private $password;

    
    function getUsername() {
        return $this->username;
    }

    function setUsername( $username ) {
        $this->username = $username;
    }

    function getPassword() {
        return $this->password;
    }

    function setPassword( $password ) {
        $this->password = $password;
    }
    
    
    public function JsonSerialize() {

        return [
            "id" => $this->id,
            "username" => $this->username,
            "password" => $this->password
        ];
    }

}

?>