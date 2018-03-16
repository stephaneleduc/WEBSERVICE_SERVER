<?php

$controller = new CategoryController();

//ALL CATEGORIES
flight::route("GET /categories",[$controller, "getAllCat"] );

//READ CATEGORY WITH ID
flight::route("GET /category/@id",[$controller, "getCatById"] );

//CREATE CATEGORY
Flight::route("POST /category", [$controller, "createCat"] );
