<?php declare(strict_types=1);

use Backend\RouteHandler;
use Backend\Router;

require __DIR__. '/../vendor/autoload.php';



//Routehandler wird instanziiert und alle Routen in routes.php in Eigenschaft routes von routehandler laden
$routeHandler = new RouteHandler(new Router(), include __DIR__. '/../routes/routes.php');
// zur request route passendes route object finden
$routeHandler->findRoute();
//methode der route ausführen
$response = $routeHandler->runClassOfRoute();

//$httpResponser = new HttpResponder();

//$httpResponser->respond($response);

//TODO php files können noch nicht richtig eingebunden werden, bei include wird 1 returnt und in den body geschrieben
//TODO 1. lese das html aus der php file aus und gib es zurück
//TODO 2. mache ein klasse welche alle php layouts in einem ordner sucht und das entsprechende ausgibt