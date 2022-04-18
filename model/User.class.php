<?php
class Personnes extends Database {
  function setPersonne(string $nom, string $prenom, string $mail){
    $sql="SELECT id from comptes_clients where email = :email";
    $sth =   $this -> prepare($sql); 
    $sth->bindParam("email",$mail);
    $sth -> execute();
    $result=$sth->fetchAll();
    if(count($result)==0) {
      $sql=" INSERT INTO comptes_clients (nom, prenom, email) VALUES (:nom, :prenom, :email);";
    } 
    else {
      $sql=" UPDATE comptes_clients SET nom= :nom, prenom = :prenom WHERE email= :email;";
     }
     $sth =   $this -> prepare($sql); 
     $sth->bindParam(":nom",$nom);
     $sth->bindParam(":prenom",$prenom);
     $sth->bindParam(":email",$mail);
     $sth->execute();

  }
    function getPersonnes(){
      $sql = "SELECT * FROM comptes_clients";
      $sth = $this -> prepare($sql); 
      $sth->execute();

       return $sth->fetchAll(PDO::FETCH_CLASS,"Personnes");
    }
}

$personnes= new Personnes();
$personne=$personnes->getPersonnes();
$personnes -> setPersonne("Aai","Valjean", "lemail@outlook.fr");
