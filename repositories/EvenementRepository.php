<?php

class EvenementRepository extends Repository {

    const EVENEMENT_BY_PAGE = 10;
    
    function createEvenement( Evenement $evenement ) {

        $sql="INSERT INTO evenements
              SET nom=:nom, description=:description,
              date=:date, lieu=:lieu, id_categorie=:id_categorie";

        $statement = $this->pdo->prepare( $sql );

        $result = $statement->execute([

            "nom"           => $evenement->getNom(),
            "description"   => $evenement->getDescription(),
            "date"          => $evenement->getDate(),
            "lieu"          => $evenement->getLieu(),
            "id_categorie"  => $evenement->getId_categorie()

        ]);

        

        $id = 0;

        if ( $result ) {

            $id = $this->pdo->lastInsertId();
            $evenement->setId($id);
        }

        return (bool) $id;


    }


    function updateEvenement( Evenement $evenement ) {
        
        $sql="UPDATE evenements
              SET nom=:nom, description=:description,
              date=:date, lieu=:lieu, id_categorie=:id_categorie
              WHERE id= :id";

        $statement = $this->pdo->prepare( $sql );
        $result = $statement->execute([

            "id"            => $evenement->getId(),
            "nom"           => $evenement->getNom(),
            "description"   => $evenement->getDescription(),
            "date"          => $evenement->getDate(),
            "lieu"          => $evenement->getLieu(),
            "id_categorie"  => $evenement->getId_categorie()

        ]);


        return (bool) $statement->rowCount();
    }

    function deleteEvenement( $id ) {

        $sql ="DELETE FROM evenements where id=:id";
        $statement = $this->pdo->prepare ($sql);
        $statement->execute([

            "id" => $id
        ]);

        return (bool) $statement->rowCount();

    }

    function getAllEvenements( $index = 0) {

        $sql = "SELECT e.id, 
                       e.nom,
                       e.description,
                       e.date,
                       e.lieu,
                       e.id_categorie 
                FROM evenements as e
                ORDER BY e.id ASC 
                LIMIT :index, :offset";

        $statement = $this->pdo->prepare( $sql );
        $statement->bindValue( ":index", $index * self::EVENEMENT_BY_PAGE, PDO::PARAM_INT );
        $statement->bindValue( ":offset", self::EVENEMENT_BY_PAGE, PDO::PARAM_INT );
        $result = $statement->execute();

        $evenements = [];

        if ( $result ) {

            $datas = $statement->fetchAll();
            foreach ( $datas as $data ) {
               
                $evenements[] = new Evenement ( $data );
            }
        }

        return $evenements;

    }

    function getEvenementById( $id ) {

        $sql = "SELECT e.id, 
                       e.nom,
                       e.description,
                       e.date,
                       e.lieu,
                       e.id_categorie 
                FROM evenements as e 
                
                WHERE e.id = :id";
        
        $statement = $this->pdo->prepare ( $sql );
        $statement->execute([

            "id" => $id
        ]);

        $evenement = null;

        if ( $statement->rowCount() ) {

            $data = $statement->fetch();
            $evenement = new Evenement( $data );
        }

        return $evenement;

    }

    function getEventsCatId($id) {

        $sql="SELECT * FROM evenements
              WHERE id_categorie = :id";

        $statement = $this->pdo->prepare ($sql);
        $result = $statement->execute([
            "id" => $id
        ]);

        $events = [];
        if ($result) {

            $datas = $statement->fetchAll();
            foreach ($datas as $data ) {

                $events[] = new Evenement($data);

            }
        }

        return $events;
    }
}


?>