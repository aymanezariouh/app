<?php

class repertoireComptes
{
    private PDO $DB;

    public function __construct()
    {
        $this->DB = DB::getInstance()->connection();
    }

    //  Créer un compte
    public function ajouteCompte($numero, $type, $client_id)
    {
        $sql = "INSERT INTO comptes (numero, solde, type, client_id)
                VALUES (:numero, 0, :type, :client_id)";

        $stmt = $this->DB->prepare($sql);
        $stmt->execute([
            ':numero' => $numero,
            ':type' => $type,           // 'courant' | 'epargne'
            ':client_id' => $client_id
        ]);
    }

    // affivher tous les comptes
    public function afficheComptes()
    {
        $stmt = $this->DB->query("SELECT * FROM comptes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Comptes d’un client
    public function comptesParClient($client_id)
    {
        $sql = "SELECT * FROM comptes WHERE client_id = :client_id";
        $stmt = $this->DB->prepare($sql);
        $stmt->execute([
            ':client_id' => $client_id
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Chercher un compte (par numero)
    public function chercheCompte($numero)
    {
        $sql = "SELECT * FROM comptes WHERE numero = :numero";
        $stmt = $this->DB->prepare($sql);
        $stmt->execute([
            ':numero' => $numero
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //Modifier le solde
    public function modifierSolde($numero, $nouveauSolde)
    {
        $sql = "UPDATE comptes SET solde = :solde WHERE numero = :numero";
        $stmt = $this->DB->prepare($sql);
        $stmt->execute([
            ':solde' => $nouveauSolde,
            ':numero' => $numero
        ]);
    }

    // ==================Supprimer compte si solde = 0
    public function supprimerCompte($numero)
    {
        // vérifier le solde
        $stmt = $this->DB->prepare(
            "SELECT solde FROM comptes WHERE numero = :numero"
        );
        $stmt->execute([
            ':numero' => $numero
        ]);

        $compte = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$compte) {
            return; // compte introuvable
        }

        if ($compte['solde'] != 0) {
            echo "Suppression impossible : solde non nul<br>";
            return;
        }

        $sql = "DELETE FROM comptes WHERE numero = :numero";
        $stmt = $this->DB->prepare($sql);
        $stmt->execute([
            ':numero' => $numero
        ]);
    }
}
