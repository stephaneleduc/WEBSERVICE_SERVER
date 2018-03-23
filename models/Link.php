<?php

class Link extends Model implements JsonSerializable {

    private $id_user;
    private $id_evenement;


    public function JsonSerialize() {

        return [

            "id_user" => $this->id_user,
            "id_evenement" => $this->id_evenement
        ];

    }

    public function getId_user()
    {
        return $this->id_user;
    }

    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

    }

    public function getId_evenement()
    {
        return $this->id_evenement;
    }

    public function setId_evenement($id_evenement)
    {
        $this->id_evenement = $id_evenement;

    }
}

?>