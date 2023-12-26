<?php 

?>

<ul class="horaires">
            <li>Nos Horaires</li>
            <?php foreach ($horaires as $jour => $horaire) { ?>
                <li id="<?php echo $jour; ?>">
                    <?php
                    $heureOuverture = substr($horaire['ouverture'], 0, 5);
                    $heureFermeture = substr($horaire['fermeture'], 0, 5);
                    echo ucfirst(substr($jour, 0, 3)) . ': ' . $heureOuverture . ' - ' . $heureFermeture; ?>
                </li>
            <?php } ?>
            <li id="dim">Dimanche: fermé</li>
        </ul>