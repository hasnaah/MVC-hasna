<?php


spl_autoload_register(function ($class_name) {

    if (endsWith($class_name, 'Controller')) {
        require_once '../controller/'.$class_name . '.php';
    }
    else if (endsWith($class_name, 'Model')) {
        require_once '../model/'.$class_name . '.php';
    }
    else {
        require_once '../core/'.$class_name . '.php';
    }
});


function endsWith( $haystack, $needle ) {
    $length = strlen( $needle );
    if( !$length ) {
        return true;
    }
    return substr( $haystack, -$length ) === $needle;
}

// je recupere l'url 
$url = filter_input(INPUT_GET, 'url');
// a partir de l'url j'appelle le controller attacher a cette url
$controller = null;
switch ($url) {
    case "carte.html":
        $controller = new CarteController();
        break;
    case "index.html":
    case "":
        $controller = new AccueilController();
        break;
    case "panier.html":
        $controller = new PanierController();
        break;
    default:
        $controller = new NotFoundController();
        break;
}

// j'affiche le retour du controller
echo $controller->exec();