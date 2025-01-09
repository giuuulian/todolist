<?php
include_once 'model/bdd.php';

class UsersModel
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = Bdd::connexion();
    }

    public function inscription($nom, $email, $mdp)
    {
        $user = $this->bdd->prepare("INSERT INTO users (nom,email, mdp) VALUES (?, ?, ?)");
        return $user->execute([$nom, $email, $mdp]);
    }

    public function getUserByemail($email)
    {
        $user = $this->bdd->prepare("SELECT * FROM users WHERE email = ?");
        $user->execute([$email]);
        return $user->fetch(PDO::FETCH_ASSOC);
    }
}