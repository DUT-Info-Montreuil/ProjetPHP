<?php
$userId=$data["userTest"];
?>
<div id="discussion">
  <div id="menu">
		<p class="Bienvenue">Bienvenue <b><?= $userId[0]['nom']?></b></p>
		<p class="quitterConversation"><a id="exit" href="index.php?module=ModProfil">Quitter la discussion</a></p>
		<div style="clear:both"></div>

    <div id="msgForm" >
        <?php
        $liste = $data["messages"];
        if (!empty($liste)): ?>

        <?php  foreach ($liste as $value): ?>
    <?php
            if ($value['idUtilisateur'] == $userId[0][0]): ?>
                <div id="msgSender_1">
                <span id="<?= $value['idUtilisateur'] ?>"><?= nl2br($value['contenu']) ?></span>
                <div id="msgSender_2">Par <?= $userId[0]['nom']?>, le <?= $value['DatePublication']?></div></div>
               <?php else: ?>
                <div id="msgReceiver_1">
                <span id="<?= $value['idUtilisateur'] ?>"><?= nl2br($value['contenu']) ?></span>
                <div id="msgReceiver_2">Par <?= $value['idUtilisateur'] ?>, le <?= $value['DatePublication'] ?></div></div>
            <?php endif; ?>
                <?php endforeach; ?>

        <?php endif; ?>
        <script>document.getElementById('msgForm').scrollTop = document.getElementById('msgForm').scrollHeight;
        </script>
    </div>
      <form name="message" action="index.php?module=ModDiscussion&action=EnvoyerMessage&id=<?= $data[0] ?>" method="post">
          <input name="contenuMsg" type="text" id="usermsg" size="63" placeholder="ecrivez un message" required="required" />
          <input name="envoyerMessage" type="submit"  id="submitmsg" value="Envoyer" />

      </form>
  </div>

</div>