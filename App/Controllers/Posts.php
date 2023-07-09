<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Comment;
use \Core\View;
use App\Models\Post;
/**
 * Posts controller
 *
 * PHP version 5.4
 */
class Posts extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function newAction()
    {
        $posts = new Post($_POST);
        $comment = new Comment($_POST);
        $params = $this->route_params;
        $post = $posts->getPostId($params['id']);
        $post = $post[0];
        if(isset($_POST['create_comment'])) {
            $comment->insertComment($params['id']);
        }
        $comments = Comment::getCommentPost($params['id'], 'approved');
        View::render('post.php', [
            'post' => $post,
            'comments' => $comments
        ]);
    }
}
