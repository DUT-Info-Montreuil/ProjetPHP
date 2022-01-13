<?php

class Vue {
    public static function render($path,$data=[]){
        ob_start();
        include_once "./Vue/$path";
        $contenu = ob_get_clean();

        include_once "./Vue/Affichage/header.php";
        echo "<div>";
        echo $contenu;
        echo "</div>";
        include_once "./Vue/Affichage/footer.php";
    }

    public static function alerte_message($message,$type_alerte,$url) {
        $data["message_alerte"]=$message;
        $data["type_alerte"]=$type_alerte;
        $data["titre"]="Message Système";
        $data['urlClose']=$url;
        Vue::render("Affichage/alerte_message.php",$data);
    }
}
