<?php

declare(strict_types=1);
require_once __DIR__ . '../../env.php';


use App\routes\UserRoutes;
use App\routes\ProductosRoutes;
use App\routes\SaboresRoutes;
use Slim\Factory\AppFactory;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Allow: GET, POST, PUT, DELETE, OPTIONS");


$app = AppFactory::create();

$errorMiddleware = $app->addErrorMiddleware(true, true, true);


ProductosRoutes::configure($app);

SaboresRoutes::configure($app);
UserRoutes::configure($app);



$app->run();
