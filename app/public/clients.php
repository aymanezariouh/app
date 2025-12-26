<?php
class clients{
    private int $id;
    private string $nom;
    private string $prenom;
    private string $email;
    private int $telephone;
    protected datetime $createdAt;

    public function getId(){
        return $this ->id;
    }
    public function getNom(){
        return $this ->nom;
    }
    public function setNom($nom){
        $this->nom = $nom;
    }
    public function getemail(){
        return $this ->email;
    }
    public function setemail($email){
        $this ->email = $email;
    }
}