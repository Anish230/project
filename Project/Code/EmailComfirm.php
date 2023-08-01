<?php

$conn = new mysqli('localhost','root','','rent'); 
if($conn->connect_error){
    die('Connection Failed :'.$conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
  $email=$_POST['email'];

  $sql="SELECT * from register Where email='$email'";
  $result = mysqli_query($conn, $sql);  
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
  $count = mysqli_num_rows($result);
  if($count==1){
    header("Location: ./password_process.php?$email");
    exit();
    
}else{
    echo '<script>alert("Invalide Email")</script>';
    
}
}



?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./EmailComfirm1.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inder:wght@400&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700&display=swap"
    />
  </head>
  <body>
    <form action="" method="POST">
    <div class="email-comfirm">
      <div class="email-comfirm-child">
      <button class="search-but" type="submit" name="search">
        <div class="search">Search</div>
      </button>
      <div class="enter-email">Enter Email:</div>
      <div class="forget-password">Forget password</div>
      <input type="email" name="email" class="email-comfirm-item" required>
      </div>
    </div>
    </form>
  </body>
</html>




