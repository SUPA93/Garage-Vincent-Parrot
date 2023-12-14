<!-- UPDATE SCHEDULES FORM -->
<form method="post" >
    <fieldset id="open_time">

        <h2>Modifier les Horaires</h2>

        <!-- DROP DOWN WITH DAYS OF THE WEEK -->
        <label for="day">Sélectionnez le jour :</label>
        <select name="day" id="day" required>
            <?php foreach ($horaires as $jour => $horaire) { ?>
                <option value="<?php echo $jour; ?>"><?php echo ucfirst($jour); ?></option>
            <?php } ?>
        </select>

        <!-- OPEN TIME -->
        <label for="opening_time">Heure d'Ouverture :</label>
        <input type="text" id="opening_time" name="opening_time" placeholder="HH:MM" required>

        <!-- CLOSING TIME -->
        <label for="closing_time">Heure de Fermeture :</label>
        <input type="text" id="closing_time" name="closing_time" placeholder="HH:MM" required>

        <!-- BUTTON -->
        <button class="btninscription" type="submit">Modifier Horaires</button>
    </fieldset>
</form>