<?php
include_once 'Connection.php';
include_once 'model/Comment.php';

class DBManagerComments
{

    /**
     * @return array of all the comments in the database
     */
    public static function getAll()
    {
        $dbm = Connection::access();
        try {
            $clause = "SELECT * FROM comments";
            $results = $dbm->query($clause);
            $comments = array();
            foreach ($results as $result) {
                $comment = new Comment($result['com_id'], $result['content'], $result['date'], $result['object_id'], $result['user_id']);
                $comments[] = $comment;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $comments;
        }
    }

    /**
     * @param $com_id integer the id of the comment
     * @return false if no comment is found or an Object Comment.php if it already exists
     */
    public static function getCommentById($com_id)
    {
        $dbm = Connection::access();
        try {
            $clause = 'SELECT * FROM comments WHERE com_id = ?';
            $stmt = $dbm->prepare($clause);
            $stmt->execute([$com_id]);
            $result = $stmt->fetch();
            if ($stmt->execute([$com_id])) {
                $comment = new Comment($result['com_id'], $result['content'], $result['date'], $result['object_id'], $result['user_id']);
            } else {
                $comment = false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $comment;
        }
    }

    public static function getCommentsByUserId($user_id)
    {
        $dbm = Connection::access();
        try {
            $clause = "SELECT * FROM comments where user_id = ?";
            $stmt = $dbm->prepare($clause);
            $stmt->execute([$user_id]);
            $results = $stmt->fetchAll();
            $comments = array();
            foreach ($results as $result) {
                $comment = new Comment($result['com_id'], $result['content'], $result['date'], $result['object_id'], $result['user_id']);
                $comments[] = $comment;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $comments;
        }
    }
    public static function getCommentsByObjectId($objectId)
    {
        $dbm = Connection::access();
        try {
            $clause = "SELECT * FROM comments where object_id = ?";
            $stmt = $dbm->prepare($clause);
            $stmt->execute([$objectId]);
            $results = $stmt->fetchAll();
            $comments = array();
            foreach ($results as $result) {
                $comment = new Comment($result['com_id'], $result['content'], $result['date'], $result['object_id'], $result['user_id']);
                $comments[] = $comment;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $comments;
        }
    }
    /**
     * @param $content string Content of the current comment that it's going to be inserted in the Data Base.
     * @param $object_id int Id of the object where comment is going to be placed in
     * @param $user_id int Id of the user that has commented
     * @return bool True if comment has been created successfully of false if it hasn't been created.
     */
    public static function insertComment($content, $object_id, $user_id)
    {
        $dbm = Connection::access();
        try {
            $check = false;
            $clause = "INSERT INTO comments (content, object_id, user_id) VALUES ( ?, ?, ?) ";
            $stmt = $dbm->prepare($clause);
            if ($stmt->execute([$content, $object_id, $user_id])) {
                $check = true;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $check;
        }
    }

    /**
     * @param $content string Modified string of the new content of the comment
     * @param $com_id int Id of the modified comment
     * @return bool if the update was successful, false otherwise
     */
    public static function updateComment($content, $com_id)
    {
        $dbm = Connection::access();
        try {
            $check = false;
            $clause = "UPDATE comments SET content = ? WHERE com_id = ?";
            $stmt = $dbm->prepare($clause);
            if($stmt->execute([$content,$com_id])) {
                $check = true;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $check;
        }
    }

    /**
     * @param $com_id int Id of the comment to be deleted
     * @return bool true if the comment is deleted, false otherwise
     */
    public static function deleteComment($com_id){
        $dbm = Connection::access();
        try {
            $check = false;
            $clause = "DELETE FROM comments WHERE com_id =?";
            $stmt = $dbm->prepare($clause);
            if($stmt->execute([$com_id])){
                $check = true;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $check;
        }
    }
}