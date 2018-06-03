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

    //Inscription
    public function newUser($pseudo, $mail, $password,$role = "user")
    {
        $pass = sha1($password);
        $req = $this->connexion->connect()->prepare('INSERT INTO users(pseudo,mail,password, role) VALUES(:pseudo,:mail, :pass , :role)');
        $req->bindValue(':pseudo', $pseudo);
        $req->bindValue(':mail', $mail);
        $req->bindValue(':pass', $pass);
        $req->bindValue(':role', $role);
        $req->execute();
        return true;
    }

    //Connexion
    public function findUser($pseudo, $password)
    {
        $encrypte = sha1($password);

        $req = $this->connexion->connect()->prepare('SELECT * FROM users  WHERE pseudo = :pseudo AND password = :password');
        $req->execute(array(':pseudo' => $pseudo,':password' => $encrypte));
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
}