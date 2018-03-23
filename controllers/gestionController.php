<?php 

use RepositoryManager as RM;
class GestionController {

    function preflight() {

        return $this->response(["success" => true]);
    }


    function response( $status ) {
        header("Access-Control-Allow-Origin: http://localhost:4200");
       // header("Access-Control-Allow-Origin: http://localhost:3000");
        header("Access-Control-Allow-Headers: Content-type");
        header("Access-Control-Allow-Methods: GET, POST");
        header("Content-type: application/json");

        echo json_encode ( $status );
    }


    function addEventUser() {
        
        $gestionRepository = RM::getInstance()->getGestionRepository();
        $datas = Flight::request()->data->getData();

        $link = new Link ($datas);

        $success = $gestionRepository->addEventUser( $link );

        $status = [

            "success" => $success,
            "id" => $link->getId(),
            "Message" => "Lien ". $link->getId() . " correctement créé !"
        ];

        $this->response( $status);
    }


    function deleteEventUser( $id_user, $id_event ) {

        $gestionRepository = RM::getInstance()->getGestionRepository();
        $success = $gestionRepository->deleteEventUser( $id_user, $id_event );

        $status = [

            "success" => $success,
            "message" => "L'utilisateur ". $id_user . " ne particpe plus à l'événement ". $id_event
        ];

        $this->response ($status);

    }

    function GetEventsByUserId( $id ) {

        $gestionRepository = RM::getInstance()->getGestionRepository();
        $evenements = $gestionRepository->GetEventsByUserId( $id );

        $success = false;
        if ($evenements) {

            $success = true;
        }

        $status = [

            "success" => $success,
            "evenements" => $evenements
        ];

        $this->response ( $status );


    }

    function GetUsersByEventId ($id) {
        $gestionRepository = RM::getInstance()->getGestionRepository();
        $users = $gestionRepository->GetUsersByEventId( $id );

        $success = false;
        if ($users) {

            $success = true;
        }

        $status = [

            "success" => $success,
            "users" => $users
        ];

        $this->response ( $status );
    }
    
}


?>