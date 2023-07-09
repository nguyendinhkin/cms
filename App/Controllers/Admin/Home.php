<?php

namespace App\Controllers\Admin;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Core\View;

/**
 * User admin controller
 *
 * PHP version 5.4
 */
class Home extends \App\Controllers\Authenticated
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        View::render('admin/index.php', [
            'post' => Post::countAllPost(),
            'comment' => Comment::countAllComment(),
            'cat' => Category::countAllCategory(),
            'user' => User::countAllUser()
        ]);
    }
}
