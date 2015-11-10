<?php

include_once './autoload.php';

$restServer = new RestServer();

try {
    $restServer->setStatus(200);
    $resource = $restServer->getResource();
    $verb = $restServer->getVerb();
    $id = $restServer->getId();


    if ('corporations' === $resource) {
        $corps = new Corporations();
        $results = null;

        if ('GET' === $verb) {
            if (is_null($id)) {
                $results = $corps->getAll();
            } else {
                $results = $corps->get($id);
            }
        }

        if ('DELETE' === $verb) {
            if (is_null($id)) {
                throw new InvalidArgumentException('missing ID');
            } else {
                if ($corps->delete($id)) {
                    $restServer->setMessage('Deleted successfully');
                } else {
                    throw new InvalidArgumentException('Delete unsuccessful for id ' . $id);
                }
            }
        }

        if ('PUT' === $verb) {
            if (is_null($id)) {
                throw new InvalidArgumentException('missing ID');
            } else {
                $results = $corps->put($id);
            }
        }

        if ('POST' === $verb) {
            if ($corps->post($restServer->getServerData())) {
                $restServer->setMessage('Post successful');
            } else {
                throw new InvalidArgumentException('Post unsuccessful');
            }
        }


        $restServer->setData($results);
    }
} catch (InvalidArgumentException $e) {
    $restServer->setErrors($e->getMessage());
    $restServer->setStatus(400);
} catch (Exception $e) {
    $restServer->setErrors($e->getMessage());
    $restServer->setStatus(500);
}

$restServer->outputResponse();

