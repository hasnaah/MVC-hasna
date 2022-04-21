<?php

class PanierModel
{
    /** @var PanierItemModel[]  **/
    private array $items;


    public function __construct()
    {
        session_start();
        $this->items = isset($_SESSION['panier']) ? $_SESSION['panier'] : [];
        $_SESSION['papa'] = 1212;
    }

    public function liste(): array
    {
        return $this->items;
    }

    public function ajouter(int $idPizza, string $taillePizza, int $quantite): void
    {   

        $item = $this->trouverItemParIdPizzaEtTaille($idPizza, $taillePizza);

        // Si c'est un nouveau item on le crée et l'ajouter au tableau global
        if (is_null($item)) {
            $item = new PanierItemModel($idPizza, $taillePizza, $quantite);
            $this->items[] = $item;
        } else { // sinon on met a jour la quantite seulement
            $item->setQuantite($quantite);
        }
    }


    public function supprimer(PanierItemModel $item): void
    {
        
    }


    private function trouverItemParIdPizzaEtTaille(int $idPizza, string $taillePizza): ?PanierItemModel
    {
        foreach ($this->items as $item) {
            if ($item->getIdPizza() === $idPizza && $item->getTaille() === $taillePizza) {
                return $item;
            }
        }

        return null;
    }
    

    public function __destruct()
    {
        // met a jour la session
        $_SESSION['panier'] = $this->items;
    }
}
