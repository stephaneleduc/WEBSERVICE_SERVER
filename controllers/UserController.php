<?php

use RepositoryManager as RM;
class UserController {

    function preflight() {

        return $this->reponse(["success" => true ]);
    }

    function response( $status ) {

        header("Access-Control-Allow-Origin: http://localhost:4200");
        header("Access-Control-Allow-Headers: Content-type");
        header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS");
        header("Content-type: application/json");

        echo json_encode ( $status );
    }

    function createUser() {

        $userRepository = RM::getInstance()->getUserRepository();
        $data = Flight::request()->data->getData();

        $user = new User ( $data );

        $success = $userRepository->createUser ( $user );

        $status = [
            "success" => $success,
            "id" => $user->getId(),
            "message" => "User " . $user->getId() . " a bien été créé !"
        ];

        $this->response( $status );

    }

    function getUser() {

        $userRepository = RM::getInstance()->getUserRepository();
        $data = Flight::request()->data->getData();

        $user = $userRepository->getUser( $data['username'], $data['password'] );

        $success = false;
        if ( $user ) {
            $success = true;
        }

        $status = [
            "success" => $success,
            "id" => $user->getId()
        ];

        $this->response ( $status );

    }



}


?>