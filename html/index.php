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
// et la methode du controller a appeller
$controller = null;
$methode = 'exec';

switch ($url) {
    case "carte.html":
        $controller = new CarteController();
        $methode = 'liste';
        break;
    case "index.html":
    case "":
        $controller = new AccueilController();
        $methode = 'index';
        break;
    case "panier.html":
        $controller = new PanierController();
        $methode = 'liste';
        break;
    case "ajouter-panier.html":
        $controller = new PanierController();
        $methode = 'ajouterPanier';
        break;
    default:
        $controller = new NotFoundController();
        break;
}

// j'affiche le retour du controller
echo $controller->$methode();