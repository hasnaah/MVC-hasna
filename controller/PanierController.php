<?php

class PanierController
{

    private PanierModel $panier;

    public function __construct()
    {
        $this->panier = new PanierModel();
    }


    public function liste(): View
    {
        //je prepare la vue
        $paniervue = new View('panier/liste');
        $paniervue->with('panier', $this->panier);
        return $paniervue;
    }


    public function ajouterPanier(): string
    {
        $quantite = filter_input(INPUT_POST, 'quantite');
        $idPizza = filter_input(INPUT_POST, 'id_pizza');
        $taillePizza = filter_input(INPUT_POST, 'taille');

        $this->panier->ajouter($idPizza, $taillePizza, $quantite);

        return 'ok';
    }
}
