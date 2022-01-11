<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
</head>
<form  action="index.php?module=ModMatchs&action=AjouterPhotosMatchs&id=<?=$_GET['id']?>" method="post" enctype="multipart/form-data">
    <div id="InputImageMatch">
        <label>Photo :  </label><br>
        <input type="file" name="photoMatch">
        <div class="btnAjouterPhoto"><button  type="submit" class="btn btn-primary" name="AjouterPhotosMatchs" class="mr-3" >Ajouter cette Image</button></div>
    </div>
</form>


