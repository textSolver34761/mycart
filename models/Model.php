<?php

class Model {
    protected static function createStatement($sql){
        try {
            require __DIR__.'/../config.php';

            $pdo = new PDO(
                "mysql:dbname=$dbname;host=$host;charset=utf8", $user, $password
              );

            $pdo_statement = $pdo->prepare($sql);
        } catch (PDOException $e) {
            echo 'erreur : ' . $e->getMessage();

            $pdo_statement = null;
        }
        return $pdo_statement;
    }
}

class Sessions extends Model{
    function session(){
        // on teste si nos variables sont définies
        if (isset($_POST['login']) && isset($_POST['pwd'])) {

            // on vérifie les informations du formulaire, à savoir si le pseudo saisi est bien un pseudo autorisé, de même pour le mot de passe
            if ($login_valide == $_POST['login'] && $pwd_valide == $_POST['pwd']) {
                // dans ce cas, tout est ok, on peut démarrer notre session

                // on la démarre
                session_start ();
                // on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['pwd'] = $_POST['pwd'];

                // on redirige notre visiteur vers une page de notre section membre
                header ('location: /views/session/page_membre.php');
            }
            else {
                // Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
                echo '<body onLoad="alert(\'Membre non reconnu...\')">';
                // puis on le redirige vers la page d'accueil
                header ('location: /views/session/formulairedidentification.php');
            }
        }
        else {
            echo 'Les variables du formulaire ne sont pas déclarées.';
        }
    }
}