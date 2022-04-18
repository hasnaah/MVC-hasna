<?php

class View {

    private string $nomVue;
    private array $parametres;

    public function __construct(string $nomVue, array $parametres = []) {
        $this->nomVue = $nomVue;
        $this->parametres = $parametres;
    }

    public function rendu(): string {
        ob_start();
        extract($this->parametres);
        include '../view/'.$this->nomVue.'.php';
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }

    public function with(string $nomParametre, $value): void {
        $this->parametres[$nomParametre] = $value;
    }


    public function __toString()
    {
        return $this->rendu();
    }
}