<?php


class UserRepository extends Repository {

    function createUser( User $user) {


        $sql = "INSERT INTO users set username= :username,
                                      password= :password";

        $statement = $this->pdo->prepare( $sql );

        $result = $statement->execute ([

            "username" => $user->getUsername(),
            "password" => $user->getPassword()
        ]);

        $id = 0;

        if ( $result ) {

            $id = $this->pdo->lastInsertId();
            $user->setId( $id );
    
        }

        return (bool) $id;

    }


    function getUser( $username, $password ) {

        $sql = "SELECT * FROM users
                WHERE username = :username
                AND password = :password";

        $statement = $this->pdo->prepare( $sql );

        $statement->execute([

            'username' => $username,
            'password' => $password,
        ]);

        $user = null;

        if ( $statement->rowCount()) {

            $data_user = $statement->fetch();
            $user = new User ( $data_user );
        }

        return $user;
    }


}


?>