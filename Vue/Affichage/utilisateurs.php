

<div class="container">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="./Vue/Affichage/JavaScript/bootstrap.min.js"></script>
<!--
<script>

    $(document).ready(function(){
        $('#search-user').keyup(function(){
            var utilisateur = $(this).val();
            $('#result-search').html('');

            if(utilisateur != ""){

                $.ajax({
                    type: 'GET',
                    url: './Vue/Affichage/recherche_utilisateur',
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
-->
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