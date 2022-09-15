<?php
$conn = Database::connect();
date_default_timezone_set("Europe/Paris");
if (isset($_POST['userRequestRpw']) && $_SERVER['REQUEST_METHOD'] == "POST") {  
        $date = date("Y-m-d H:i:s");
        $userEmail = $_POST['userRequest'];        
        $userSelector = bin2hex(random_bytes(8));
        $userToken = random_bytes(32);
        $tokenDelay = date("U") + 1800;    
        $url = "http://dxctunisia-webportal.com/create-new-password.php?userSelector=".$userSelector."&userToken=".bin2hex($userToken)."&userEmail=".$userEmail."&tokenDelay=".$tokenDelay;
        $sql = $conn->prepare("SELECT email, user_id, password, privilege FROM users WHERE email = ?;");
        $sql->execute([$userEmail]);
        $emails = $sql->fetchAll();
        foreach ($emails as $item){
            $email = $item['email'];
            $userId = $item['user_id'];   
            $user_pwd = $item['password'];  
            $user_priv = $item['privilege'];    
        }      
        $pattern = "/@dxc.com/i";
        $pattern  = preg_match($pattern, $userEmail);
        if ($emails && $pattern && !empty($user_pwd) && !empty($user_priv)){
            try { 
                $sql = $conn->prepare("DELETE FROM pwdreset WHERE userEmail = ? ");
                $sql->execute([$userEmail]);
            }
            catch(Exception $e) {
                echo $e->getMessage();        
            }
            $hashedToken = password_hash($userToken, PASSWORD_DEFAULT);
            try{
                $sql = $conn->prepare("INSERT INTO pwdreset (user_id , date,  userEmail, userSelector, userToken, tokenDelay) VALUES(?, ?, ?, ?, ?, ?)");
                $sql->execute([$userId, $date, $userEmail, $userSelector, $hashedToken, $tokenDelay]);
            }
            catch(Exception $e) {
                echo $e->getMessage();       
            }   
            $message =  "Please Chek your email you will receive a reset password link!";  
            $to = $userEmail;
            $subject = "Reset Your password for DXC-Tunisia WEB-Portal";
            $messages = "<p>We received a password reset request! the link to rest your password is : <a href=".$url.">".$url."</a> , you can ignore this email if you don't want to reset your password</p>";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: dxcdevenv@dxc.com' . "\r\n";
            $headers .= "Reply-To : dxcdevenv@dxc.com>\r\n";
            //$headers = "Cc:mehdi.khamlia2@dxc.com;mbourogaa3@dxc.com\r\n";   
            mail($to,$subject,$messages,$headers); 
                         
        }
        else {            
            $message = "Not DXC email or not available in DB!";         
            $to = $userEmail;
            $subject = "Reset Your password for DXC-Tunisia WEB-Portal";
            $messages = "<p>We received a password reset request! please click Account creation request to send a request! </p>";
            $headers = "MIME-Version: 1.0"."\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";
            $headers .= 'From: dxcdevenv@dxc.com'."\r\n";
            $headers .= "Reply-To : dxcdevenv@dxc.com>\r\n";
            //$headers = "Cc:mehdi.khamlia2@dxc.com;mbourogaa3@dxc.com\r\n";   
            mail($to,$subject,$messages,$headers);                                     
        }          
}
Database::disconnect();
$conn = "";
?> 
