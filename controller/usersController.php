<?php
include_once 'model/usersModel.php';

class UsersController
{
    private $model;

    public function __construct()
    {
        $this->model = new UsersModel;
    }

    public function getFormInscription()
    {
        include 'view/inscription.php';
    }

    public function inscription()
    {
        if (isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['mdp'])) {
            $nom = $_POST['nom'];
            $email = $_POST['email'];
            $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
            
            if ($this->model->inscription($nom, $email, $mdp)) {
                echo "Inscription OK";
            } else {
                echo "Erreur d'inscription";
                $this->getFormInscription();
            }
        } else {
            $this->getFormInscription();
        }
    }

    public function getFormConnexion()
    {
        include 'view/connexion.php';
    }

    public function connexion()
    {
        if (isset($_POST['email']) && isset($_POST['mdp'])) {
            $email = $_POST['email'];
            $user = $this->model->getUserByemail($email);

            if ($user && isset($user['mdp'])) {
                if (password_verify($_POST['mdp'], $user['mdp'])) {
                    $_SESSION["id_user"] = $user["id_user"];
                    $_SESSION["email"] = $user["email"];
                    header("Location: index.php?page=tasks");
                    exit;
                } else {
                    echo "Mot de passe incorrect.";
                    $this->getFormConnexion();
                }
            } else {
                echo "Utilisateur non trouvé.";
                $this->getFormConnexion();
            }
        } else {
            $this->getFormConnexion();
        }
    }
}
