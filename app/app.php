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
//this should be a GET, not a post!!!
    $app->get("/cds", function() use ($app) {
        return $app['twig']->render('new_cd.html.twig');
    });

    $app->post("/", function() use ($app) {
        //error undefined index: artist???
        $cd = new CD($_POST['artist'], $_POST['album']);
        $cd->save();
        return $app['twig']->render('cd.html.twig', array('cds' => CD::getAll()));
    });

    $app->post("delete_cd", function() use ($app) {
        CD::deleteAll();
        return $app['twig']->render('delete_cd.html.twig');
    });

    $app->get("/searchbyartist", function() use ($app) {
        $artist_matching_search = array();
        CD::getAll();
        return $app['twig']->render('searchbyartist.html.twig');
    });

    return $app;
?>
