<?php
/**
 * Created by PhpStorm.
 * UserController: utilisateur
 * Date: 13/05/2018
 * Time: 10:04
 */

namespace App\Controller;

use App\Manager\AdminManager;

class RegisterController extends AbstractController
{
    protected $manager;

    public function __construct()
    {
        parent::__construct();
        $this->manager = new AdminManager();
    }

    public function subscriber($name, $mail, $password)
    {
        if (isset($name) && isset($password) && !empty($name) && !empty($password) && !empty($mail) && !empty($mail)) {
            if (!$this->manager->userAlreadyExist($mail)) {
                $userCreated = $this->manager->newUser($name, $mail, $password);
                if($userCreated){
                    $_SESSION['success_register'] = "user enregister";
                    $_SESSION['user'] = $this->manager->findUserByMail($mail)->getId();
                    return $this->redirect('?dashboard');
                }
            }
        }
        $this->register();
    }
    public function register()
    {
        $this->render('inscription.html.twig');
    }
}
