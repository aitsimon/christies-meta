<?php
include_once 'Connection.php';

class DBMScore
{
    public static function getScoreProductById($product_id){
        $dbm = Connection::access();
        try {
            $clause = 'SELECT score_points FROM score WHERE object_id = ?';
            $stmt = $dbm->prepare($clause);
            $stmt->execute([(int)$product_id]);
            $result = $stmt->fetch();
            if ($result!==false) {
                $score = $result[0];
            } else {
                $score = 0;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $score;
        }
    }
}