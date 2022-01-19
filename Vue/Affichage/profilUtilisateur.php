<div class="container">
    <div id="content" class="content p-0">
        <div class="profile-header">
            <div class="profile-header-cover"></div>
            <div class="profile-header-content">
                <div class="profile-header-img mb-4">
                    <?php
                    if ($data['sexe']=='Madame'): ?>
                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="mb-4" alt="" />
                    <?php else: ?>
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="mb-4" alt="" />
                    <?php endif; ?>
                </div>
                <div class="profile-header-info">
                    <h4 class="m-t-sm"><?= $data['prenom'] ?></h4>
                </div>
            </div>
            <ul class="profile-header-tab nav nav-tabs">
                <li class="nav-item"><a href="#profile" class="nav-link" name="profil" data-toggle="tab">Information</a></li>
            </ul>
        </div>
        <div class="card" >
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0 mr-30">Civilité : </p>
                    </div>
                    <div class="col-sm-9">
                        <p class="mb-0"><?= $data['sexe'] ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Nom : </p>
                    </div>
                    <div class="col-sm-9">
                        <p class="mb-0"><?= $data['nom']?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Prénom :</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="mb-0"><?= $data['prenom']?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Age : </p>
                    </div>
                    <div class="col-sm-9">
                        <p class="mb-0"><?= $data['age']?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Poste Match :</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="mb-0"><?=  $data['posteMatch']?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Ville :</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="mb-0"><?=  $data['ville']?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Email :</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="mb-0"><?=  $data['login']?></p>
                    </div>
                </div>
                <div class="float-end">
                    <a href="index.php?module=ModAmis&action=TousMesAmis" class="btn btn-primary" role="button">Retour</a>
                </div>
                    <table class="table table-striped table-light" style="width:22%; border-radius: 25px !important; border-width: 5px !important;border-style: solid !important; height:20% !important;margin-top:30px; ">
                        <thead>
                        <tr>
                            <th>Like</th>
                            <th>Dislike</th>
                        </tr>
                        </thead>
                        <tbody>
                        <th>
                            <a href="#ajoutLike"  class="trigger-btn" data-toggle="modal" id="Like">
                                <label>
                                    <i class="fas fa-thumbs-up fa-2x" aria-hidden="true"></i>
                                    <span class="countlike"><div id="result-comptageLikes"></div></span>
                                </label>
                            </a>
                            <!-- Modal HTML -->
                            <div id="ajoutLike" class="modal fade">
                                <div class="modal-dialog modal-confirm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="icon-box">
                                                <i class="material-icons">&#xE876;</i>
                                            </div>
                                            <h4 class="modal-title w-100">Merci de votre avis</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="?module=ModProfil&action=ConsulterProfil&id=<?= $data['idUtilisateur']?>" class="btn">Ok</a>
                                        </div>
                                    </div>
                                </div>
                        </th>
                        <td>
                            <a href="#ajoutDeslike"  class="trigger-btn" data-toggle="modal"id="Deslike">
                                <label>
                                    <i class="fas fa-thumbs-down fa-2x" aria-hidden="true"></i>
                                    <span class="countDeslike"><div id="result-comptageDesLikes"></div></span>
                                </label>
                            </a>
                            <!-- Modal HTML -->
                            <div id="ajoutDeslike" class="modal fade">
                                <div class="modal-dialog modal-confirm2">
                                    <div class="modal-content">
                                        <div class="modal-header flex-column">
                                            <div class="icon-box">
                                                <i class="material-icons">&#xE5CD;</i>
                                            </div>
                                            <h4 class="modal-title w-100">Merci de votre avis</h4>
                                        </div>
                                        <div class="modal-footer justify-content-right">
                                            <a href="?module=ModProfil&action=ConsulterProfil&id=<?= $data['idUtilisateur']?>" class="btn">Ok</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                        </tbody>
                    </table>
                    <script>
                        $(document).ready(function() {
                            $("#Deslike").on("click", function() {
                                $.ajax({
                                    url: "index.php?module=ModAmis&action=ajouterDeslike&id=<?=$data['idUtilisateur']?>",
                                    success: function(res4) {
                                        console.log(res4);
                                    }
                                });
                            });
                        });
                    </script>
                    <script>
                        $(document).ready(function() {
                            $("#Like").on("click", function() {
                                $.ajax({
                                    url: "index.php?module=ModAmis&action=ajouterLike&id=<?=$data['idUtilisateur']?>",
                                    success: function(res5) {
                                        console.log(res5);
                                    }
                                });
                            });
                        });
                    </script>
                    <script>
                        $(document).ready(function() {
                            $.ajax({
                                url: "index.php?module=ModAmis&action=NombreLikesUser&id=<?=$data['idUtilisateur']?>",
                                success: function(res6) {
                                    console.log(res6);
                                    $('#result-comptageLikes').append(res6);
                                }
                            });
                        });
                    </script>
                    <script>
                        $(document).ready(function() {
                            $.ajax({
                                url: "index.php?module=ModAmis&action=NombreDesLikesUser&id=<?=$data['idUtilisateur']?>",
                                success: function(res6) {
                                    console.log(res6);
                                    $('#result-comptageDesLikes').append(res6);
                                }
                            });
                        });
                    </script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
                </div>
        </div>
    </div>
</div>