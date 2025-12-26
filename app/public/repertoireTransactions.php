<?php

class repertoireTransactions
{
    private PDO $DB;

    public function __construct()
    {
        $this->DB = DB::getInstance()->connection();
    }

    // =============ajouter une transaction
    public function ajouteTransaction($montant, $type, $compte_id)
    {
        $sql = "INSERT INTO transactions (montant, type, compte_id)
                VALUES (:montant, :type, :compte_id)";

        $stmt = $this->DB->prepare($sql);
        $stmt->execute([
            ':montant' => $montant,
            ':type' => $type,           // DEPOT | RETRAIT
            ':compte_id' => $compte_id
        ]);
    }

    // =====================toutes les transactions
    public function afficheTransactions()
    {
        $stmt = $this->DB->query(
            "SELECT * FROM transactions ORDER BY date_transaction DESC"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ======================Historique d’un compte
    public function transactionsParCompte($compte_id)
    {
        $sql = "SELECT * FROM transactions
                WHERE compte_id = :compte_id
                ORDER BY date_transaction DESC";

        $stmt = $this->DB->prepare($sql);
        $stmt->execute([
            ':compte_id' => $compte_id
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // =================chercher une transaction par id
    public function chercheTransaction($id)
    {
        $sql = "SELECT * FROM transactions WHERE id = :id";
        $stmt = $this->DB->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ==================supprimer une transaction
    public function supprimerTransaction($id)
    {
        $sql = "DELETE FROM transactions WHERE id = :id";
        $stmt = $this->DB->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
    }
}
