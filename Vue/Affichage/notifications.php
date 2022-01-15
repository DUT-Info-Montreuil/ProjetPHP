<?php
$liste = $data["liste3"];
if (!empty($liste)):?>
        <?php foreach ($liste as $value): ?>
        <li><?= $value['ContenuNotification'] ?> </li>
        <?php endforeach; ?>
<?php endif; ?>
