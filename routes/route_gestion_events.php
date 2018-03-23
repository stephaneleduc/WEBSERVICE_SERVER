<?php

//    http://localhost/APIS/WS_TP/    //

$controller = new GestionController();

//ADD EVENT FOR USER
Flight::route("POST /eventuser", [$controller, "addEventUser"]);

//DELETE EVENT FOR USER
Flight::route("DELETE /eventuser", [$controller, "deleteEventUSer"]);

//GET EVENTS BY USER
Flight::route("GET /allevents/@id", [$controller, "GetEventsByUserId"]);

//GET USERS BY EVENT
Flight::route("GET /allusers/@id", [$controller, "GetUsersByEventId"]);


?>