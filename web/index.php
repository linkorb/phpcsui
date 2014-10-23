<?php

use Symfony\Component\HttpFoundation\Request;

require_once __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__ . '/../app/bootstrap.php';

/*
$app->before(function (Request $request) use ($app) {
    $token = $app['security']->getToken();
    if ($token) {
        if ($request->getRequestUri()!='/login') {
            
            if ($token->getUser() == 'anon.') {
                //exit('anon!');
                //return $app->redirect('/login');
            } else {
                $app['twig']->addGlobal('username', $token->getUser()->getUsername());
            }
        }
    }
});

$app->before(function (Request $request) use ($app) {
    $entityManager = $app['orm.em'];

    $pageRepository = $entityManager->getRepository('AlarmPage\Entities\Page');
    $hostname = $request->getHttpHost();
    $hostname = explode(':', $hostname)[0];
    if (substr($hostname, -13) == '.alarmpage.io') {
        $code = substr($hostname, 0, -13);
        $page = $pageRepository->findOneByCode($code);
    } else {
        $page = $pageRepository->findOneByHostname($hostname);
    }
    
    
    if (!$page) {
        throw new RuntimeException("Page not found....");
    }
    $app['twig']->addGlobal('page', $page);
    
});
*/

$request = Request::createFromGlobals();
$app->run($request);
