<?php
    session_start(); // A ne pas oublier sur toutes les pages
    $n = count($_SESSION['panier']); // On compte le nombre de sessions
            if($n != 0) { // Si il n'y a aucun produit, on laisse le 0 sinon, on incrémente pour ne pas écraser le produit d'avant
                $n++; // 
            }

    $_SESSION['panier'][$n]['quantite'] = $_POST['quantite'];
    $_SESSION['panier'][$n]['id_produit'] = $_POST['id_produit'];

    $n = count($_SESSION['panier']);
        for ($i = 0; $i<$n; $i++) {
            $qte .= $_SESSION['panier'][$i]['quantite'].'-';
            $id .= $_SESSION['panier'][$i]['id_produit'].'-';
        }
?>