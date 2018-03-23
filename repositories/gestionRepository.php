<?php 

class GestionRepository extends Repository {

    function addEventUser(Link $link) {

        $sql = "INSERT INTO link_user_evenement
                SET id_user = :id_user,
                    id_evenement = :id_evenement";

        $statement = $this->pdo->prepare ($sql);

        $result = $statement->execute([

            "id_user" => $link->getId_user(),
            "id_evenement" => $link->getId_evenement()
        ]);

        $id = 0;

        if ($result) {

            $id = $this->pdo->lastInsertId();
            $link->setId($id);
        }

        return (bool) $id;

    }

    function deleteEventUser( $id ) {

        $sql = "DELETE FROM link_user_evenement
                WHERE      id = :id";

        $statement = $this->pdo->prepare ($sql);
        $statement->execute([

            "id" => $id
     
        ]);

        return (bool) $statement->rowCount();
    }


    function GetEventsByUserId ($id_user) {

        $sql = "SELECT link.id_evenement, 
                       e.nom, 
                       e.description, 
                       e.date, 
                       e.lieu,
                       e.id_categorie
                FROM link_user_evenement as link
                JOIN evenements as e
                ON link.id_evenement = e.id
                where link.id_user = :id_user
                ORDER BY link.id_evenement ASC";

        $statement = $this->pdo->prepare($sql);
        $result = $statement->execute([
            "id_user" => $id_user
        ]);

        $evenements = [];

        if ($result) {

            $datas = $statement->fetchAll();
            foreach ($datas as $data) {

                $evenement = new Evenement ( $data );
                $evenement->setId($data['id_evenement']);
                $evenements[] = $evenement;
            }

        }

        return $evenements;
    }


    function GetUsersByEventId ($id_event) {

        $sql = "SELECT link.id_user, u.username
        FROM link_user_evenement as link
        JOIN users as u
        ON u.id = link.id_user
        WHERE link.id_evenement = :id_event
        ORDER BY link.id_user ASC";

        $statement = $this->pdo->prepare ($sql);
        $result = $statement->execute([
            "id_event" => $id_event
        ]);

        $users = [];

        if ($result) {

            $datas = $statement->fetchAll();
            foreach ($datas as $data ) {
                
                $users[] = $data;
            }
        }

        return $users;

    }


}


?>