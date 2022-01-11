<?php
    $userId=$data["userTest"];
?>
<!--
<div id="discussion">
  <div id="menu">
		<p class="Bienvenue">Bienvenue <b><?/*= $userId[0]['nom']*/?></b></p>

      <button onclick="location.href='index.php?module=ModProfil&action=Profil'" class="quitterConversation" style="vertical-align:middle"><span>Quitter </span></button>
      <div style="clear:both"></div>

    <div id="msgForm" >
        <?php
/*        $liste = $data["messages"];
        if (!empty($liste)): */?>

        <?php /* foreach ($liste as $value): */?>
    <?php
/*            if ($value['idUtilisateur'] == $userId[0][0]): */?>
                <div id="msgSender_1">
                <span id="<?/*= $value['idUtilisateur'] */?>"><?/*= nl2br($value['contenu']) */?></span>
                <div id="msgSender_2">Par <?/*= $value['nomUtilisateur']*/?>, le <?/*= $value['DatePublication']*/?></div></div>
               <?php /*else: */?>
                <div id="msgReceiver_1">
                <span id="<?/*= $value['idUtilisateur'] */?>"><?/*= nl2br($value['contenu']) */?></span>
                <div id="msgReceiver_2">Par <?/*= $value['nomUtilisateur'] */?>, le <?/*= $value['DatePublication'] */?></div></div>
            <?php /*endif; */?>
                <?php /*endforeach; */?>

        <?php /*endif; */?>
        <script>document.getElementById('msgForm').scrollTop = document.getElementById('msgForm').scrollHeight;
        </script>
    </div>
      <form name="message" action="index.php?module=ModDiscussion&action=EnvoyerMessage&id=<?/*= $data[0] */?>" method="post">
          <input name="contenuMsg" type="text" id="usermsg" size="63" placeholder="ecrivez un message" required="required" />
          <input name="envoyerMessage" type="submit"  id="submitmsg" value="Envoyer" />

      </form>
  </div>

</div>-->

<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">
        <div class="col-md-8 col-xl-6 chat">
            <div class="cardDiscussion">
                <div class="card-header msg_head"></div>
                <div class="card-body msg_card_body">

                    <div class="d-flex justify-content-end mb-4">
                        <div class="msg_cotainer_send">
                            zdefzfjhzjfzefjf
                            <span class="msg_time_send">8:55 AM, Today</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-start mb-4">

                        <div class="msg_cotainer">
                            I am good too, thank you for your chat template
                            <span class="msg_time">9:00 AM, Today</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mb-4">
                        <div class="msg_cotainer_send">
                            You are welcome
                            <span class="msg_time_send">9:05 AM, Today</span>
                        </div>
                    </div>


                </div>

                <div class="card-footer">
                    <form name="message" action="index.php?module=ModDiscussion&action=EnvoyerMessage&id=<?= $data[0]?>" method="post">
                        <div class="input-group">
                            <div class="input-group-append">
                                <input type="file" id="file"></>
                                <label for="file" id="labelFile"><i class="fas fa-image"></i></label>
                            </div>
                            <textarea name="contenuMsg" class="form-control type_msg" placeholder="Ecrivez votre message..." required></textarea>
                            <div class="input-group-append">
                                <button name="envoyerMessage" id="sendMsgButton"><i class="fas fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://kit.fontawesome.com/6440c9a3af.js" crossorigin="anonymous"></script>
