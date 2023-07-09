<?php

namespace App\Controllers;

use App\Models\User;
use \Core\View;
/**
 * Posts controller
 *
 * PHP version 5.4
 */
class Signup extends \Core\Controller
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
    public function newAction()
    {
        View::render('signup.php');
    }

    public function successAction()
    {
        $user = new User($_POST);
        if($user->addUserForSignup()) {
            header('Location: /', true, 303);
        } else {
            View::render('signup.php', [
                'user' => $user->errors
            ]);

        }
    }
}
