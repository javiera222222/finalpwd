<?php

declare(strict_types=1);

namespace App\routes;

use App\Controllers\SaboresController;
use App\helpers\Upload;
use Nyholm\Psr7\ServerRequest;
use Nyholm\Psr7\Response;

use Slim\App;

class SaboresRoutes
{
    static function configure(App $app)
    {



        $app->get("/apiv1/Sabores", function (ServerRequest $request, Response $response) {

            $payload = json_encode(SaboresController::read());
            $response->getBody()->write($payload);
            return $response;
        });

        $app->get("/apiv1/Sabores/{id}", function (ServerRequest $request, Response $response, array $arg) {
            $payload = json_encode(SaboresController::findOne($arg['id']), JSON_PRETTY_PRINT);
            $response->getBody()->write($payload);
            return $response;
        });

        $app->delete("/apiv1/Sabores/{id}", function (ServerRequest $request, Response $response, array $arg) {
            $payload = json_encode(SaboresController::destroy((int)$arg['id']), JSON_PRETTY_PRINT);
            $response->getBody()->write($payload);
            return $response;
        });

        $app->post('/apiv1/Sabores/crear', function (ServerRequest $request, Response $response) {
            $params = json_decode(file_get_contents('php://input'), true);

            $payload = json_encode(SaboresController::create($params), JSON_PRETTY_PRINT);
            $response->withHeader('Content-Type', 'application/json');
            $response->getBody()->write($payload);
            return $response;
        });
    }
}
