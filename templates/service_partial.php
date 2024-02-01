<!-- SERVICES SECTION DISPLAY -->
<form action="/templates/devis.php" method="post">
    <label for="immatriculation">Votre immatriculation</label><br>
    <input type="text" id="immat" name="immatriculation" placeholder="ex: AB 123 CD "><br>
    <label for="reponse-selector">Type de préstation</label>
    <select name="reponse-selector" id="reponse-selector">
        <?php
        foreach ($services as $service) {
            echo "<option value='" . $service['svc_name'] . "'>" . $service['svc_name'] . "</option>";
        } ?>
    </select>
    <input type="submit" class="btninscription" value="Devis">
</form>