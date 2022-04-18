<?php
class Pizza extends Database
{
    private int $id = 0;
    private string $nom = "";
    private string $description = "";
    private int $prixGrande = 0;
    private int $prixPetite = 0;
    private int $prixPart = 0;

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrixGrande(): int
    {
        return $this->prixGrande;
    }

    public function getPrixPetite(): int
    {
        return $this->prixPetite;
    }

    public function getPrixPart(): int
    {
        return $this->prixPart;
    }

    public function setNom(string $nom)
    {
        $this->nom = $nom;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function setPrixGrande(int $prixGrande)
    {
        $this->prixGrande = $prixGrande;
    }

    public function setPrixPetite(int $prixPetite)
    {
        $this->prixPetite = $prixPetite;
    }

    public function setPrixPart(int $prixPart)
    {
        $this->prixPart = $prixPart;
    }

    public function save()
    {
        if ($this->id == 0) {
            $sql = "INSERT INTO pizza (nom, description, prixGrande, prixPetite, prixPart) VALUES (:nom, :description, :prixGrande, :prixPetite, :prixPart);";
        } else {
            $sql = "UPDATE pizza SET nom= :nom, description = :description, prixGrande = :prixGrande, prixPetite = :prixPetite, prixPart = :prixPart WHERE id = :id;";
        }
        $sth =   $this->prepare($sql);
        $sth->bindParam(":nom", $this->nom);
        $sth->bindParam(":description", $this->description);
        $sth->bindParam(":prixGrande", $this->prixGrande);
        $sth->bindParam(":prixPetite", $this->prixPetite);
        $sth->bindParam(":prixPart", $this->prixPart);
        if ($this->id > 0) {
            $sth->bindParam(":id", $this->id);
        }
        $sth->execute();
    }

    public static function list(): array
    {
        $dbh = new Database();
        $sql = "select * from pizza";
        $sth = $dbh->prepare($sql);
        $sth->execute();
        $list = $sth->fetchAll(PDO::FETCH_CLASS, "Pizza");
        return $list;
    }
}
