<?php
    $userId=$data["userTest"];
?>
<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">
        <div class="col-md-8 col-xl-6 chat">
            <div class="cardDiscussion">
                <div class="card-header msg_head"></div>

                <div id="msgForm" >
                <div class="card-body msg_card_body">
                    <?php
                    $liste = $data["messages"];
                    if (!empty($liste)): ?>
                    <?php foreach ($liste as $value): ?>
                   <?php if ($value['idUtilisateur'] == $userId[0][0]): ?>
                    <div class="d-flex justify-content-end mb-4">
                        <div class="msg_cotainer_send">
                            <span id="<?= $value['idUtilisateur'] ?>"><?= nl2br($value['contenu']) ?></span>
                            <span class="msg_time_send"><?= $value['DatePublication'] ?></span>
                        </div>
                    </div>
                     <?php else: ?>
                    <div class="d-flex justify-content-start mb-4">
                        <div class="msg_cotainer">
                            <span id="<?= $value['idUtilisateur'] ?>"><?= nl2br($value['contenu']) ?></span>
                            <span class="msg_time"><?= $value['DatePublication'] ?></span>
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
