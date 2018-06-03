<?php
/**
 * Created by PhpStorm.
 * User: utilisateur
 * Date: 20/05/2018
 * Time: 10:53
 */

namespace App\Controller;


class AdminController
{
    public function dashboard()
    {
        session_start();

        if (!$_SESSION['user']) {
            $user = $this->adminManager->findUserById($_SESSION['user']);
            if("admin" !=$user->getRole()){
                return $this->redirect("?connexion");
            }

        }
        /**@var User* */


        $recettes = $this->recetteManager->findAll($_SESSION['user']);
        $this->render('dashboard.html.twig', [
                'user' => $user,
                'title' => self::TITLE,
                'recettes' => $recettes,

            ]
        );
    }
}