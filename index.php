<?php
require_once __DIR__ . '/app/public/repertoireClients.php';
require_once __DIR__ . '/app/config/database.php';
$repo = new repertoireClients();

$client = $repo->chercheClient("aymanwauh@gmail");

if ($client) {
    print_r($client);
} else {
    echo "Client not found";
}
/*$repo = new repertoireClients();

// AJOUT
$repo->ajouteClient("Ayman", "Zariouh", "ayman@test.com");

// AFFICHAGE
print_r($repo->afficheclient());

// MODIFICATION
$repo->modifierclients("Ayman", "Updated", "ayman@test.com");

// SUPPRESSION
$repo->supprimerClient("ayman@test.com");
 */




////////////////////////

/*$repo = new repertoireComptes();
//-----------------------------------
//prtie conteas 
//===============================



// CREATE
$repo->ajouteCompte("ACC1001", "courant", 1);

// READ ALL
print_r($repo->afficheComptes());

// READ BY CLIENT
print_r($repo->comptesParClient(1));

// SEARCH
$compte = $repo->chercheCompte("ACC1001");
print_r($compte);

// UPDATE SOLDE
$repo->modifierSolde("ACC1001", 500);

// DELETE (only if solde = 0)
$repo->supprimerCompte("ACC1001");
 */

?>