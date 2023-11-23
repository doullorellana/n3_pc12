<?php
// ENRUTADOR
require_once "./controllers/HomeController.php";
require_once "./controllers/UsuarioController.php";

$homeController = new HomeController();
$usuarioController = new UsuarioController();

// Dividimos la ruta por el signo "?" para no leer los query params. Ejem: /usuarios?id=1
$route = explode("?", $_SERVER["REQUEST_URI"]);

$method = $_SERVER["REQUEST_METHOD"];


if ($method === "POST") {
    switch ($route[0]) {
        case '/usuarios/delete':
            $usuarioController->delete($_POST["id"]);
            break;

        case '/usuarios/create':
            $usuarioController->store($_POST);
            break;

        case '/usuarios/update':
            $usuarioController->update($_POST);
            break;

        default:
            echo "NO ENCONTRAMOS LA RUTA.";
            break;
    }
}

if ($method === "GET") {
    switch ($route[0]) {
        case '/index.php':
            $homeController->index();
            break;

        case '/usuarios':
            $usuarioController->index();
            break;

        case '/usuarios/edit':
            $usuarioController->edit($_GET["id"]);
            break;

        case '/usuarios/create':
            $usuarioController->create();
            break;

        default:
            echo "NO ENCONTRAMOS LA RUTA.";
            break;
    }
}
