<?php


namespace App\Controller;

use App\Entity\User;
use App\Manager\RecetteManager;
use App\Manager\AdminManager;
use App\Security\Voters;

class UserController extends AbstractController
{
    const TITLE = 'Recettes de cuisine';
    protected $recetteManager;
    protected $adminManager;
    protected $voters;

    public function __construct()
    {
        session_start();
        parent::__construct();
        $this->recetteManager = new RecetteManager();
        $this->adminManager = new AdminManager();
        $this->voters = new Voters();
    }

    public function dashboard()
    {
        if (!$_SESSION['user']) {

            // $_SESSION['notConnected'] = 'Inscrivez-vous';
            return $this->redirect("?connexion");
        }
        /**@var User**/
        $user = $this->adminManager->findUserById($_SESSION['user']);
        $recettes = ('admin' === $user->getRole())? $this->recetteManager->findAll() : $this->recetteManager->findAllByUser($_SESSION['user']);
        $users = ('admin' === $user->getRole())? $this->adminManager->findAll(): $this->adminManager->findUserById($_SESSION['user']);

        $this->render(
            'dashboard.html.twig',
            [
                'user' => $user,
                'title' => self::TITLE,
                'users' =>$users,
                'recettes' => $recettes,
            ]
        );
    }
    //modification du profil
    public function updateProfil($id)
    {
        if (isset($_SESSION['user'])) {
            $user = $this->adminManager->findUserById($_SESSION['user']);
            if ($this->voters->canEditProfil($user, $id)) {
                $this->render('update-profil.html.twig', array('user' =>$user));
            }
        }
    }
    public function profilUpdated($nom, $mail, $id)
    {
        if (isset($nom) && !empty($nom) && isset($mail) && !empty($mail)) {
            $user = $this->adminManager->updateProfil($nom, $mail, $id);
            $this->redirect('?dashboard');
        } else {
            if (isset($_SESSION['user'])) {
                $user = $this->adminManager->findUserById($_SESSION['user']);
                if ($this->voters->canEditProfil($user, $id)) {
                    $message = "il faut entré tout les champs";
                    $this->render('update-profil.html.twig', array('user' =>$user,'message'=>$message));
                }
            }
        }
    }
    public function removeProfil($ids)
    {
        if (isset($_SESSION['user'])) {
            $user = $this->adminManager->findUserById($_SESSION['user']);
            if ($this->voters->canEditProfil($user, $ids)) {
                $this->recetteManager->deleteRecipe($ids);
                $this->adminManager->deleteProfil($ids);
                $this->redirect('?dashboard');
            }
        }
    }
}
