<?php
/**
 * Created by PhpStorm.
 * User: azzedine
 * Date: 12/06/18
 * Time: 20:34
 */

namespace App\Controller;

use App\Manager\RecetteManager;

class ApiController
{
    protected $manager;

    public function __construct()
    {
        $this->manager = new RecetteManager();
    }

    public function all()
    {
        $recette = $this->manager->findAllAPI();
        header('Content-Type: application/json');
        echo json_encode($recette);
        exit;
    }
    public function detail($id)
    {
        $recette = $this->manager->findOneAPI($id);
        header('Content-Type: application/json');
        echo json_encode($recette);
        exit;
    }
}
