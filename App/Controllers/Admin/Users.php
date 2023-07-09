<?php

namespace App\Controllers\Admin;
use Core\View;
use App\Models\User;
/**
 * User admin controller
 *
 * PHP version 5.4
 */
class Users extends \App\Controllers\Authenticated
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $users = User::getAllUser();
        if(isset($_GET['delete'])) {
            User::deleteUser($_GET['delete']);
        }
        if(isset($_GET['role']) && $_GET['role'] == 'admin') {
            User::changeRole($_GET['id'], 'admin');
        } else if(isset($_GET['role']) && $_GET['role'] == 'subscriber') {
            User::changeRole($_GET['id'], 'subscriber');
        }
        View::render('admin/user.php', [
            'users' => $users
        ]);
    }

    public function addAction()
    {
        $user = new User($_POST);
        if(isset($_POST['create_user'])) {
            $user->addUser();
        }
        View::render('admin/adduser.php');
    }

    public function editAction()
    {
        $users = new User($_POST);
        $params = $this->route_params;
        $user = User::getUserId($params['id']);
        if(isset($_POST['update_user'])) {
            $users->updateUser($params['id']);
        }
        View::render('admin/edituser.php', [
            'user' => $user
        ]);
    }
}
