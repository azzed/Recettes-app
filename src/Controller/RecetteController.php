<?php
/**
 * Created by PhpStorm.
 * UserController: Azzedine
 * Date: 29/04/2018
 * Time: 11:09
 */

namespace App\Controller;

use App\Manager\RecetteManager;

class RecetteController extends AbstractController
{
    protected $manager;

    public function __construct()
    {
        session_start();
        parent::__construct();
        $this->manager = new RecetteManager();
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
            $this->manager->addRecipe($nom, $ingredients, $liens, $description, $user_id);
            $this->redirect('?dashboard');
        }
    }
    //suppression de recette
    public function removeRecipe($ids)
    {
            $recette = $this->manager->deleteRecipe($ids);
            $this->redirect('?dashboard');
    }
    //modification d'article
    public function updateRecipe($id)
    {
        $recette =$this->manager->findOne($id);
        $this->render('update_recipe.html.twig', array('recette' =>$recette));
    }

    public function recipeUpdated($nom, $ingredients, $liens, $description,$id)
    {
        if (isset($nom) && !empty($nom) && isset($ingredients) && !empty($ingredients) && isset($liens) && !empty($liens) && isset($description) && !empty($description)) {
            $recette = $this->manager->updateRecipe($nom, $ingredients, $liens, $description,$id);
            $this->redirect('?dashboard');

        }
    }
}
