<?= new View('layout/_header'); ?>

<h1>Carte des pizzas</h1>
<div class="carte">
    <?php foreach ($listePizza as $pizza) { ?>
        <div class="pizzacarte">
            <div class="imgpizzacarte"><img src="./img/pizza.jpg" /></div>
            <h2><?= $pizza->getNom() ?></h2>
            <p><?= $pizza->getDescription() ?></p>
            <div class="prix">
                <div class="tarifs">

                    <form  class="form-panier" action="/ajouter-panier.html" method="POST">
                        <div>La Part = <?= number_format($pizza->getPrixPart() / 100, 2) ?>€</div>
                        <div>
                            <input type="number" name="quantite" placeholder="Quantité" min="1" max="8" id="qp1p" />
                            <input type="hidden" name="id_pizza" value="<?= $pizza->getId() ?>" />
                            <input type="hidden" name="taille" value="<?= PanierItemModel::PIZZA_PART ?>" />
                            <button type="submit" class="btn" title="ajoutez au panier"><i class="fas fa-shopping-basket"></i></button>
                        </div>
                    </form>

                    <form  class="form-panier" action="/ajouter-panier.html" method="POST">
                        <div>Moyenne = <?= number_format($pizza->getPrixPetite() / 100, 2) ?>€</div>
                        <div>
                            <input type="number" name="quantite" placeholder="Quantité" min="1" max="8" id="qp1m" />
                            <input type="hidden" name="id_pizza" value="<?= $pizza->getId() ?>" />
                            <input type="hidden" name="taille" value="<?= PanierItemModel::PIZZA_MOYENNE ?>" />
                            <button type="submit" class="btn" title="ajoutez au panier"><i class="fas fa-shopping-basket"></i></button>
                        </div>
                    </form>

                    <form  class="form-panier" action="/ajouter-panier.html" method="POST">
                        <div>Grande = <?= number_format($pizza->getPrixGrande() / 100, 2) ?>€</div>
                        <div>
                            <input type="number" name="quantite" placeholder="Quantité" min="1" max="8" id="qp1g" />
                            <input type="hidden" name="id_pizza" value="<?= $pizza->getId() ?>" />
                            <input type="hidden" name="taille" value="<?= PanierItemModel::PIZZA_GRANDE ?>" />
                            <button type="submit" class="btn" title="ajoutez au panier"><i class="fas fa-shopping-basket"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<script type="text/javascript">
    $('.form-panier').on('submit', function() {
        $form = $(this);

        console.log("$form.attr('action')", $form.attr('action'));
        console.log("$form.attr('method')", $form.attr('method'));
        console.log("$form.serialize()", $form.serialize());
        

        $.ajax({
            url: $form.attr('action'),
            method: $form.attr('method'),
            data: $form.serialize(),
            success: function(result) {
            }
        });

        return false;
    });
</script>
<?= new View('layout/_footer'); ?>