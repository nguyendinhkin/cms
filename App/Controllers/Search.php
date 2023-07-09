<?php

namespace App\Controllers;
use App\Models\Category;
use App\Models\SearchPage;
use \Core\View;
/**
 * Home controller
 *
 * PHP version 5.4
 */
class Search extends \Core\Controller
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
        $search = new SearchPage();
        $post = $search->searchPosts($_GET['q']);
        View::render('search.php', [
            'post' => $post
        ]);
    }
}
