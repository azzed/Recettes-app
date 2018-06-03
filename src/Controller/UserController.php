<?php


namespace App\Controller;


use App\Entity\User;
use App\Manager\AdminManager;
use App\Manager\RecetteManager;

class UserController extends AbstractController
{
    const TITLE = 'Recettes de cuisine';
    protected $recetteManager;
    protected $adminManager;

    public function __construct()
    {
        parent::__construct();
        $this->recetteManager = new RecetteManager();
        $this->adminManager = new AdminManager();
    }

    public function dashboard()
    {
        session_start();

        if (!$_SESSION['user']) {

            // $_SESSION['notConnected'] = 'Inscrivez-vous';
            return $this->redirect("?connexion");
        }
        /**@var User* */

        $user = $this->adminManager->findUserById($_SESSION['user']);
        
        $recettes = $this->recetteManager->findAllByUser($_SESSION['user']);
        $this->render('dashboard.html.twig', [
                'user' => $user,
                'title' => self::TITLE,
                'recettes' => $recettes,
            ]
        );
    }
}
