<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/CD.php";

    session_start();

    if (empty($_SESSION['cd_list'])) {
        $_SESSION['cd_list'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('cd.html.twig', array('cds' => CD::getAll()));
    });

    $app->post("/cd", function() user ($app) {
        $cd = new CD($_POST['artist']);
        $cd->save();
        return $app['twig']->render('display_cd.html.twig', array('newcd' => $cd));
    });

    $app->post("delete_cd", function() use ($app) {
        CD::deleteAll();
        return $app['twig']->render('delete_cd.html.twig');
    });

    return $app;
?>
