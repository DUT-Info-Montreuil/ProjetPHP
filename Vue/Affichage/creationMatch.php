<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body id="body">
<div class="container rounded bg-light mt-3 " >
    <div class="row">
        <div class="d-wrapper mt-3 flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mr mb-1"></i>
            <a href="index.php?module=ModMatchs&action=PageMatchs" class=" mb-3 btn btn-info" role="button">Revenir au page des Matchs</a>
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
                            <option value="5">5</option>
                        </select>
                    </div>
                    <hr>
                    <div id ="dateMatch">
                    <label>Date De match :  </label>
                    <input type="date" name="dateMatch"
                           value="2021-07-22"
                           min="01-01-2022" max="01-12-2050">
                    </div>
                    <hr>
                    <div id="heureMatch">
                        <label>Heure De match :  </label>
                        <input type="time" name="heureMatch">
                    </div>
                    <hr>
                    <div id="InputImageMatch">
                        <label>Image De match :  </label>
                        <input type="file" name="imageMatch">
                    </div>
                    <hr>
                    <div class="btnCreerMatch"><button  onclick="showFunction()" class="btn btn-danger "  class="mr-3" type="button" >Creer ce Match</button></div>
                    <div class="show2" id="show">
                        <h2>Vous voulez participer à ce match ?</h2>
                        <button name="CreerMatch" >Oui je veux bien ! </button>
                        <button id="buttonNonMerci" ><a id="txt" href="index.php?module=ModProfil&ation=Profil">Non Merci </button>
                    </div>
                </form>



        </div>
        </div>
    </div>
</div>
</body>
<script src="https://kit.fontawesome.com/6440c9a3af.js" crossorigin="anonymous"></script>
<script src="./Vue/Affichage/JavaScript/script.js"></script>