<?php
header('Refresh:3;url=index.php?module=ModConnexion&action=deconnexion');
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./Vue/Affichage/Css/StyleAlerte.css" type="text/css" />
</head>
<body>
<div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    <strong>Attention !</strong> En raison de sécurité vous allez se reconnecter .
</div>
</body>
</html>

