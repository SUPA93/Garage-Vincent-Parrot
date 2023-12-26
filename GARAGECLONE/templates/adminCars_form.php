<?php
require_once "../lib/cars.php";
?>
<!-- ADMIN USED CAR FORM -->
<form method="post" name="used_cars_display">
    <fieldset id="used_cars_list">
        <h2>Liste des véhicules</h2>
        <table class="tftable" border="1">
            <thead>
                <tr>
                    <!-- <th></th> -->
                    <th>Marque</th>
                    <th>Modèle</th>
                    <th>Année</th>
                    <!-- <th>Couleur</th> -->
                    <th>Prix</th>
                    <th>Image</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
                <?php
                foreach ($articles as $article) : ?>
                    <tr>
                        <!-- <td><?= $article['id'] ?></td> -->
                        <td><?= $article['brand'] ?></td>
                        <td><?= $article['model'] ?></td>
                        <td><?= $article['year'] ?></td>
                        <td><?= $article['price'] ?></td>
                        <td><img style="max-width:100px" ; src="<?= $article["pictures"] ?>" alt="<?= $article["brand"] . " " . $article["model"] ?>" title="<?= $article["brand"] . " " . $article["model"] ?>"></td>
                        <td><a href='adminEditCar_form.php?id=<?= $article['id'] ?>'>Modifier</a></td>
                        <td><a href='../lib/cars.php?id=<?= $article['id'] ?>'>Supprimer</a></td>
                    </tr>
                <?php endforeach; ?>
            </thead>
        </table>
    </fieldset>
</form>