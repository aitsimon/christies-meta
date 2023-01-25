<?php

class DBMContactForms
{
    public static function getAllContactForms()
    {
        $dbm = Connection::access();
        try {
            $sql = "SELECT * FROM  contact_forms";
            $stmt = $dbm->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();
            $contacts = array();
            foreach ($results as $result) {
                $contact = new ContactForm($result['id'],$result['name'],$result['email'],$result['content'],$result['date']);
                $contacts[] = $contact;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return  $contacts;
        }
    }
    public static function insertContact($name, $email, $content){
        $dbm = Connection::access();
        try {
            $sql = "INSERT INTO contact_forms (name, email, content) VALUES (?,?,?)";
            $check = false;
            $stmt = $dbm->prepare($sql);
            if($stmt->execute([$name,$email,$content])) {
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