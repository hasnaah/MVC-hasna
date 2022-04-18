<?php

class CarteController
{
    public function exec(): View
    {
        // je recupere mes pizza
        $listePizza = PizzaModel::list();

        // je prepare la vue
        $carteVue = new View('cartes');
        $carteVue->with('listePizza', $listePizza);

        return $carteVue;
    }
}
