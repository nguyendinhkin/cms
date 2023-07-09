<?php

namespace App\Models;

use PDO;

/**
 * Post model
 *
 * PHP version 5.4
 */
class SearchPage extends \Core\Model
{

    /**
     * Get all the posts as an associative array
     *
     * @return array
     */

    public function searchPosts($title)
    {
        try {
            $db = static::getDB();
            $sql = "SELECT * FROM posts WHERE post_title LIKE :title AND post_status = 'published' ORDER BY post_id DESC";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':title', "%$title%", PDO::PARAM_STR);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
