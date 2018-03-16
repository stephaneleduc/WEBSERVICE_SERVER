<?php


class Evenement extends Model implements jsonSerializable {

    private $nom;
    private $description;
    private $date;
    private $lieu;
    private $id_categorie;


    public function jsonSerialize() {
        return [

            "id" => $this->id,
            "nom" => $this->nom,
            "description" => $this->description,
            "date" => $this->date,
            "lieu" => $this->lieu,
            "id_categorie" => $this->id_categorie

        ];
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }
    

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getLieu() {
        return $this->lieu;
    }

    public function setLieu($lieu) {
        $this->lieu = $lieu;
    }

    public function getId_categorie() {
        return $this->id_categorie;
    }

    public function setId_categorie($id_categorie) {
        $this->id_categorie = $id_categorie;
    }
}

?>