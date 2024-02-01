<?php
require_once '../lib/review.php';
?>
<!-- MODERATION USER'S REVIEW FORM -->
<form method='post'>
    <fieldset id="feedBack">
        <h2>Liste des avis</h2>
        <table class="tftable" border="1">
            <thead>
                <tr>
                    <th></th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Message</th>
                    <th>Note</th>
                    <th>Valider</th>
                    <th>Supprimer</th>
                </tr>
                <?php
                usort($feedbacks, function ($a, $b) {
                    return $a['id'] - $b['id'];
                });
                foreach ($feedbacks as $feedback) {
                    echo "<tr>";
                    echo "<td>{$feedback['id']}</td>";
                    echo "<td>{$feedback['first_name']}</td>";
                    echo "<td>{$feedback['last_name']}</td>";
                    echo "<td>{$feedback['feedback']}</td>";
                    echo "<td>{$feedback['note']}</td>";
                    echo "<td>";

                    // Formulaire pour valider ou désafficher l'avis
                    echo "<form method='post' action='../lib/review.php'>";
                    echo "<input type='hidden' name='id' value='{$feedback['id']}'>";
                    if ($feedback['valide']) {
                        echo "<input type='submit' name='validate_feedback' value='Désafficher'>";
                    } else {
                        echo "<input type='submit' name='validate_feedback' value='Afficher'>";
                    }
                    echo "</form>";

                    echo "</td>";
                    echo "<td>";
                    // Formulaire pour supprimer l'avis
                    echo "<form method='post' action='../lib/review.php'>";
                    echo "<input type='hidden' name='id' value='{$feedback['id']}'>";
                    echo "<input type='submit' name='delete_feedback' value='Supprimer'>";
                    echo "</form>";

                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </thead>
        </table>
    </fieldset>
</form>