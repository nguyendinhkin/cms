<?php

namespace App\Controllers\Admin;

use Core\View;
use App\Models\Comment;
/**
 * User admin controller
 *
 * PHP version 5.4
 */
class Comments extends \App\Controllers\Authenticated
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        if(isset($_GET['delete'])) {
            Comment::deleteComment($_GET['delete']);
        }

        if(isset($_GET['unapprove'])) {
            Comment::statusComment($_GET['unapprove'], 'unapproved');
        }

        if (isset($_GET['approve'])) {
            Comment::statusComment($_GET['approve'], 'approved');
        }

        $comments = Comment::getAllComment();
        View::render('admin/comment.php', [
            'comments' => $comments
        ]);
    }

}
