<?php
include 'connexion.php';
$conn = Database::connect();
if (isset($_POST['userValidate'])){    
    $userName = strtolower(test_input($_POST['userName']));
    $password_verif  = test_input($_POST['password']); 
    $_SESSION['connect'] = false;
    $sql = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $sql->execute([$userName]);  
    $values = $sql->fetchAll();  
        if($values) {
            foreach($values as $item){
                $password = $item["password"];            
                $id = $item['id'];        
                $email = $item['email'];
                $firstName = $item['first_name'];
                $lastName = $item['last_name'];
            }             
        }

    if (empty($password_verif))  {
        echo '<script>alert("Password are required"); window.location.href = "authentification.php";  </script>';
        exit();
    }  
    else if (empty($userName)) {
        echo '<script>alert("UserName are required"); window.location.href = "authentification.php";  </script>';    
        exit();         
    } 
    else if (($userName != $email) || ($password_verif != $password) ){
        echo '<script>alert("Wrong Username or Password please verify");window.location.href = "authentification.php";  </script>';  
        exit();            
    }  
    else if ( $status == "desactivated" ){
        echo '<script>alert("Account desactivated please contact the administrator!");window.location.href = "authentification.php";  </script>';  
        exit();            
    }   
    else {     
        session_start();
        $_SESSION['connect'] = true;
        $_SESSION['password'] = $password;   
        $_SESSION['id'] = $id;             
        $_SESSION['email'] = $email;    
        $_SESSION['firstName'] =  $firstName;
        $_SESSION['lastName'] =  $lastName;
        header('location:index.php');                       
    }                   
} 
    
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
} 
Database::disconnect();
?>