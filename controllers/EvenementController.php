<?php

use RepositoryManager as RM;
class EvenementController {

    function preflight() {

        return $this->response(["success" => true]);
    }


    function response( $status ) {
        header("Access-Control-Allow-Origin: http://localhost:3000");
        header("Access-Control-Allow-Headers: Content-type");
        header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS");
        header("Content-type: application/json");

        echo json_encode ( $status );
    }


    function createEvent() {

        $eventRepository = RM::getInstance()->getEvenementRepository();
        $datas = Flight::request()->data->getData();

        $evenement = new Evenement ( $datas );

        $success = $eventRepository->createEvenement( $evenement);

        $status = [
            "success" => $success,
            "id" => $evenement->getId(),
            "message" => "Evenement ". $evenement->getId() ." a bien été crée !"
        ];

        $this->response ( $status );
    }

    function updateEvent( $id ){

        $eventRepository = RM::getInstance()->getEvenementRepository();
        $datas = Flight::request()->data->getData();
        $evenement = new Evenement ( $datas );
        $evenement->setId( $id );

        $success = $eventRepository->updateEvenement ($evenement );

        $status = [

            "success" => $success,
            "id" => $evenement->getId(),
            "message" => "L'evenement " . $evenement->getId() . " a bien été mis à jour !"

        ];

        $this->response( $status );

    }

    function removeEvent ( $id ) {

        $eventRepository = RM::getInstance()->getEvenementRepository();
        $success = $eventRepository->deleteEvenement($id);

        $status = [

            "success" => $success,
            "message" => "L'evenement " . $id  . " a bien été supprimé !"

        ];

        $this->response ($status);
    }


    function getEventById( $id ) {

        $eventRepository = RM::getInstance()->getEvenementRepository();
        $evenement = $eventRepository->getEvenementById( $id );

        $success = false;
        if ( $evenement ) {

            $success = true;
        }

        $status = [

            "success" => $success,
            "evenement" => $evenement
        ];

        $this->response( $status );

    }

    function getAllEvents ( $index ) {

        if ( !$index ) $index = 0;

        $eventRepository = RM::getInstance()->getEvenementRepository();
        $evenements = $eventRepository->getAllEvenements( $index );

        $success = false;
        if ( $evenements ) {
            $success = true;
        }

        $status = [

            "success" => $success,
            "evenements" => $evenements
        ];


        $this->response( $status );

    }

}


?>