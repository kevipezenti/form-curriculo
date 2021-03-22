<?php

use CoffeeCode\DataLayer\Connect;
use Form\Exceptions\DbExceptions;
use Form\Source\Response;
use Form\Source\Router;

$connectDb = Connect::getInstance();
$error = Connect::getError();

if ($error) {
    throw new DbExceptions(
        "Erro ao conectar no banco de dados: {$error->getMessage()}",
        Response::INTERNAL_SERVER_ERROR
    );
}
$route = new Router;
