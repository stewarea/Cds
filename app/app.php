<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Cd.php";

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
));

    session_start();
    if(empty($_SESSION['cd_list'])) {
        $_SESSION['cd_list'] = array();
    }

    $app->get("/", function() use ($app) {
        return $app['twig']->render('home.html.twig', array('cds'=>CD::getAll()));
    });

    $app->post("/new_cd", function() use ($app) {
        $cd = new Cd($_POST['artist'], $_POST['album']);
        array_push($_SESSION['cd_list'], $cd);
        return $app['twig']->render('home.html.twig', array('new_item'=>$_SESSION['cd_list']));
    });

    $app->get("/search", function() use ($app) {
        $search_array = array();
        foreach ($_SESSION['cd_list'] as $cd) {
            if ($cd->findMatch($_GET['search'])) {
                array_push($search_array, $cd);
            }
        }
        return $app['twig']->render('results.html.twig', array('search_items'=>$search_array));
    });


    return $app;
?>
