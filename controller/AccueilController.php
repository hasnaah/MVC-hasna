<?php

class AccueilController
{
    public function exec(): View
    {

        $accueilView = new View('accueil');
        return $accueilView;
    }
}
