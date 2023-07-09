<?php

namespace App\Models;

use PDO;

/**
 * Post model
 *
 * PHP version 5.4
 */
class Category extends \Core\Model
{

    public function __construct($data)
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    public static function getAllCategory()
    {
        try {
            $db = static::getDB();
            $stmt = $db->query('SELECT * FROM categories ORDER BY cat_id DESC');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getPostCategory($id)
    {
        try {
            $db = static::getDB();
            $sql = 'SELECT * FROM posts INNER JOIN categories ON cat_id = post_category_id WHERE post_category_id = :id';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getCatId($id)
    {
        try {
            $db = static::getDB();
            $sql = 'SELECT * FROM categories WHERE cat_id = :id';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function deleteCategory($id)
    {
        try {
            $db = static::getDB();
            $sql = 'DELETE FROM categories WHERE cat_id = :id';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            header("Location: /admin/category", true, 303);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updateCategory($id)
    {
        try {
            $db = static::getDB();
            $sql = 'UPDATE categories SET cat_title = :title WHERE cat_id = :id';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':title', $this->cat_title, PDO::PARAM_STR);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            header("Location: /admin/category", true, 303);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function insertCategory()
    {
        try {
            $db = static::getDB();
            $sql = 'INSERT INTO categories(cat_title) VALUES (:title)';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':title', $this->cat_title, PDO::PARAM_STR);
            $stmt->execute();
            header("Location: /admin/category", true, 303);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function countAllCategory()
    {
        try {
            $db = static::getDB();
            $stmt = $db->query('SELECT * FROM categories ORDER BY cat_id DESC');
            $results = $stmt->fetchColumn();
            return $results;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
