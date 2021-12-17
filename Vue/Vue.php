<?php

class Vue {
    public static function render($path,$data=[]){
        ob_start();
        include_once "./Vue/$path";
        $contenu = ob_get_clean();

        include_once "./Vue/Affichage/header.php";
        echo $contenu;
        include_once "./Vue/Affichage/footer.php";

    }
}
