<!-- USER'S REVIEW COMPONENT -->
<div class="carousel-container">
    <div class="carousel">
        <?php
        usort($feedbacks, function ($a, $b) {
            return $a['id'] - $b['id'];
        });
        foreach ($feedbacks as $index => $feedback) :
            if ($feedback['valide']) :
        ?>
                <div class="avis-carte">
                    <h3><?= $feedback['first_name'] ?> <?= $feedback['last_name'] ?></h3>
                    <p><?= $feedback['feedback'] ?></p>
                    <p>Note : <?= $feedback['note'] ?>/5</p>
                    <p class="status">Avis vérifié</p>
                </div>
        <?php
            endif;
        endforeach;
        ?>
    </div>
</div>