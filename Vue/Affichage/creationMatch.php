<div class="container rounded bg-light mt-3 " >
    <div class="row">
        <div class="d-wrapper mt-3 flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mr mb-1"></i>
            <a href="index.php?module=ModMatchs&action=PageMatchs" class=" mb-3 btn btn-info" role="button">Revenir à l'accueil des matchs</a>
                <form  action="index.php?module=ModMatchs&action=CreerMatch" method="post" enctype="multipart/form-data">
                    <div class="row mt-4 ">
                        <div class="col-md-6"><input type="text" class="form-control" name="nomMatch" placeholder="Nom Match"></div>
                        <div class="col-md-6"><input type="text" class="form-control" name="lieuMatch" placeholder="Lieu Du Match"></div>
                    </div>
                    <hr>
                    <div id="NbJoueurs">
                        <label>Nombre de joueurs : </label>
                        <select name="LabelNbJoueurs" required>
                            <option value="10">10</option>
                            <option value="9">9</option>
                            <option value="8">8</option>
                            <option value="7">7</option>
                            <option value="6">6</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <hr>
                    <div id ="dateMatch">
                    <label>Date du match :  </label>
                    <input type="date" name="dateMatch"
                           value='<?= date('Y-m-d');?>'
                           min='<?= date('Y-m-d');?>' max="2023-01-01">
                    </div>
                    <hr>
                    <div id="heureMatch">
                        <label>Heure du match :  </label>
                        <input type="time" name="heureMatch">
                    </div>
                    <hr>
                    <div id="InputImageMatch">
                        <label>Image du match :  </label>
                        <input type="file" name="imageMatch">
                    </div>
                    <hr>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="float: right; margin-bottom: 10px;">
                        Créer ce match
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Voulez-vous vraiment créer ce match ?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" name="CreerMatch">Oui</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Non</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
</div>
