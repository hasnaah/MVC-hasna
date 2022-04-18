<?php

class AccueilController
{
    public function index(): View
    {

        $accueilView = new View('accueil');
        return $accueilView;
    }
}
