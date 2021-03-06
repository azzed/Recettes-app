<?php
/**
 * Created by PhpStorm.
 * UserController: Azzedine
 * Date: 29/04/2018
 * Time: 11:09
 */

namespace App\Controller;

use App\Manager\AdminManager;
use App\Manager\RecetteManager;
use App\Security\Voters;

class RecetteController extends AbstractController
{
    protected $manager;
    protected $voters;
    protected $adminManager;

    public function __construct()
    {
        session_start();
        parent::__construct();
        $this->manager = new RecetteManager();
        $this->voters = new Voters();
        $this->adminManager = new AdminManager();
    }


    public function show($id)
    {
        $recette = $this->manager->findOne($id);
        $this->render('show_recette.html.twig', array('recette' => $recette));
    }
    //ajout de recette
    public function recipAdd($nom, $ingredients, $liens, $description, $user_id)
    {
        if (isset($nom) && !empty($nom) && isset($ingredients) && !empty($ingredients) && isset($liens) && !empty($liens) && isset($description) && !empty($description)) {
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $liens)){
                $this->manager->addRecipe($nom, $ingredients, $liens, $description, $user_id);
                $this->redirect('?dashboard');
            }
            else{
                $message ="l'url invalide";
                $this->render('dashboard.html.twig',["message"=>$message]);
            }
        } else {
            $message ="un champ non entré";
            $this->render('recette-notAdd.html.twig', array("message" => $message));
        }
    }
    //suppression de recette
    public function removeRecipe($ids)
    {
        if (isset($_SESSION['user'])) {
            $recette = $this->manager->findOne($ids);
            $user = $this->adminManager->findUserById($_SESSION['user']);
            if ($this->voters->isOwner($user, $recette)) {
                $this->manager->deleteRecipe($ids);
                $this->redirect('?dashboard');
            }
        }
    }
    //modification de recette
    public function updateRecipe($id)
    {
        if (isset($_SESSION['user'])) {
            $recette = $this->manager->findOne($id);
            $user = $this->adminManager->findUserById($_SESSION['user']);

            if ($this->voters->isOwner($user, $recette)) {
                $recette =$this->manager->findOne($id);
                $this->render('update_recipe.html.twig', array('recette' =>$recette));
            }
        }
    }

    public function recipeUpdated($nom, $ingredients, $liens, $description, $id)
    {
        if (isset($nom) && !empty($nom) && isset($ingredients) && !empty($ingredients) && isset($liens) && !empty($liens) && isset($description) && !empty($description)) {
            $recette = $this->manager->updateRecipe($nom, $ingredients, $liens, $description, $id);
            $this->redirect('?dashboard');
        } else {
            if (isset($_SESSION['user'])) {
                $recette = $this->manager->findOne($id);
                $user = $this->adminManager->findUserById($_SESSION['user']);
                if ($this->voters->isOwner($user, $recette)) {
                    $recette =$this->manager->findOne($id);
                    $message="Vous avez oublié d'entré un champ";
                    $this->render('update_recipe.html.twig', array('recette' =>$recette,'message'=>$message));
                }
            }
        }
    }
}
