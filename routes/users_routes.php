<?php

//    http://localhost/APIS/WS_TP/    //

$controller = new UserController();

//CREATE USER
Flight::route("POST /user", [$controller, "createUser"]);

//READ USER WITH ID
Flight::route("POST /connected_user", [$controller, "getUser"]);

// OPTIONS POUR LA SECURITE 
Flight::route("OPTIONS /*", [$controller, "preflight"]);

?>