<?php
include_once "Connection.php";

class DBAdmin
{
    public static function login($email, $password)
    {
        $db = Connection::access();
        try {
            $check = false;
            $stmt = $db->prepare("SELECT * FROM user WHERE email = ? and password = ? and rol='admin'");
            $stmt->execute([$email, sha1($password)]);
            $email = $stmt->fetch();
            if ($email) {
                $check = true;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
            return $check;
        }
    }

    public static function getColumns($table)
    {
        $db = Connection::access();
        try {
            $clause ="SELECT *FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'".$table."' AND TABLE_SCHEMA = 'christies'";
            $result = $db->query($clause);
            $columns = array();
            foreach ($result as $r){
              $columns[] = $r['COLUMN_NAME'];
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
            return $columns;
        }
    }
    public function ajaxRequest($table, $columns){
        $dbm = null;
        switch ($table) {
            case 'user':
                $dbm = new DBManagerUsers();
                break;
            case 'categories':
                $dbm = new DBManagerCategories();
                break;
            case 'object':
                $dbm = new DBManagerObject();
                break;
            case 'comments':
                $dbm = new DBManagerComments();
                break;
            case 'purchases':
                $dbm = new DBManagerPurchases();
                break;
        }
        $db = Connection::access();
        $query = "SELECT * FROM ".$table;
        $output = array();

        if(isset($_POST['search']['value'])){
            $query .= ' WHERE '.$columns[0].' LIKE "%' . $_POST['search']['value'] . '%"';
            for ($i=0; $i<count($columns)-1; $i++){
                $query .= ' OR '.$columns[$i]. ' LIKE "%' . $_POST['search']['value'] . '%"';
            }
        }

        if(isset($_POST['order'])){
            $query .= ' ORDER BY '. $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        }else{
            $query .= ' ORDER BY '. $columns[0]. ' DESC';
        }

        if($_POST['length']!=-1){
            $query .= ' LIMIT '. $_POST['start'] . ',' . $_POST['length'];
        }

        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $data = array();
        $filtered_rows = $stmt->rowCount();
        foreach ($result as $row) {
            $sub_array = array();
           for ($i=0; $i<count($columns);$i++){
               $sub_array[] = $row[$columns[$i]];
           }
        }
        $output = array(
            "draw" => (int)$_POST['draw'],
            "recordsTotal" => $filtered_rows,
            "recordsFiltered" => $dbm->getAll(),
            "data" => $data,
        );
        echo json_encode($output);
    }
    public function ajaxRequest2($table,$columns){

    }
}