<?php
class PanierModel extends Database
{

    private int $id = 0;
    private int $montant = 0;
    private string $moyen_de_paiement = "";
    private int $numero_de_commande = 0;
    private \DateTime $date_de_transaction;




    public function getmontant(): int
    {
        return $this->montant;
    }
    public function getmoyen_de_paiement(): string
    {
        return $this->moyen_de_paiement;
    }
    public function getnumero_de_commande(): int
    {
        return $this->numero_de_commande;
    }
    public function getdate_de_transaction(): DateTime
    {
        return $this->date_de_transaction;
    }

    public function setmontant(int $montant)
    {
        $this->montant = $montant;
    }

    public function setmoyen_de_paiement(string $moyen_de_paiement)
    {
        $this->moyen_de_paiement = $moyen_de_paiement;
    }
    public function setdate_de_transaction(DateTime $date_de_transaction)
    {
        $this->date_de_tansaction = $date_de_transaction;
    }

    public function setnumero_de_commande(int $numero_de_commande)
    {
        $this->numero_de_commande = $numero_de_commande;
    }

    public function save()
    {

        if ($this->id == 0) {
            $sql = "INSERT TO commande_paiement (montant, moyen_de_paiement,numero_de_commande,date_de_transaction) VALUES (:montant , :moyen_de_paiement,:date_de_transaction,:moyen_de_paiement)";
        } else {

            $sql = "UPDATE commande_paiement SET montant=:montant , moyen_de_paiement=:moyen_de_paiement ,numero_de_commande=:numero_de_commande,date_de_transaction=:date_de_transaction WHERE id=:id";
        }

        $sth = $this->prepare($sql);
        $sth->bindParam(":montant", $this->montant);
        $sth->bindParam(":moyen_de_paiement", $this->moyen_de_paiement);
        $sth->bindParam(":numero_de_commande", $this->numero_de_commande);
        $sth->bindParam(":date_de_paiement", $this->date_de_paiement);

        if ($this->id > 0) {
            $sth->bindParam(":id", $this->id);
        }
        $sth->execute();
    }
    public static function liste(): array
    {
        $dbh = new Database();
        $sql = "select * from command_paiement";
        $sth = $dbh->prepare($sql);
        $sth->execute();
        $list = $sth->fetchAll(PDO::FETCH_CLASS, "PanierModel");
        return $list;
    }
}
