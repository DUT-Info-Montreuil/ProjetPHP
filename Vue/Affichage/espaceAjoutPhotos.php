<form  action="index.php?module=ModMatchs&action=AjouterPhotosMatchs&id=<?=$_GET['id']?>" method="post" enctype="multipart/form-data">
    <div id="InputImageMatch">
        <input type="file" name="photoMatch">
        <div class="btnAjouterPhoto"><button  type="submit" class="btn btn-primary" name="AjouterPhotosMatchs" class="mr-3" >Ajouter</button></div>
    </div>
</form>


