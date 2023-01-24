<?php

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
                $score = false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $score;
        }
    }
    public static function insertNewScore($product_id){
        $dbm = Connection::access();
        try {
            $check = false;
            $clause = "INSERT INTO score (object_id,score_points) VALUES (?, 1) ";
            $stmt = $dbm->prepare($clause);
            if ($stmt->execute([$product_id])) {
                $check = true;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $check;
        }
    }
    public static function updateScore($product_id,$newScore){
        $dbm = Connection::access();
        try {
            $check = false;
            $clause = "UPDATE score SET score_points = ? where object_id = ?";
            $stmt = $dbm->prepare($clause);
            if($stmt->execute([$newScore,$product_id])) {
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