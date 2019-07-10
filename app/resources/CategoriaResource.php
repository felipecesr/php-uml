<?php

use Services\CategoriaService;

if (strpos($url, "/") !== 0) {
    $url = "/$url";
}

header("Content-Type:application/json");

if ($url == '/categorias' && $_SERVER['REQUEST_METHOD'] == 'GET') {
    $service = new CategoriaService();
    $result = $service->listar();
    echo json_encode($result);
}

if (preg_match("/categorias\/([0-9])+/", $url, $matches) && $_SERVER['REQUEST_METHOD'] == 'GET') {
    $postId = $matches[1];
    $service = new CategoriaService();
    $result = $service->buscar($postId);
    echo json_encode($result);
}
