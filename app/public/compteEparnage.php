<?php 
class compteEparnage extends Comptes{
    public function deposer($montant)
    {
        $this->solde += $montant;
    }
    public function retirer($montant)
    {
        if($this->solde >= $montant){
            $this->solde -= $montant;
        }
    }
}