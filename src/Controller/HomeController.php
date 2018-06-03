<?php
/**
 * Created by PhpStorm.
 * UserController: Azzedine
 * Date: 29/04/2018
 * Time: 10:59
 */

namespace App\Controller;

use App\Manager\RecetteManager;

class HomeController extends AbstractController
{
    const TITLE = 'Recettes de cuisine';
    protected $manager;
    public function __construct()
    {
        parent::__construct();
        $this->manager = new RecetteManager();
    }

    public function home()
    {

        $recettes = $this->manager->findAll();

        $this->render('home-page.html.twig', array('recettes' => $recettes, 'title'=> self::TITLE));

    }

}