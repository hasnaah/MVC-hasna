
<?= new View('layout/_header'); ?>

<h1>Panier</h1>
//affichage du panier 
<div class ='panier'>
    <?php foreach ($panier->liste() as $item): ?>
        <p>Pizza : <?= $item->getPizza()->getNom() ?></p>
        <p>Taille : <?= $item->getTaille() ?></p>
        <p>Quantité : <?= $item->getQuantite() ?></p>
    <?php endforeach; ?>
</div>
<?= new View('layout/_footer'); ?>