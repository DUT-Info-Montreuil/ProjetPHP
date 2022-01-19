
<?php
    $userId=$data["userTest"];
?>

<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">
        <div class="col-md-8 col-xl-6 chat">
            <div class="cardDiscussion">
                <div class="card-header" id="titreDiscu"><?= $data['nomMatch'][0] ?></div>
                <div id="msgForm" >
                <div class="card-body msg_card_body">
                    <?php
                    $liste = $data["messages"];
                    if (!empty($liste)): ?>
                    <?php foreach ($liste as $value): ?>
                   <?php if ($value['idUtilisateur'] == $userId[0][0]): ?>
                    <div class="d-flex justify-content-end mb-4">
                        <div class="msg_cotainer_send">
                            <span class="msg_nom"><?= $value['nomUtilisateur'] ?></span>
                            <?php if ($value['photo']!=NULL):?>
                                    <span class="msg_photo"><img  src="./Vue/Affichage/Images/<?= $value['photo'] ?>"  alt="Card image cap"></span>
                                <?php endif; ?>
                            <br>
                            <span id="contenuMessage"><?= nl2br($value['contenu']) ?></span>
                            <span class="msg_time_send"><?= $value['DatePublication'] ?></span>
                        </div>
                    </div>
                     <?php else: ?>
                    <div class="d-flex justify-content-start mb-4">
                        <div class="msg_cotainer">
                            <span class="msg_nom_receiver"><?= $value['nomUtilisateur'] ?></span>
                            <?php if ($value['photo']!=NULL):?>
                                <span class="msg_photo"><img  src="./Vue/Affichage/Images/<?= $value['photo'] ?>"  alt="Card image cap"></span>
                            <?php endif; ?>
                            <br>
                            <span id="contenuMessage"><?= nl2br($value['contenu']) ?></span>
                            <span class="msg_time_receiver"><?= $value['DatePublication'] ?></span>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <script>document.getElementById('msgForm').scrollTop = document.getElementById('msgForm').scrollHeight;
                    </script>
                    </div>
                </div>
                <div class="card-footer">
                    <form name="message" action="index.php?module=ModDiscussion&action=EnvoyerMessage&id=<?= $data[0]?>" method="post" enctype="multipart/form-data">
                        <div class="input-group">
                            <div class="input-group-append">
                                <input type="file" id="file" name="photoDiscussion"></>
                                <label for="file" id="labelFile"><i class="fas fa-image"></i></label>
                            </div>
                            <textarea name="contenuMsg" class="form-control type_msg" placeholder="Ecrivez votre message..."></textarea>
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
