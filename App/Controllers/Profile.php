<?php

namespace App\Controllers;
use App\Auth;
use App\Models\User;
use \Core\View;
/**
 * Home controller
 *
 * PHP version 5.4
 */
class Profile extends \Core\Controller
{

    /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {
        if(empty($_SESSION['user_id'])) {
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

        View::render('profile.php', [
            'user' => User::getUserId($_SESSION['user_id'])
        ]);
    }

    public function editAction()
    {
        $user = new User($_POST);
        $user->updateUser($_SESSION['user_id'], $_SESSION['role']);
        header("Location: /profile", true, 303);
    }
}
