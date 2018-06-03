<?php
/**
 * Created by PhpStorm.
 * UserController: utilisateur
 * Date: 13/05/2018
 * Time: 10:24
 */

namespace App\Controller;

use App\Manager\AdminManager;

class ConnexionController extends AbstractController
{
    protected $manager;

    public function __construct()
    {
        session_start();
        parent::__construct();
        $this->manager = new AdminManager();
    }

    public function connexion()
    {
        $this->render('connexion.html.twig');
    }

    public function login($name, $password)
    {
        $error = 'mot de passe ou identifiant incorrect';

        if (isset($name) && isset($password) && !empty($name) && !empty($password)) {

            $user = $this->manager->findUser($name, $password);
            if ($user) {
                $_SESSION['user'] = $user->getId();

                $this->redirect('?dashboard');

            }
            $this->render('connexion.html.twig', array('error' => $error));
            return false;
        }
    }

    public function disconnect()
    {
        unset($_SESSION['user']);
        $this->render('connexion.html.twig');
    }


}