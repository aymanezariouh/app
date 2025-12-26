<?php

class repertoireClients
{
    private PDO $DB;
 
    public function __construct()
    {
        $this->DB = DB::getInstance()->connection();
    }

    // ====================== AFFICHER TOUS LES CLIENTS
    public function afficheclient()
    {
        $stmt = $this->DB->query("SELECT * FROM clients");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // =================AJOUTER CLIENT
    public function ajouteClient($nom, $prenom, $email)
    {
        $sql = "INSERT INTO clients (nom, prenom, email)
                VALUES (:nom, :prenom, :email)";

        $stmt = $this->DB->prepare($sql);
        $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':email' => $email
        ]);
    }

    // =============MODIFIER CLIENT 
    public function modifierclients($nom, $prenom, $email)
    {
        // check if client exists
        $stmt1 = $this->DB->prepare(
            "SELECT id FROM clients WHERE email = :email"
        );
        $stmt1->execute([
            ':email' => $email
        ]);

        $client = $stmt1->fetch(PDO::FETCH_ASSOC);
        if (!$client) {
            return; // client not found
        }

        $sql = "UPDATE clients
                SET nom = :nom, prenom = :prenom
                WHERE email = :email";

        $stmt2 = $this->DB->prepare($sql);
        $stmt2->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':email' => $email
        ]);
    }

    // =============SUPPRIMER CLIENT
   
    public function supprimerClient($email)
    {
        $sql = "DELETE FROM clients WHERE email = :email";
        $stmt = $this->DB->prepare($sql);
        $stmt->execute([
            ':email' => $email
        ]);
    }
    public function chercheClient($email)
{
    $sql = "SELECT * FROM clients WHERE email = :email";
    $stmt = $this->DB->prepare($sql);
    $stmt->execute([ 
        ':email' => $email
    ]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

}
