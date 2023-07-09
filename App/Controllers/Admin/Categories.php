<?php

namespace App\Controllers\Admin;
use Core\View;
use App\Models\Category;
/**
 * User admin controller
 *
 * PHP version 5.4
 */
class Categories extends \App\Controllers\Authenticated
{


    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $cat = new Category($_POST);
        $categories = Category::getAllCategory();
        if(isset($_GET['edit'])) {
            $category = Category::getCatId($_GET['edit']);
            $cat_id = $category[0]['cat_id'];
        } else {
            $category = "";
        }
        if(isset($_POST['submit'])) {
            $cat->insertCategory();
        }

        if(isset($_GET['delete'])) {
            Category::deleteCategory($_GET['delete']);
        }

        if(isset($_POST['update_category'])) {
            $cat->updateCategory($cat_id);
        }
        View::render('admin/category.php', [
            'categories' => $categories,
            'category' => $category
        ]);
    }
}
