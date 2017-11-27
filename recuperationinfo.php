<?php
$n = count($_SESSION['panier']);
for ($i = 0; $i<$n; $i++) {
echo $_SESSION['panier'][$i]['quantite'].'<br/>';
echo $_SESSION['panier'][$i]['id_produit'].'<br/>';
}
?>