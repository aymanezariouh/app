<?php
abstract class Comptes{
    protected int $id;
    protected string $numero;
    protected float $solde;
    protected datetime $createdAt;

public function __construct($id,$numero,$solde){
    $this ->id= $id;
    $this ->numero =$numero;
    $this ->solde = $solde;
}
abstract public function deposer($montant);
abstract public function retirer($montant);
}