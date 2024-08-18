<?php
class user
{
    private int $id_user;
    private string $nom; 
    private string $prenom;
    private string $email;
    private string $mdp;
    private string $role;
    

    public function __construct(int $id_user, string $nom, string $prenom, string $email, string $mdp, string $role )
    {
        $this->id_user = $id_user;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->mdp = $mdp;
        $this->role = $role;
        
    }

    public function getId()
    {
        return $this->id_user;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getMdp()
    {
        return $this->mdp;
    }

    public function getRole()
    {
        return $this->role;
    }


    public function setNom(int $nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom(string $prenom)
    {
        $this->prenom = $prenom;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function setMdp(string $mdp)
    {
        $this->status = $mdp;
    }

    public function setRole(string $role)
    {
        $this->role = $role;
    }
}
 