<?php

    $conn = new mysqli('localhost','root','','rent'); 
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }
    if (isset($_POST['update'])) {

    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];

    if($password==$cpassword){
        $email="SELECT `email` FROM `register`";
        $sql = "UPDATE `register` SET `password`='$password' WHERE `email`='$email'";
        $result = $conn->query($sql);
        if ($result == TRUE) {

            echo "Updated successfully.";

        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    }
}

    


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./password_process.css" />
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
      <button class="search-but" type="submit" name="update">
        <div class="search">Change</div>
      </button>
      <div class="enter-password">Enter new password:</div>
      <div class="forget-password">Forget password</div>
      <input type="password" placeholder="Password" name="password" class="password-comfirm-item" required>
      <input type="password" placeholder="Comfirm Password" name="cpassword" class="cpassword-comfirm-item" required>

      </div>
    </div>
    </form>
  </body>
</html>