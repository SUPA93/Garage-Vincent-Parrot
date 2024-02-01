<!-- ADMIN SERVICES FORM -->
<?php 

require_once "../lib/service.php";
?>

<form method="post">
    <fieldset id="service_table">
        <h2>Liste des services</h2>
        <table class="tftable" border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Service</th>
                    <th>Tarif</th>
                    <th>Durée</th>
                    <th>Supprimer</th>
                </tr>
                <?php
                foreach ($services as $service) {
                    echo "<tr>";
                    echo "<td>{$service['id']}</td>"; // ID du service
                    echo "<td>{$service['svc_name']}</td>"; // Nom du service
                    echo "<td>{$service['svc_price']}</td>"; // Tarif
                    echo "<td>{$service['svc_time']}</td>"; // Durée
                    echo "<td><a href='delete_service.php?id={$service['id']}'>Supprimer</a></td>";
                    echo "</tr>";
                }
                ?>
            </thead>
        </table>

        <h2>Ajouter un service</h2>
        <label for="svc_name">Nom du service:</label>
        <input type="text" name="svc_name" required autocomplete="svc_name"><br>

        <label for="svc_price">Prix du service:</label>
        <input type="text" name="svc_price" required><br>

        <label for="svc_time">Durée du service:</label>
        <input type="text" name="svc_time" required><br>

        <button type="submit" name="add_service_btn">Ajouter Service</button>
    </fieldset>
</form>