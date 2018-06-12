<?php
/**
 * Created by PhpStorm.
 * User: azzedine
 * Date: 12/06/18
 * Time: 20:34
 */

namespace App\Controller;

use App\Manager\RecetteManager;

class ApiController extends AbstractController
{
    protected $manager;
    public function __construct()
    {
        parent::__construct();
        $this->manager = new RecetteManager();
    }

    public function showRecipe($id)
    {
        $recette = $this->manager->findOne($id);
        json_encode($recette);
    }
}