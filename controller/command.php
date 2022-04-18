<?php

require '../model/db.class.php';
require '../model/pizza.class.php';
require '../model/Panier.class.php';
require '../model/User.class.php';
require '../view/index.class.php';
require '../view/cartes.class.php';
require '../view/pageP.class.php';


class Command
{

    public function exect()
    {
        $url = filter_input(INPUT_GET, "url"); // on récupère ce qu'il y a dans l'url saisie par l'utilisateur

        switch ($url) {
            case "carte.html":
                $pizzaList = Pizza::list();
                $page = new Carte($pizzaList);
                break;

            case "index.html":
            case "":
                $page = new Accueil;
                break;
            case "panier.html":
                $page = new Panier;
                break;
            default:
                header('HTTP/1.1 404 Not Found');
                die();
                break;
        }

        $page->html();
    }
}
$command = new Command();
