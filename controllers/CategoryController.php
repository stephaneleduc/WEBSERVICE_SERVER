<?php

use RepositoryManager as RM;
class CategoryController {

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


    function createCat() {

        $categoryRepository = RM::getInstance()->getCategoryRepository();
        $datas = Flight::request()->data->getData();

        $category = new Category ($datas);

        $success = $categoryRepository->addCategory($category);

        $status = [
            "success" => $success,
            "id" => $category->getId(),
            "message" => "La catégorie " . $category->getId() . " a bien été créée"
        ];

        $this->response ($status);
    }


    function getCatById( $id ) {

        $categoryRepository = RM::getInstance()->getCategoryRepository();
        $category = $categoryRepository->getCategoryById( $id );

        $success = false;
        if ( $category ) {

            $success = true;
        }

        $status = [

            "success" => $success,
            "category" => $category

        ];


        $this->response ( $status );

    }

    function getAllCat() {

        $categoryRepository = RM::getInstance()->getCategoryRepository();
        $categories = $categoryRepository->getAllCategories();

        $success = false;
        if ( $categories ) {
            $success = true;
        }

        $status = [

            "success" => $success,
            "categories" => $categories
        ];


        $this->response( $status );



    }
}