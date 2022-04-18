<?php


class PanierItemModel
{

    const PIZZA_PART = 'part';
    const PIZZA_MOYENNE = 'moyenne';
    const PIZZA_GRANDE = 'grande';

    private int $idPizza;
    private string $taillePizza;
    private int $quantite;


    public function __construct(int $idPizza, string $taillePizza, int $quantite)
    {
        $this->idPizza = $idPizza;
        $this->taillePizza = $taillePizza;
        $this->quantite = $quantite;
    }

    public function getIdPizza(): int
    {
        return $this->idPizza;
    }

    public function getPizza(): PizzaModel
    {
        return PizzaModel::trouverParId($this->idPizza);
    }

    public function getTaille(): string
    {
        return $this->taillePizza;
    }

    public function getQuantite(): int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): void
    {
        $this->quantite = $quantite;
    }
}