<?php 
require_once '../lib/contact.php';
?>
<!-- CONTACT USER'FFEDBACK FORM -->
<form method="post" name="contact_form_user_message">
        <fieldset id="user_message_display">
            <h2>Liste des messages</h2>
            <table class="tftable" border="1">
                <thead>
                    <tr>
                        <th> Auteur</th>
                        <th> Objet </th>
                        <th> Message </th>
                        <th> Ent </th>
                        <th> Supprimer </th>
                        
                    </tr>
                    <?php
                    foreach ($messages as $message) : ?>
                        <tr>
                            <td><?= $message['nom'].'<br>'.$message['email'] ?></td>
                            <td><?= $message['objet'] ?></td>
                            <td><?= $message['message'] ?></td>
                            <td><?= $message['societe'] ?></td>
                            <td><button class="btninscription" type="button"><a href='/lib/contact.php?delete_id=<?= $message['id'] ?>'>✖</a></button></td>
                        </tr>
                    <?php endforeach; ?>
                </thead>
            </table>
        </fieldset>
</form>