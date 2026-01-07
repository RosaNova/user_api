<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST");

require_once 'src/UserController.php';

$controller = new UserController();

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    $controller->index();
}else if($method === 'POST') {
    $controller->store();
}else if($method === 'DELETE') {
    $controller->removeUser();
}else if($method === 'PUT') {
    $controller->updateUser();
}else{
      http_response_code(405);
     echo json_encode(["message" => "Method not allowed"]);
}
