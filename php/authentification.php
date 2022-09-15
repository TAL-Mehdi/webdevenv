<?php
session_start();
include 'validate-connexion.php';
include 'user-password-reset.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Authentification</title>
<meta CHARSET="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link rel="stylesheet" href="style.css" type="text/css">
<script src="java.js"></script>
</head>
<body class='body'>
<header>
  <div class='right-header'>
       <div class='title' style="color:white;">REST API WEB APP</div>
       <div class='square'><span class='date' id='date'><script>setInterval(() => {selectForm = document.getElementById('date'); var d = new Date(); selectForm.textContent = (d.getDate()<10?'0'+d.getDate():d.getDate()) + '-' + (d.getMonth() + 1 <10?'0'+(d.getMonth()+1):(d.getMonth()+1)) + '-' + d.getFullYear() + ' ' + d.getHours() + ':' + (d.getMinutes()<10?'0'+d.getMinutes():d.getMinutes()) + ':' + (d.getSeconds()<10?'0'+d.getSeconds():d.getSeconds()); }, 1000);</script></span></div>       
  </div>    
</header>
<div class='container'> 
    <div class='header' ><i class="fas fa-pen-nib" style="font-size:22px;color:white;" aria-hidden="true"></i>&nbsp Sign In </div>    
        <form action="authentification.php" method="post" class="mainform">
              <label for="userName">Your Email :</label><br>
              <input type='text' name='userName' id='text' class='input' autocomplete='on'><br><br>
              <label for="password">Your Password :</label><br><br>
              <input type='password' name='password' id='password' class='input' ><br><br>
              <a href="#" style="font-size:12px;position:absolute;text-align:center;margin-left:-35px;margin-top:10px;color:olivedrab;text-decoration:underline;" title="Account creation request" onclick="showModalAcc()">Account creation request!</a><input type='submit' name='userValidate' id='submit' class='button' style='margin-right:210px;' value="LogIn"><a href="#" style="font-size:12px;position:absolute;text-align:center;margin-left:220px;margin-top:10px;color:orange;text-decoration:underline;" title="Reset Your Password" onclick="showModalRpw()">Forgot Your Password!</a><br><br>
        </form>
    <div class='footer'><footer>MK<sup> &copy;</sup></footer></div>
</div>   
<br><br>
<div id="geoPosition" style="color:whitesmoke;"></div><br>
</body>
</html>