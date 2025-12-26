<?php

class Transaction
{
    protected int $id;
    protected float $montant;
    protected string $type; // DEPOT | RETRAIT
    protected int $compteId;
    protected string $dateTransaction;

    public function __construct($id, $montant, $type, $compteId, $dateTransaction)
    {
        $this->id = $id;
        $this->montant = $montant;
        $this->type = $type;
        $this->compteId = $compteId;
        $this->dateTransaction = $dateTransaction;
    }

    // getters 
    public function getMontant() {return $this->montant;}
    public function getType() {return $this->type;}
    public function getCompteId() {return $this->compteId;}
}
