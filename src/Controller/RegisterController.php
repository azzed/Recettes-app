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

    public function subscriber($name = null,$mail = null, $password = null)
    {

        $this->register();
        if (isset($name) && isset($password) && !empty($name) && !empty($password) && !empty($mail) && !empty($mail)) {
            $register = $this->manager->newUser($name, $mail, $password);
            if($register) {
                $user = $this->manager->findUser($name, $password);

                $_SESSION['user'] = $user->getId();
            }

        }

    }

    public function register()
    {
        $this->render('inscription.html.twig');
    }

}