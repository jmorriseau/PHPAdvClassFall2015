<?php

include_once './models/RestServer.php';

$restServer = new RestServer();

try {
    $restServer->setStatus(200);
    echo $restServer->getResource();
    echo $restServer->getId();
} catch (InvalidArgumentException $e) {
    $response['errors'] = $e->getMessage();
    $status = 400;
} catch (Exception $e) {
    $response['errors'] = $e->getMessage();
    $status = 500;
}

$restServer->outputResponse();

