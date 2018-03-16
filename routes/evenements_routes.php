<?php

$controller = new EvenementController();

//CREATE EVENT
Flight::route("POST /event", [$controller, "createEvent"] );
//READ EVENT WITH ID
Flight::route("GET /event/@id",  [$controller, "getEventById"]); 

//Cette route est pré-tester par AJAX pour vérifier les autorisations
Flight::route("OPTIONS /event/@id", [$controller, "preflight"]);

//UPDATE EVENT
Flight::route("PUT /event/@id", [$controller, "updateEvent"] );
//DELETE EVENT
Flight::route("DELETE /event/@id", [$controller, "removeEvent"] );
//ALL EVENTS
Flight::route("GET /events(/@index)", [$controller, "getAllEvents"] );

