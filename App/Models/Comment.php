<?php

namespace App\Models;

use PDO;

/**
 * Post model
 *
 * PHP version 5.4
 */
class Comment extends \Core\Model
{
    public function __construct($data) {
        foreach ($data as $key => $value){
            $this->$key = $value;
        }
    }

    public static function getAllComment()
    {
        try {
            $db = static::getDB();
            $stmt = $db->query('SELECT * FROM comments ORDER BY comment_id DESC');
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getCommentPost($id, $status)
    {
        try {
            $db = static::getDB();
            $stmt = $db->prepare('SELECT * FROM comments WHERE comment_post_id = :id AND comment_status = :status ORDER BY comment_id DESC');
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->bindValue(':status', "$status", PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function countAllComment()
    {
        try {
            $db = static::getDB();
            $stmt = $db->query('SELECT * FROM comments ORDER BY comment_id DESC');
            $results = $stmt->fetchColumn();
            return $results;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function insertComment($id)
    {
        try {
            $db = static::getDB();
            $sql = 'INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) ';
            $sql .= 'VALUE(:id, :author, :email, :content, :status, now())';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->bindValue(':author', $this->comment_author, PDO::PARAM_STR);
            $stmt->bindValue(':email', $this->comment_email, PDO::PARAM_STR);
            $stmt->bindValue(':content', $this->comment_content, PDO::PARAM_STR);
            $stmt->bindValue(':status', 'unapproved', PDO::PARAM_STR);
            $stmt->execute();
            header("Location: /posts/new/$id", true, 303);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function deleteComment($id)
    {
        try {
            $db = static::getDB();
            $sql = 'DELETE FROM comments WHERE comment_id = :id';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            header("Location: /admin/comment", true, 303);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function statusComment($id, $status)
    {
        try {
            $db = static::getDB();
            $sql = 'UPDATE comments SET comment_status = :status WHERE comment_id = :id';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->bindValue(':status', "$status", PDO::PARAM_STR);
            $stmt->execute();
            header("Location: /admin/comment", true, 303);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
