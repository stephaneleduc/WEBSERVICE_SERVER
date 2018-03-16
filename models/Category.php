<?php

class Category extends Model implements JsonSerializable {


    private $categorie;

    public function getCategorie() {
        return $this->categorie;
    }

    public function setCategorie($categorie) {
        $this->categorie = $categorie;
    }

    public function jsonSerialize() {
        return [

            "id" => $this->id,
            "categorie" => $this->categorie,
        ];
    }
}



?>