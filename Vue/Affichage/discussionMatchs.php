<div id="discussion">
  <div id="menu">
		<p class="Bienvenue">Bienvenue <b></b></p>
		<p class="logout"><a id="exit" href="index.php?module=ModProfil">Quitter la discussion</a></p>
		<div style="clear:both"></div>
	</div>
    <?php
    $liste = $data["messages"];
    $userId=$data["userTest"];
    if (!empty($liste)): ?>
    <div id="msg" style="border: 1px solid #cccccc; padding: 10px 0; border-radius: 5px;overflow: scroll;height: 400px;margin: 10px 0; background: white">
    <?php  foreach ($liste as $value): ?>
    <?php
            if ($value['idUtilisateur'] == $userId[0][0]): ?>
                <div style="float: right;width: auto; max-width: 80%; margin-right: 26px;position: relative;padding: 7px 20px;color: #fff;background: #0B93F6;border-radius: 5px;margin-bottom: 15px; clear: both">
                <span id="<?= $value['idUtilisateur'] ?>"><?= nl2br($value['contenu']) ?></span>
                <div style="font-size: 10px; text-align: right; margin-top: 10px">Par <?= $userId[0]['nom']?>, le <?= $value['DatePublication']?></div></div>
               <?php else: ?>
                <div style="position: relative;padding: 7px 20px;background: #E5E5EA;border-radius: 5px;color: #000;float: left;width: auto; max-width: 80%; margin-left: 10px;margin-bottom: 15px; clear: both">
                <span id="<?= $value['idUtilisateur'] ?>"><?= nl2br($value['contenu']) ?></span>
                <div style="font-size: 10px; text-align: right; margin-top: 10px">Par <?= $value['idUtilisateur'] ?>, le <?= $value['DatePublication'] ?></div></div>
                <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        <script>document.getElementById('msg').scrollTop = document.getElementById('msg').scrollHeight;
        </script>
    </div>

    <form name="message" action="index.php?module=ModDiscussion&action=EnvoyerMessage&id=<?= $data[0] ?>" method="post">
		<input name="contenuMsg" type="text" id="usermsg" size="63" placeholder="ecrivez un message" required="required" />
		<input name="envoyerMessage" type="submit"  id="submitmsg" value="Send" />
	</form>
</div>