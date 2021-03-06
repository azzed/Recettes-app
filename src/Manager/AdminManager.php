<?php
/**
 * Created by PhpStorm.
 * UserController: utilisateur
 * Date: 13/05/2018
 * Time: 11:23
 */

namespace App\Manager;

use App\Entity\User;
use App\Entity\Users;

class AdminManager
{
    public function __construct()
    {
        $this->connexion = new Connexion();
    }
    public function findAll()
    {
        $users = [];
        $req = $this->connexion->connect()->prepare('SELECT * FROM users ');
        $req->execute();
        $datas = $req->fetchAll();
        foreach ($datas as $data) {
            $users[] = new User($data);
        }
        return $users;
    }

    public function userAlreadyExist($mail)
    {
        $req = $this->connexion->connect()->prepare("SELECT COUNT(mail)  FROM users WHERE mail = :mail");
        $req->bindValue(':mail', $mail);
        $req->execute();
        $result = $req->fetchColumn();
        return $result > 0 ? true : false;
    }
    //Inscription
    public function newUser($pseudo, $mail, $password, $role = "user")
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $req = $this->connexion->connect()->prepare('INSERT INTO users(pseudo,mail,password, role) VALUES(:pseudo,:mail, :pass , :role)');
        $req->bindValue(':pseudo', $pseudo);
        $req->bindValue(':mail', $mail);
        $req->bindValue(':pass', $hash);
        $req->bindValue(':role', $role);
        return $req->execute();
    }
    public function checkUser($pseudo, $password)
    {
        $req = $passwordFromDatabase = $this->connexion->connect()->prepare('SELECT password FROM `users` WHERE pseudo = :pseudo ');
        $req->bindValue(':pseudo', $pseudo);
        if ($req->execute()) {
            $passwordFromDatabase = $req->fetchColumn();
            return password_verify($password, $passwordFromDatabase);
        }
    }
    //Connexion
    public function findUser($pseudo)
    {
        $req = $this->connexion->connect()->prepare('SELECT * FROM users  WHERE pseudo = :pseudo ');
        $req->execute(array(':pseudo' => $pseudo));
        $donnees = $req->fetch();
        if (\is_array($donnees)) {
            return new User($donnees);
        }
        return $donnees;
    }


    public function findUserById($id)
    {
        $req = $this->connexion->connect()->prepare('SELECT * FROM users  WHERE id = :id');
        $req->execute(array(':id' => $id));
        $donnees = $req->fetch();
        if (\is_array($donnees)) {
            return new User($donnees);
        }
        return $donnees;
    }
    public function findUserByMail($mail)
    {
        $req = $this->connexion->connect()->prepare('SELECT * FROM users  WHERE mail = :mail');
        $req->execute(array(':mail' => $mail));
        $donnees = $req->fetch();
        if (\is_array($donnees)) {
            return new User($donnees);
        }
        return $donnees;
    }
    public function updateProfil($nom, $mail, $id)
    {
        $req = $this->connexion->connect()->prepare('UPDATE users SET pseudo =:nom, mail=:mail WHERE id =:id ');
        $req->bindValue(':nom', $nom);
        $req->bindValue(':mail', $mail);
        $req->bindValue(':id', $id);
        $req->execute();
        $user = new User(['nom' => $nom, 'mail' => $mail,'id'=>$id]);
        return $user;
    }
    public function deleteProfil($ids)
    {
        $sql = "DELETE FROM users WHERE id =".$ids;
        $req = $this->connexion->connect()->prepare($sql);
        $req->execute();
    }
}
