<?php

class PanierController
{
    public function exec(): View
    {
        //je recupere mon panier
        $panier = PanierModel::liste();
        //je prepare la vue
        
        $paniervue= new View('panier');
        $paniervue->with('panier',$panier);
        return $paniervue;
    }
}
