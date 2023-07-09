<?php

namespace App\Controllers;
use App\Models\Category;
use App\Models\Post;
use \Core\View;
/**
 * Home controller
 *
 * PHP version 5.4
 */
class Home extends \Core\Controller
{

    /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {
        //echo "(before) ";
        //return false;
    }

    /**
     * After filter
     *
     * @return void
     */
    protected function after()
    {
        //echo " (after)";
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $per_page = 5;
        if(isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = "";
        }
        if($page == "" || $page == 1) {
            $page1 = 0;
        } else {
            $page1 = ($page * $per_page) - $per_page;
        }
        $countPost = Post::countAllPost();
        $count = ceil($countPost / $per_page);
        $post = Post::getAllLimit($page1, $per_page);
        View::render('index.php', [
            'post' => $post,
            'count' => $count
        ]);
    }
}
