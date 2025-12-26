<?php 
class CompteCourant extends Comptes{
    public function deposer($montant)
    {
        $this->solde += ($montant - 1);
    }
    public function retirer($montant)
    {
        if( $this->solde + 500 >= $montant){
        $this->solde -= $montant;}
    }

}