<?php

//    http://localhost/APIS/WS_TP/    //

$controller = new GestionController();

//ADD EVENT FOR USER
Flight::route("POST /eventuser", [$controller, "addEventUser"]);

//DELETE EVENT FOR USER
Flight::route("DELETE /eventuser/@id", [$controller, "deleteEventUSer"]);

//GET EVENTS BY USER
Flight::route("GET /alleventsuser/@id", [$controller, "GetEventsByUserId"]);

//GET USERS BY EVENT
Flight::route("GET /allusersevent/@id", [$controller, "GetUsersByEventId"]);


?>