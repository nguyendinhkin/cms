<?php

namespace App\Models;

use PDO;

/**
 * Post model
 *
 * PHP version 5.4
 */
class Post extends \Core\Model
{

    /**
     * Get all the posts as an associative array
     *
     * @return array
     */
    public function __construct($data) {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    public static function getAll()
    {
        try {
            $db = static::getDB();
            $stmt = $db->query('SELECT * FROM posts INNER JOIN categories ON posts.post_category_id = categories.cat_id ORDER BY post_id DESC');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getAllLimit($num, $limit)
    {
        try {
            $db = static::getDB();
            $sql = 'SELECT * FROM posts WHERE post_status = "published" ORDER BY post_id DESC LIMIT :num, :limit';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':num', $num, PDO::PARAM_INT);
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function countAllPost()
    {
        try {
            $db = static::getDB();
            $stmt = $db->query('SELECT * FROM posts ORDER BY post_id DESC');
            $results = $stmt->fetchColumn();
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getPostId($id)
    {
        try {
            $db = static::getDB();
            $sql = 'SELECT * FROM posts WHERE post_id = :id ORDER BY post_id DESC';
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function insertPosts() {
        try {
            $db = static::getDB();
            $post_image = $_FILES['image']['name'];
            $post_image_tmp = $_FILES['image']['tmp_name'];
            move_uploaded_file($post_image_tmp, "../public/image/$post_image");
            $sql = 'INSERT INTO posts(post_category_id, post_title,post_author, post_date,post_image,post_content,post_tags,post_status) ';
            $sql .= 'VALUE(:catid, :title, :author, now(), :image, :content, :tags, :status)';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':catid', $this->post_category, PDO::PARAM_INT);
            $stmt->bindValue(':title', $this->title, PDO::PARAM_STR);
            $stmt->bindValue(':author', $this->author, PDO::PARAM_STR);
            $stmt->bindValue(':image', "$post_image", PDO::PARAM_STR);
            $stmt->bindValue(':content', $this->post_content, PDO::PARAM_STR);
            $stmt->bindValue(':tags', $this->post_tags, PDO::PARAM_STR);
            $stmt->bindValue(':status', $this->post_status, PDO::PARAM_STR);
            $stmt->execute();
            header("Location: /admin/add-post", true, 303);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function deletePost($id)
    {
        try {
            $db = static::getDB();
            $sql = 'DELETE FROM posts WHERE post_id = :id';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            header("Location: /admin/posts", true, 303);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updatePost($id)
    {
        try {
            $db = static::getDB();
            $post_image = $_FILES['image']['name'];
            $post_image_tmp = $_FILES['image']['tmp_name'];
            move_uploaded_file($post_image_tmp, "../public/image/$post_image");
            if(empty($post_image)) {
                $stmt = $db->prepare('SELECT * FROM posts WHERE post_id = :id');
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $post_image = $result[0]['post_image'];
            }
            $sql = 'UPDATE posts SET ';
            $sql .= 'post_title = :title, ';
            $sql .= 'post_category_id = :catid, ';
            $sql .= 'post_date = now(), ';
            $sql .= 'post_author = :author, ';
            $sql .= 'post_status = :status, ';
            $sql .= 'post_tags = :tags, ';
            $sql .= 'post_image = :image, ';
            $sql .= 'post_content = :content ';
            $sql .= 'WHERE post_id = :id';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->bindValue(':title', $this->title, PDO::PARAM_STR);
            $stmt->bindValue(':catid', $this->post_category, PDO::PARAM_INT);
            $stmt->bindValue(':author', $this->author, PDO::PARAM_STR);
            $stmt->bindValue(':status', $this->post_status, PDO::PARAM_STR);
            $stmt->bindValue(':tags', $this->post_tags, PDO::PARAM_STR);
            $stmt->bindValue(':image', $post_image, PDO::PARAM_STR);
            $stmt->bindValue(':content', $this->post_content, PDO::PARAM_STR);
            $stmt->execute();
            header("Location: /admin/posts/edit/$id", true, 303);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function updatePostStatus($id, $status)
    {
        try {
            $db = static::getDB();
            $sql = 'UPDATE posts SET ';
            $sql .= 'post_status = :status ';
            $sql .= 'WHERE post_id = :id';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->bindValue(':status', $status, PDO::PARAM_STR);
            $stmt->execute();
            header("Location: /admin/posts", true, 303);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
