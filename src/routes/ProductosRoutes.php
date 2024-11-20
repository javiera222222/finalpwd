<?php

declare(strict_types=1);

namespace App\routes;

use App\Controllers\ProductosController;
use App\helpers\Upload;
use Nyholm\Psr7\ServerRequest;
use Nyholm\Psr7\Response;

use Slim\App;

class ProductosRoutes
{
    static function configure(App $app)
    {



        $app->get("/apiv1/Productos", function (ServerRequest $request, Response $response) {

            $payload = json_encode(ProductosController::read());
            $response->getBody()->write($payload);
            return $response;
        });

        $app->get("/apiv1/Productos/{id}", function (ServerRequest $request, Response $response, array $arg) {
            $payload = json_encode(ProductosController::findOne($arg['id']), JSON_PRETTY_PRINT);
            $response->getBody()->write($payload);
            return $response;
        });

        $app->delete("/apiv1/Productos/{id}", function (ServerRequest $request, Response $response, array $arg) {
            $payload = json_encode(ProductosController::destroy((int)$arg['id']), JSON_PRETTY_PRINT);
            $response->getBody()->write($payload);
            return $response;
        });

        $app->post('/apiv1/Productos/crear', function (ServerRequest $request, Response $response) {
            $params = json_decode(file_get_contents('php://input'), true);
            $payload = json_encode(ProductosController::create($params), JSON_PRETTY_PRINT);
            $response->withHeader('Content-Type', 'application/json');
            $response->getBody()->write($payload);
            return $response;
        });

        $app->put('/apiv1/Productos/{id}', function (ServerRequest $request, Response $response) {
            $params = json_decode(file_get_contents('php://input'), true);
            $payload = json_encode(ProductosController::update($params), JSON_PRETTY_PRINT);
            $response->withHeader('Content-Type', 'application/json');
            $app = \Slim\Factory\AppFactory::create();
            $app->addErrorMiddleware(true, true, true);
            $response->getBody()->write($payload);
            return $response;
        });
    }
}
