<?php

namespace App\Controllers;
use App\Models\Category;
use \Core\View;
/**
 * Home controller
 *
 * PHP version 5.4
 */
class Categories extends \Core\Controller
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
        $params = $this->route_params;
        $posts = Category::getPostCategory($params['id']);
        View::render('category.php', [
            'posts' => $posts
        ]);
    }
}
