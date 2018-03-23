<?php

    require "flight/Flight.php";
    require "autoload.php";
    require "routes/evenements_routes.php";
    require "routes/categories_routes.php";
    require "routes/users_routes.php";
    require "routes/route_gestion_events.php";

    Flight::start();


?>