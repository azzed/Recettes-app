<?php
/**
 * Created by PhpStorm.
 * UserController: Azzedine
 * Date: 01/05/2018
 * Time: 11:26
 */
namespace App\Manager;


use App\Entity\Recettes;


class RecetteManager
{
    public function __construct()
    {
        $this->connexion = new Connexion();
    }

    public function findAll()
    {
        $recettes = [];
        $req = $this->connexion->connect()->prepare('SELECT * FROM recipe ');
        $req->execute();
        $datas = $req->fetchAll();
        foreach ($datas as $data) {
            $recettes[] = new Recettes($data);
        }
        return $recettes;
    }

    public function findOne($id)
    {

        $req = $this->connexion->connect()->prepare('SELECT * FROM recipe WHERE id = '.$id);
        $req->execute();
        $datas = $req->fetch();
        $recette = new Recettes($datas);
        return $recette;
    }
    public function addRecipe($nom, $ingredients,$liens,$description, $user_id)
    {
        $req = $this->connexion->connect()->prepare('INSERT INTO recipe( nom,ingredients, liens, description, userId) VALUES( :nom,:ingredients, :liens, :description,  :user_id) ');
        $req->bindValue(':nom', $nom);
        $req->bindValue(':ingredients', $ingredients);
        $req->bindValue(':liens', $liens);
        $req->bindValue(':description', $description);
        $req->bindValue(':user_id', $user_id);
        $req->execute();

        return true;
    }

    public function findAllByUser($user_id)
    {
        $recettes = [];
        $req = $this->connexion->connect()->prepare('SELECT * FROM recipe WHERE userId = '.$user_id);
        $req->execute();
        $datas = $req->fetchAll();
        foreach ($datas as $data) {
            $recettes[] = new Recettes($data);
        }
        return $recettes;
    }
    public function deleteRecipe($ids)
    {
        $sql = "DELETE FROM recipe WHERE id =".$ids;
        $req = $this->connexion->connect()->prepare($sql);
        $req->execute();
    }
    public function updateRecipe($nom, $ingredients,$liens,$description,$id)
    {
        $req = $this->connexion->connect()->prepare('UPDATE recipe SET nom =:nom, ingredients=:ingredients,liens=:liens,description=:description  WHERE id =:id ');
        $req->bindValue(':nom', $nom);
        $req->bindValue(':ingredients', $ingredients);
        $req->bindValue(':liens', $liens);
        $req->bindValue(':description', $description);
        $req->bindValue(':id', $id);
        $req->execute();
        $recette = new Recettes(['nom' => $nom, 'ingredients' => $ingredients,'liens'=>$liens,'description'=>$description,'id'=>$id]);
        return $recette;
    }
}