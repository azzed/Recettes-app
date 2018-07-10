<?php
/**
 * Created by PhpStorm.
 * UserController: Azzedine
 * Date: 23/04/2018
 * Time: 15:32
 */

namespace App\Controller;

abstract class AbstractController
{
    protected $twig;

    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $loader = new \Twig_Loader_Filesystem(APP_ROOT . '/templates');
        $this->twig = new \Twig_Environment($loader, ['debug' => true]);
        $this->twig->addExtension(new \Twig_Extension_Debug());
        $session = count($_SESSION)> 0 ? $_SESSION : [];
        $this->twig->addGlobal('session', $session);
    }

    public function render($view, $params = array())
    {
        $params['public_dir'] = PUBLIC_DIR;
        echo $this->twig->render($view, $params);
    }

    public function redirect($url)
    {
        header("location: $url");
        exit;
    }
}
