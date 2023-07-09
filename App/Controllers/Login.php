<?php

namespace App\Controllers;
use App\Models\User;
use App\Auth;
use \Core\View;
/**
 * Posts controller
 *
 * PHP version 5.4
 */
class Login extends \Core\Controller
{

    protected function before()
    {
        if(isset($_SESSION['user_id'])) {
            header("Location: /", true, 303);
        }
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        View::render('login.php');
    }

    public function createAction()
    {
        if(!empty($_POST)) {
            $user = User::authenticate($_POST['email'], $_POST['password']);
        } else {
            $user = false;
        }

        if ($user) {
            Auth::login($user);
            header("Location: /", true, 303);

        } else {
            View::render('login.php');
        }
    }

    public function destroyAction()
    {
        Auth::logout();

        header("Location: /", true, 303);

    }
}
