<?php
use Slim\Views\Twig;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

// Define named route
$app->get('/home', function ($request, $response, $args) {
    $view = Twig::fromRequest($request);
    return $view->render($response, 'pages/home.twig.html');
});
$app->get('/shop', function ($request, $response, $args) {
    $conn = mysqli_connect('localhost', 'admin', 'test1234', 'online_supermarket');
$sql = "SELECT * FROM products";
$products = $conn->query($sql);
    $view = Twig::fromRequest($request);
    return $view->render($response, 'pages/shop.twig.html',[
    "products"=>$products
]);
});
$app->get('/Basket', function ($request, $response, $args) {
    $conn = mysqli_connect('localhost', 'admin', 'test1234', 'online_supermarket');
$sql = "SELECT * FROM products";
$products = $conn->query($sql);
    $view = Twig::fromRequest($request);
    return $view->render($response, 'pages/Basket.twig.html',[
    "products"=>$products
]);
});
$app->get('/login', function ($request, $response, $args) {
    $view = Twig::fromRequest($request);
    return $view->render($response, 'pages/login.twig.html');
});


// $app->get('/product/{id}', function (Request $request, Response $response, array $args) {
//  $id = $args['id'];
//   $conn = mysqli_connect('localhost', 'admin', 'test1234', 'online_supermarket');

//     $sql = "SELECT * FROM products WHERE id='$id'";
//     $results = $conn->query($sql);

//     $rows = array();
//     while($r = mysqli_fetch_assoc($results)) {
//         $rows[] = $r;
//     }


// $payload = json_encode($rows);

// $response->getBody()->write($payload);
//     return $response->withHeader('Content-Type', 'application/json');
// });


?>