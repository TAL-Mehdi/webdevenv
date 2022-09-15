<?php
include_once('connexion.php');
$conn = Database::connect();
if ($_GET['value'] == "orders"){
    try {
        $sql = $conn->prepare ("SELECT * FROM orders WHERE validated = 'false';");
        $sql->execute();
        $values = $sql->fetchAll();
    }
    catch (PDOException $e){
            echo "Issue to get Data ". $e->getMessage();
    }
 echo '<pre>';    
 print_r($values);
 echo '<pre>';   
}
if ($_GET['value']=="contacts"){
    try {
        $sql = $conn->prepare ("SELECT * FROM contacts;");
        $sql->execute();
        $values = $sql->fetchAll();
    }
    catch (PDOException $e){
            echo "Issue to get Data ". $e->getMessage();
    } 
    echo '<pre>';   
    print_r($values);
    echo '<pre>';   
}
if ($_GET['value']=="db"){
    try {
        $sql = $conn->prepare ("SELECT * FROM contacts as c, orders as o WHERE c.customer_id = o.customer_id;");
        $sql->execute();
        $values = $sql->fetchAll(); 
        //$sql->execute();
    }
    catch (PDOException $e){
            echo "Issue to get Data ". $e->getMessage();
    } 
    echo '<pre>';   
    print_r($values);
    echo '<pre>'; 
}
?>