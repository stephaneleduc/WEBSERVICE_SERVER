<?php

class CategoryRepository extends Repository {

    const EVENEMENT_BY_PAGE = 10;

    
    function getAllCategories() {

        $sql = "SELECT * FROM categories";

        $result = $this->pdo->query( $sql );

        $categories = [];

        foreach ($result as $row ) {
            $categories[] = $row;
        }

        return $categories;

    }

    function addCategory(Category $category) {

        $sql = "INSERT INTO categories VALUES (null, :categorie)";

        $statement = $this->pdo->prepare ( $sql );

        $result = $statement->execute([
            "categorie" => $category->getCategorie()
        ]);

        $id = 0;

        if ($result) {

            $id = $this->pdo->lastInsertId();
            $category->setId($id);
        }

        return (bool) $id;

    }

    function getCategoryById( $id ) {

        $sql ="SELECT categorie FROM categories WHERE id =:id";

        $statement = $this->pdo->prepare ( $sql );

        $statement->execute([

            "id" => $id
        ]);

        $category = null;

        if ( $statement->rowCount() ) {

            $data = $statement->fetch();
            $category = $data["categorie"];
        }

        return $category;
   
    }

}
    