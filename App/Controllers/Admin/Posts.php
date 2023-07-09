<?php

namespace App\Controllers\Admin;

use App\Models\Category;
use Core\View;
use App\Models\Post;
/**
 * User admin controller
 *
 * PHP version 5.4
 */
class Posts extends \App\Controllers\Authenticated
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $posts = Post::getAll();
        if(isset($_GET['source'])) {
            if($_GET['source'] == 'delete') {
                Post::deletePost($_GET['id']);
            }
        }
        View::render('admin/post.php', [
            'posts' => $posts
        ]);
    }

    public function optionAction()
    {
        foreach ($_POST['checkBoxesArray'] as $postValueID) {
            $bulk_option = $_POST['bulk_option'];
            switch ($bulk_option) {
                case 'published':
                    Post::updatePostStatus($postValueID, 'published');
                    header("Location: /admin/posts", true, 303);
                    break;
                case 'draft':
                    Post::updatePostStatus($postValueID, 'draft');
                    header("Location: /admin/posts", true, 303);

                    break;
                case 'delete':
                    Post::deletePost($postValueID);
                    header("Location: /admin/posts", true, 303);

                    break;
                case 'clone':
                    header("Location: /admin/posts", true, 303);

                    break;
            }
        }
    }

    public function addPostAction()
    {
        $post = new Post($_POST);
        if(isset($_POST['create-post'])) {
            $post->insertPosts();
        }

        $categories = Category::getAllCategory();
        View::render('admin/addpost.php', [
            'categories' => $categories
        ]);
    }

    public function editAction()
    {
        $posts = new Post($_POST);
        $params = $this->route_params;
        $post = $posts->getPostId($params['id']);
        $categories = Category::getAllCategory();
        if(isset($_POST['update_post'])) {
            $posts->updatePost($params['id']);
        }
        View::render('admin/editpost.php', [
            'post' => $post,
            'categories' => $categories
        ]);
    }
}
