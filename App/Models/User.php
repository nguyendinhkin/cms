<?php

namespace App\Models;

use PDO;

/**
 * Post model
 *
 * PHP version 5.4
 */
class User extends \Core\Model
{
    public $errors = [];

    public function __construct($data = []) {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    public static function getAllUser()
    {
        try {
            $db = static::getDB();
            $stmt = $db->query('SELECT * FROM users ORDER BY user_id DESC');
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public static function getUserId($id)
    {
        try {
            $db = static::getDB();
            $stmt = $db->prepare('SELECT * FROM users WHERE user_id = :id ORDER BY user_id DESC');
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function addUser()
    {
        try {
            $password = password_hash($this->user_password, PASSWORD_BCRYPT, array('cost' => 10));
            $db = static::getDB();
            $sql = 'INSERT INTO users(username, user_email, user_password, user_firstname, user_lastname, user_role) ';
            $sql .= 'VALUES(:username, :email, :password, :firstname, :lastname, :role)';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':username', $this->username, PDO::PARAM_STR);
            $stmt->bindValue(':email', $this->user_email, PDO::PARAM_STR);
            $stmt->bindValue(':password', $password, PDO::PARAM_STR);
            $stmt->bindValue(':firstname', $this->user_firstname, PDO::PARAM_STR);
            $stmt->bindValue(':lastname', $this->user_lastname, PDO::PARAM_STR);
            $stmt->bindValue(':role', $this->user_role, PDO::PARAM_STR);
            $stmt->execute();
            header('Location: /admin/users/add', true, 303);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function addUserForSignup()
    {
        try {
            $this->validate();
            if(empty($this->errors)) {
                $password = password_hash($this->password, PASSWORD_BCRYPT, array('cost' => 10));
                $db = static::getDB();
                $sql = 'INSERT INTO users(username, user_email, user_password, user_role) ';
                $sql .= 'VALUES(:username, :email, :password, :role)';
                $stmt = $db->prepare($sql);
                $stmt->bindValue(':username', $this->username, PDO::PARAM_STR);
                $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
                $stmt->bindValue(':password', $password, PDO::PARAM_STR);
                $stmt->bindValue(':role', "subscriber", PDO::PARAM_STR);
                $stmt->execute();
                return true;
            }
            return false;

        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function deleteUser($id)
    {
        try {
            $db = static::getDB();
            $sql = 'DELETE FROM users WHERE user_id = :id';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            header('Location: /admin/user', true, 303);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updateUser($id, $role = "")
    {
        try {
            if(empty($role)) {
               $role =  $this->user_role;
            }
            $db = static::getDB();
            $password = password_hash($this->user_password, PASSWORD_BCRYPT, array('cost' => 10));
            $sql = 'UPDATE users SET user_firstname = :firstname, ';
            $sql .= 'user_lastname = :lastname, ';
            $sql .= 'user_role = :role, ';
            $sql .= 'username = :username, ';
            $sql .= 'user_email = :email, ';
            $sql .= 'user_password = :password ';
            $sql .= 'WHERE user_id = :id';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->bindValue(':firstname', "$this->user_firstname", PDO::PARAM_STR);
            $stmt->bindValue(':lastname', "$this->user_lastname", PDO::PARAM_STR);
            $stmt->bindValue(':role', $role, PDO::PARAM_STR);
            $stmt->bindValue(':username', "$this->username", PDO::PARAM_STR);
            $stmt->bindValue(':email', "$this->user_email", PDO::PARAM_STR);
            $stmt->bindValue(':password', "$password", PDO::PARAM_STR);
            $stmt->execute();
            header("Location: /admin/users/edit/$id", true, 303);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function changeRole($id, $role)
    {
        try {
            $db = static::getDB();
            $sql = 'UPDATE users SET user_role = :role WHERE user_id = :id';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->bindValue(':role', "$role", PDO::PARAM_STR);
            $stmt->execute();
            header("Location: /admin/user", true, 303);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function validate()
    {
        // Name
        if ($this->username == '') {
            $this->errors[] = 'Name is required';
        }

        // email address
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL) === false) {
            $this->errors[] = 'Invalid email';
        }
        if (static::emailExists($this->email)) {
            $this->errors[] = 'email already taken';
        }

        // Password
        if (strlen($this->password) < 6) {
            $this->errors[] = 'Please enter at least 6 characters for the password';
        }

        if (preg_match('/.*[a-z]+.*/i', $this->password) == 0) {
            $this->errors[] = 'Password needs at least one letter';
        }

        if (preg_match('/.*\d+.*/i', $this->password) == 0) {
            $this->errors[] = 'Password needs at least one number';
        }
    }

    public static function emailExists($email)
    {
        return static::findByEmail($email) !== false;
    }

    public static function findByEmail($email)
    {
        $sql = 'SELECT * FROM users WHERE user_email = :email';
        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function authenticate($email, $password)
    {
        $user = static::findByEmail($email);

        if ($user) {
            if (password_verify($password, $user->user_password)) {
                return $user;
            }
        }

        return false;
    }

    public static function findByID($id)
    {
        $sql = 'SELECT * FROM users WHERE user_id = :id AND user_role = "admin"';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function countAllUser()
    {
        try {
            $db = static::getDB();
            $stmt = $db->query('SELECT * FROM users ORDER BY user_id DESC');
            $results = $stmt->fetchColumn();
            return $results;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
