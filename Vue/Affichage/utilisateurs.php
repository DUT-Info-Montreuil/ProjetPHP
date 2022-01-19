
<div class="container">
    <h1 class="titrePageAmis">Ajouter des amis</h1>
    <div class="mb-3"> <a class="btn btn-primary" href="index.php?module=ModProfil&action=Profil" role="button">Revenir au profil</a></div>
    <div class="row">
        <div class="col-sm-0 col-md-2 col-lg-3"></div>
        <div class="col-sm-12 col-md-8 col-lg-6">
            <div class="form-group">
                <input class="form-control" type="text" id="search-user" value="" placeholder="Rechercher un ou plusieurs utilisateurs"/>
            </div>
            <div style="margin-top:20px">
                <div id="result-search"></div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function (){
        $('#search-user').keyup(function (){
            var utilisateur = $(this).val();

            $('#result-search').html('');
            if(utilisateur != ""){
                $.ajax({
                type:"GET",
                url:'index.php?module=ModAmis&action=RechercherAmis',
                data: 'user=' + encodeURIComponent(utilisateur),
                success: function(data){
                    if(data != ""){
                        $('#result-search').append(data);
                    }else{
                        document.getElementById('result-search').innerHTML = "<div style='font-size: 20px; text-align: center; margin-top: 10px; color :white;'>Aucun utilisateur</div>"
                    }
                }
                });
            }
        });
    });
</script>