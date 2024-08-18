<?php

require_once __DIR__.'/../config.php';
include __DIR__.'/../back/doctor.php';

class CrudUser
{
    public function listUsers()
    {
        $sql = 'SELECT * FROM user';
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function createUser()
    {
        $db = config::getConnexion();
        try {
            $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
            $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $mdp = isset($_POST['mdp']) ? $_POST['mdp'] : '';
            $role = isset($_POST['role']) ? $_POST['role'] : '';

            $requete = $db->prepare("INSERT INTO user (nom, prenom, email, mdp, role) VALUES (:nom, :prenom, :email, :mdp, :role)");

            $requete->bindParam(':nom', $nom);
            $requete->bindParam(':prenom', $prenom);
            $requete->bindParam(':email', $email);
            $requete->bindParam(':mdp', $mdp);
            $requete->bindParam(':role', $role);

            $requete->execute();

            echo '<div class="alert alert-success" role="alert">';
            echo '<i class="bi bi-check-circle-fill"></i> User added successfully! ';
            echo '<a href="UserBack.php" class="btn btn-primary">Back</a>';
            echo '</div>';

        } catch (PDOException $e) {
            echo 'Failed to create user: ' . $e->getMessage();
        }
    }

    public function deleteUser($id_user)
    {
        try {
            $db = config::getConnexion();

            $requete = $db->prepare("DELETE FROM user WHERE id_user = :id_user");
            $requete->bindParam(':id_user', $id_user);

            $requete->execute();

            echo 'User deleted successfully';
        } catch (PDOException $e) {
            echo 'Failed to delete user: ' . $e->getMessage();
        }
    }

    public function updateUser($id_user, $newData)
    {
        try {
            $db = config::getConnexion();
    
            $requete = $db->prepare("UPDATE user SET nom = :nom, prenom = :prenom, email = :email, mdp = :mdp, role = :role WHERE id_user = :id_user");
    
            // Bind the parameters
            $requete->bindParam(':id_user', $id_user, PDO::PARAM_INT);
            $requete->bindParam(':nom', $newData['nom']);
            $requete->bindParam(':prenom', $newData['prenom']);
            $requete->bindParam(':email', $newData['email']);
            $requete->bindParam(':mdp', $newData['mdp']);
            $requete->bindParam(':role', $newData['role']);
    
            // Execute the query
            $success = $requete->execute();
    
            if ($success) {
                echo 'User updated successfully';
            } else {
                echo 'Failed to update user. No rows affected.';
            }
        } catch (PDOException $e) {
            echo 'Failed to update user: ' . $e->getMessage();
        }
    }
    
    

    public function findUser($id_user)
    {
        try {
            $db = config::getConnexion();

            $requete = $db->prepare("SELECT * FROM user WHERE id_user = :id_user");
            $requete->bindParam(':id_user', $id_user);

            $requete->execute();

            $user = $requete->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                return $user;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo 'Erreur lors de la recherche de l\'utilisateur: ' . $e->getMessage();
            return null;
        }
    }

    public function showUser($id_user)
    {
        $sql = "SELECT * FROM user WHERE id_user = $id_user";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $user = $query->fetch();
            return $user;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
?>
