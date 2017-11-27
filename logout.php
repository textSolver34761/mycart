<?php
// On enregistre les infos présente dans le panier dans la BDD

$n = count($_SESSION['panier']);
for ($i = 0; $i<$n; $i++) {
$qte .= $_SESSION['panier'][$i]['quantite'].'-';
$id .= $_SESSION['panier'][$i]['id_produit'].'-';
}

// On détruit les variables de notre session
session_unset ();

// On détruit notre session
session_destroy ();

// On redirige le visiteur vers la page d'accueil
header ('location: formulairedidentification.php');
?>